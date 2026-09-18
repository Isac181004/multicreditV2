<?php

require_once __DIR__ . '/bootstrap.php';

if (!defined('MC_OPINIONS_FILE')) define('MC_OPINIONS_FILE', MC_DATA_DIR . '/opiniones.json');

function mc_opinion_sedes() {
    return ['Cajamarca', 'San Marcos', 'Cajabamba', 'Huamachuco'];
}

function mc_opinion_initials($name) {
    $name = trim((string)$name);
    if ($name === '') return 'MC';
    $parts = preg_split('/\s+/u', $name, -1, PREG_SPLIT_NO_EMPTY);
    $letters = '';
    foreach (array_slice($parts ?: [], 0, 2) as $part) {
        $letters .= function_exists('mb_substr') ? mb_substr($part, 0, 1, 'UTF-8') : substr($part, 0, 1);
    }
    return function_exists('mb_strtoupper') ? mb_strtoupper($letters, 'UTF-8') : strtoupper($letters);
}

function mc_opinion_normalize($row, $index = 0) {
    $allowedStatuses = ['pendiente', 'publicado', 'rechazado', 'oculto'];
    $status = (string)($row['estado'] ?? 'pendiente');
    $sede = trim((string)($row['sede'] ?? 'Cajamarca'));
    $createdAt = trim((string)($row['created_at'] ?? ''));
    $updatedAt = trim((string)($row['updated_at'] ?? ''));
    if (!in_array($status, $allowedStatuses, true)) $status = 'pendiente';
    if (!in_array($sede, mc_opinion_sedes(), true)) $sede = 'Cajamarca';
    if ($createdAt === '') $createdAt = date('Y-m-d H:i:s');
    if ($updatedAt === '') $updatedAt = $createdAt;
    return [
        'id' => max(1, (int)($row['id'] ?? ($index + 1))),
        'nombre' => trim((string)($row['nombre'] ?? '')),
        'sede' => $sede,
        'calificacion' => max(1, min(5, (int)($row['calificacion'] ?? 5))),
        'comentario' => trim((string)($row['comentario'] ?? '')),
        'consentimiento' => !empty($row['consentimiento']),
        'estado' => $status,
        'destacado' => !empty($row['destacado']),
        'ip_hash' => trim((string)($row['ip_hash'] ?? '')),
        'created_at' => $createdAt,
        'updated_at' => $updatedAt,
    ];
}

function mc_opinions_load() {
    if (!is_file(MC_OPINIONS_FILE)) return [];
    $raw = @file_get_contents(MC_OPINIONS_FILE);
    if ($raw === false || trim($raw) === '') throw new RuntimeException('El archivo opiniones.json está vacío o no se puede leer.');
    $rows = json_decode($raw, true);
    if (!is_array($rows) || json_last_error() !== JSON_ERROR_NONE) {
        throw new RuntimeException('El archivo opiniones.json está dañado. No será sobrescrito.');
    }
    $normalized = [];
    foreach (array_values($rows) as $index => $row) {
        if (is_array($row)) $normalized[] = mc_opinion_normalize($row, $index);
    }
    return $normalized;
}

function mc_opinions_save($rows) {
    if (!mc_write_json(MC_OPINIONS_FILE, array_values($rows))) {
        throw new RuntimeException('No se pudo guardar opiniones.json. Verifica los permisos de cms/data.');
    }
    return true;
}

function mc_opinions_mutate($callback) {
    $lockPath = MC_OPINIONS_FILE . '.mutation.lock';
    $lock = @fopen($lockPath, 'c');
    if (!$lock || !@flock($lock, LOCK_EX)) {
        if ($lock) @fclose($lock);
        throw new RuntimeException('No se pudo bloquear temporalmente opiniones.json para guardar.');
    }
    try {
        $result = $callback(mc_opinions_load());
        if (!is_array($result) || !isset($result['rows'])) throw new RuntimeException('La actualización de opiniones no es válida.');
        mc_opinions_save($result['rows']);
        return $result['value'] ?? true;
    } finally {
        @flock($lock, LOCK_UN);
        @fclose($lock);
    }
}

