<?php

function mc_opinion_sedes() {
    return ['Cajamarca', 'San Marcos', 'Cajabamba', 'Huamachuco'];
}

function mc_opinions_storage_path() {
    return __DIR__ . '/data/opiniones.json';
}

function mc_opinions_install() {
    $path = mc_opinions_storage_path();
    $dir = dirname($path);
    if (!is_dir($dir) && !@mkdir($dir, 0775, true) && !is_dir($dir)) {
        throw new RuntimeException('No se pudo crear la carpeta de opiniones.');
    }
    if (!is_file($path)) {
        $initial = ['next_id' => 1, 'items' => []];
        $json = json_encode($initial, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        if ($json === false || @file_put_contents($path, $json . PHP_EOL, LOCK_EX) === false) {
            throw new RuntimeException('No se pudo crear el archivo JSON de opiniones.');
        }
    }
    return true;
}

function mc_opinions_normalize_state($state) {
    if (!is_array($state)) $state = [];
    $items = isset($state['items']) && is_array($state['items']) ? array_values($state['items']) : [];
    $maxId = 0;
    foreach ($items as &$item) {
        if (!is_array($item)) $item = [];
        $item['id'] = max(0, (int)($item['id'] ?? 0));
        $maxId = max($maxId, $item['id']);
        $item['nombre'] = trim((string)($item['nombre'] ?? ''));
        $item['sede'] = trim((string)($item['sede'] ?? ''));
        $item['calificacion'] = max(1, min(5, (int)($item['calificacion'] ?? 5)));
        $item['comentario'] = trim((string)($item['comentario'] ?? ''));
        $item['consentimiento'] = !empty($item['consentimiento']) ? 1 : 0;
        $item['estado'] = in_array(($item['estado'] ?? ''), ['pendiente','publicado','rechazado','oculto'], true)
            ? $item['estado'] : 'pendiente';
        $item['destacado'] = !empty($item['destacado']) ? 1 : 0;
        $item['ip_hash'] = (string)($item['ip_hash'] ?? '');
        $item['created_at'] = (string)($item['created_at'] ?? date('Y-m-d H:i:s'));
        $item['updated_at'] = (string)($item['updated_at'] ?? $item['created_at']);
    }
    unset($item);
    return [
        'next_id' => max($maxId + 1, (int)($state['next_id'] ?? 1)),
        'items' => $items,
    ];
}

function mc_opinions_read_state() {
    mc_opinions_install();
    $raw = @file_get_contents(mc_opinions_storage_path());
    if ($raw === false) throw new RuntimeException('No se pudo leer el archivo JSON de opiniones.');
    $decoded = json_decode($raw, true);
    if (!is_array($decoded)) throw new RuntimeException('El archivo JSON de opiniones no tiene un formato válido.');
    return mc_opinions_normalize_state($decoded);
}

function mc_opinions_write_state($state) {
    $state = mc_opinions_normalize_state($state);
    $json = json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    if ($json === false) throw new RuntimeException('No se pudo convertir las opiniones a JSON.');
    if (@file_put_contents(mc_opinions_storage_path(), $json . PHP_EOL, LOCK_EX) === false) {
        throw new RuntimeException('No se pudo guardar el archivo JSON de opiniones.');
    }
    return true;
}

function mc_opinion_ip_hash() {
    $ip = trim((string)($_SERVER['REMOTE_ADDR'] ?? ''));
    if ($ip === '') $ip = 'local';
    return hash('sha256', 'multicredit-opiniones|' . $ip);
}

function mc_opinion_rate_limited($ipHash, $minutes = 10) {
    if ($ipHash === '') return false;
    $limit = time() - max(1, (int)$minutes) * 60;
    $state = mc_opinions_read_state();
    foreach ($state['items'] as $item) {
        if (!hash_equals((string)($item['ip_hash'] ?? ''), (string)$ipHash)) continue;
        $created = strtotime((string)($item['created_at'] ?? '')) ?: 0;
        if ($created >= $limit) return true;
    }
    return false;
}

function mc_opinion_create($data) {
    $state = mc_opinions_read_state();
    $id = (int)$state['next_id'];
    $now = date('Y-m-d H:i:s');
    $sede = trim((string)($data['sede'] ?? ''));
    $rating = (int)($data['calificacion'] ?? 0);
    $comment = trim((string)($data['comentario'] ?? ''));
    if (!in_array($sede, mc_opinion_sedes(), true)) throw new RuntimeException('Selecciona una sede válida.');
    if ($rating < 1 || $rating > 5) throw new RuntimeException('La calificación debe estar entre 1 y 5.');
    if ($comment === '') throw new RuntimeException('El comentario no puede quedar vacío.');
    $state['items'][] = [
        'id' => $id,
        'nombre' => trim((string)($data['nombre'] ?? '')),
        'sede' => $sede,
        'calificacion' => $rating,
        'comentario' => $comment,
        'consentimiento' => 1,
        'estado' => 'pendiente',
        'destacado' => 0,
        'ip_hash' => (string)($data['ip_hash'] ?? ''),
        'created_at' => $now,
        'updated_at' => $now,
    ];
    $state['next_id'] = $id + 1;
    mc_opinions_write_state($state);
    return $id;
}

function mc_opinions_public($limit = 18) {
    $state = mc_opinions_read_state();
    $items = array_values(array_filter($state['items'], function ($item) {
        return ($item['estado'] ?? '') === 'publicado' && !empty($item['consentimiento']);
    }));
    usort($items, function ($a, $b) {
        $featured = (int)($b['destacado'] ?? 0) <=> (int)($a['destacado'] ?? 0);
        if ($featured !== 0) return $featured;
        $date = (strtotime((string)($b['created_at'] ?? '')) ?: 0) <=> (strtotime((string)($a['created_at'] ?? '')) ?: 0);
        if ($date !== 0) return $date;
        return (int)($b['id'] ?? 0) <=> (int)($a['id'] ?? 0);
    });
    return array_slice($items, 0, max(1, min(100, (int)$limit)));
}

function mc_opinions_summary() {
    $items = mc_opinions_public(10000);
    $count = count($items);
    $sum = 0;
    foreach ($items as $item) $sum += (int)($item['calificacion'] ?? 0);
    return ['average' => $count > 0 ? round($sum / $count, 1) : 0, 'count' => $count];
}

function mc_opinions_admin_stats() {
    $state = mc_opinions_read_state();
    $stats = ['total'=>0,'pendiente'=>0,'publicado'=>0,'rechazado'=>0,'oculto'=>0,'average'=>0];
    $publishedSum = 0;
    $publishedCount = 0;
    foreach ($state['items'] as $item) {
        $stats['total']++;
        $status = (string)($item['estado'] ?? 'pendiente');
        if (isset($stats[$status])) $stats[$status]++;
        if ($status === 'publicado') {
            $publishedSum += (int)($item['calificacion'] ?? 0);
            $publishedCount++;
        }
    }
    $stats['average'] = $publishedCount > 0 ? round($publishedSum / $publishedCount, 1) : 0;
    return $stats;
}

function mc_opinions_admin_list($filter = '') {
    $state = mc_opinions_read_state();
    $items = $state['items'];
    if ($filter !== '') {
        $items = array_values(array_filter($items, fn($item) => ($item['estado'] ?? '') === $filter));
    }
    usort($items, function ($a, $b) {
        $date = (strtotime((string)($b['created_at'] ?? '')) ?: 0) <=> (strtotime((string)($a['created_at'] ?? '')) ?: 0);
        if ($date !== 0) return $date;
        return (int)($b['id'] ?? 0) <=> (int)($a['id'] ?? 0);
    });
    return $items;
}

function mc_opinion_get($id) {
    $state = mc_opinions_read_state();
    foreach ($state['items'] as $item) {
        if ((int)($item['id'] ?? 0) === (int)$id) return $item;
    }
    return null;
}

function mc_opinion_set_status($id, $status) {
    if (!in_array($status, ['pendiente','publicado','rechazado','oculto'], true)) throw new RuntimeException('Estado de opinión no válido.');
    $state = mc_opinions_read_state();
    $found = false;
    foreach ($state['items'] as &$item) {
        if ((int)($item['id'] ?? 0) !== (int)$id) continue;
        $item['estado'] = $status;
        $item['updated_at'] = date('Y-m-d H:i:s');
        $found = true;
        break;
    }
    unset($item);
    if (!$found) throw new RuntimeException('Opinión no encontrada.');
    return mc_opinions_write_state($state);
}

function mc_opinion_toggle_featured($id) {
    $state = mc_opinions_read_state();
    $found = false;
    foreach ($state['items'] as &$item) {
        if ((int)($item['id'] ?? 0) !== (int)$id) continue;
        $item['destacado'] = empty($item['destacado']) ? 1 : 0;
        $item['updated_at'] = date('Y-m-d H:i:s');
        $found = true;
        break;
    }
    unset($item);
    if (!$found) throw new RuntimeException('Opinión no encontrada.');
    return mc_opinions_write_state($state);
}

function mc_opinion_delete($id) {
    $state = mc_opinions_read_state();
    $before = count($state['items']);
    $state['items'] = array_values(array_filter($state['items'], fn($item) => (int)($item['id'] ?? 0) !== (int)$id));
    if ($before === count($state['items'])) throw new RuntimeException('Opinión no encontrada.');
    return mc_opinions_write_state($state);
}

function mc_opinion_update($id, $data) {
    $state = mc_opinions_read_state();
    $found = false;
    foreach ($state['items'] as &$item) {
        if ((int)($item['id'] ?? 0) !== (int)$id) continue;
        $sede = trim((string)($data['sede'] ?? $item['sede']));
        $rating = (int)($data['calificacion'] ?? $item['calificacion']);
        $status = (string)($data['estado'] ?? $item['estado']);
        if (!in_array($sede, mc_opinion_sedes(), true)) throw new RuntimeException('Selecciona una sede válida.');
        if ($rating < 1 || $rating > 5) throw new RuntimeException('La calificación debe estar entre 1 y 5.');
        if (!in_array($status, ['pendiente','publicado','rechazado','oculto'], true)) throw new RuntimeException('Estado de opinión no válido.');
        $item['nombre'] = trim((string)($data['nombre'] ?? $item['nombre']));
        $item['sede'] = $sede;
        $item['calificacion'] = $rating;
        $item['comentario'] = trim((string)($data['comentario'] ?? $item['comentario']));
        $item['estado'] = $status;
        $item['destacado'] = !empty($data['destacado']) ? 1 : 0;
        $item['updated_at'] = date('Y-m-d H:i:s');
        $found = true;
        break;
    }
    unset($item);
    if (!$found) throw new RuntimeException('Opinión no encontrada.');
    return mc_opinions_write_state($state);
}