function mc_opinions_install() {
    if (!is_dir(MC_DATA_DIR) && !@mkdir(MC_DATA_DIR, 0775, true)) throw new RuntimeException('No se pudo crear la carpeta cms/data.');
    if (!is_file(MC_OPINIONS_FILE)) mc_opinions_save([]);
    mc_opinions_load();
    return true;
}

function mc_opinions_summary() {
    mc_opinions_install();
    $published = array_values(array_filter(mc_opinions_load(), function ($row) { return $row['estado'] === 'publicado'; }));
    $total = count($published);
    $sum = array_sum(array_column($published, 'calificacion'));
    return ['total' => $total, 'average' => $total ? round($sum / $total, 1) : 0.0];
}

function mc_opinions_public($limit = 12) {
    mc_opinions_install();
    $limit = max(1, min(30, (int)$limit));
    $rows = array_values(array_filter(mc_opinions_load(), function ($row) { return $row['estado'] === 'publicado'; }));
    usort($rows, function ($a, $b) {
        if ((bool)$a['destacado'] !== (bool)$b['destacado']) return $a['destacado'] ? -1 : 1;
        $dateOrder = strcmp((string)$b['created_at'], (string)$a['created_at']);
        return $dateOrder !== 0 ? $dateOrder : ((int)$b['id'] <=> (int)$a['id']);
    });
    return array_map(function ($row) {
        $row['nombre'] = $row['nombre'] !== '' ? $row['nombre'] : 'Cliente de Multicredit';
        $row['initials'] = mc_opinion_initials($row['nombre']);
        unset($row['ip_hash'], $row['consentimiento'], $row['updated_at'], $row['estado']);
        return $row;
    }, array_slice($rows, 0, $limit));
}

function mc_opinion_ip_hash($ip = null) {
    if ($ip === null) $ip = (string)($_SERVER['REMOTE_ADDR'] ?? '');
    return hash('sha256', (string)$ip . '|multicredit-opiniones|' . date('Y-m'));
}

function mc_opinion_rate_limited($ipHash, $minutes = 10) {
    mc_opinions_install();
    $threshold = time() - (max(1, min(1440, (int)$minutes)) * 60);
    foreach (mc_opinions_load() as $row) {
        if (hash_equals((string)$row['ip_hash'], (string)$ipHash) && strtotime((string)$row['created_at']) >= $threshold) return true;
    }
    return false;
}

function mc_opinion_create($data) {
    mc_opinions_install();
    return mc_opinions_mutate(function ($rows) use ($data) {
        $ids = array_column($rows, 'id');
        $id = $ids ? max(array_map('intval', $ids)) + 1 : 1;
        $now = date('Y-m-d H:i:s');
        $rows[] = mc_opinion_normalize([
            'id' => $id,
            'nombre' => trim((string)($data['nombre'] ?? '')),
            'sede' => trim((string)($data['sede'] ?? '')),
            'calificacion' => (int)($data['calificacion'] ?? 0),
            'comentario' => trim((string)($data['comentario'] ?? '')),
            'consentimiento' => true,
            'estado' => 'pendiente',
            'destacado' => false,
            'ip_hash' => (string)($data['ip_hash'] ?? ''),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        return ['rows' => $rows, 'value' => $id];
    });
}

function mc_opinions_admin_stats() {
    mc_opinions_install();
    $stats = ['total'=>0, 'pendiente'=>0, 'publicado'=>0, 'rechazado'=>0, 'oculto'=>0, 'average'=>0.0];
    $ratings = [];
    foreach (mc_opinions_load() as $row) {
        $stats['total']++;
        if (isset($stats[$row['estado']])) $stats[$row['estado']]++;
        if ($row['estado'] === 'publicado') $ratings[] = (int)$row['calificacion'];
    }
    $stats['average'] = $ratings ? round(array_sum($ratings) / count($ratings), 1) : 0.0;
    return $stats;
}

function mc_opinions_admin_list($status = '') {
    mc_opinions_install();
    $allowed = ['pendiente', 'publicado', 'rechazado', 'oculto'];
    $rows = mc_opinions_load();
    if (in_array($status, $allowed, true)) {
        $rows = array_values(array_filter($rows, function ($row) use ($status) { return $row['estado'] === $status; }));
    }
    $priority = ['pendiente'=>0, 'publicado'=>1, 'oculto'=>2, 'rechazado'=>3];
    usort($rows, function ($a, $b) use ($priority) {
        $stateOrder = ($priority[$a['estado']] ?? 9) <=> ($priority[$b['estado']] ?? 9);
        if ($stateOrder !== 0) return $stateOrder;
        $dateOrder = strcmp((string)$b['created_at'], (string)$a['created_at']);
        return $dateOrder !== 0 ? $dateOrder : ((int)$b['id'] <=> (int)$a['id']);
    });
    return $rows;
}

function mc_opinion_get($id) {
    mc_opinions_install();
    foreach (mc_opinions_load() as $row) if ((int)$row['id'] === (int)$id) return $row;
    return null;
}

function mc_opinion_set_status($id, $status) {
    if (!in_array($status, ['pendiente', 'publicado', 'rechazado', 'oculto'], true)) return false;
    return mc_opinions_mutate(function ($rows) use ($id, $status) {
        $found = false;
        foreach ($rows as &$row) {
            if ((int)$row['id'] !== (int)$id) continue;
            $row['estado'] = $status;
            $row['updated_at'] = date('Y-m-d H:i:s');
            $found = true;
            break;
        }
        unset($row);
        return ['rows' => $rows, 'value' => $found];
    });
}

function mc_opinion_toggle_featured($id) {
    return mc_opinions_mutate(function ($rows) use ($id) {
        $found = false;
        foreach ($rows as &$row) {
            if ((int)$row['id'] !== (int)$id) continue;
            $row['destacado'] = !$row['destacado'];
            $row['updated_at'] = date('Y-m-d H:i:s');
            $found = true;
            break;
        }
        unset($row);
        return ['rows' => $rows, 'value' => $found];
    });
}

function mc_opinion_update($id, $data) {
    $status = (string)($data['estado'] ?? 'pendiente');
    if (!in_array($status, ['pendiente', 'publicado', 'rechazado', 'oculto'], true)) $status = 'pendiente';
    return mc_opinions_mutate(function ($rows) use ($id, $data, $status) {
        $found = false;
        foreach ($rows as &$row) {
            if ((int)$row['id'] !== (int)$id) continue;
            $row['nombre'] = trim((string)($data['nombre'] ?? ''));
            $row['sede'] = in_array((string)($data['sede'] ?? ''), mc_opinion_sedes(), true) ? (string)$data['sede'] : 'Cajamarca';
            $row['calificacion'] = max(1, min(5, (int)($data['calificacion'] ?? 5)));
            $row['comentario'] = trim((string)($data['comentario'] ?? ''));
            $row['estado'] = $status;
            $row['destacado'] = !empty($data['destacado']);
            $row['updated_at'] = date('Y-m-d H:i:s');
            $found = true;
            break;
        }
        unset($row);
        return ['rows' => $rows, 'value' => $found];
    });
}

function mc_opinion_delete($id) {
    return mc_opinions_mutate(function ($rows) use ($id) {
        $remaining = array_values(array_filter($rows, function ($row) use ($id) { return (int)$row['id'] !== (int)$id; }));
        return ['rows' => $remaining, 'value' => count($remaining) !== count($rows)];
    });
}
