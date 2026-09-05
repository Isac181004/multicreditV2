<?php

function mc_opinions_db_config() {
    $config = [
        'host' => (string)(getenv('MC_DB_HOST') ?: '127.0.0.1'),
        'port' => (string)(getenv('MC_DB_PORT') ?: '3306'),
        'database' => (string)(getenv('MC_DB_NAME') ?: 'multicreditv2'),
        'username' => (string)(getenv('MC_DB_USER') ?: 'root'),
        'password' => (string)(getenv('MC_DB_PASSWORD') ?: ''),
        'charset' => 'utf8mb4',
    ];

    $local = __DIR__ . '/config/database.php';
    if (is_file($local)) {
        $custom = include $local;
        if (is_array($custom)) $config = array_merge($config, $custom);
    }

    $config['database'] = preg_replace('/[^a-zA-Z0-9_]/', '', (string)$config['database']) ?: 'multicreditv2';
    $config['port'] = preg_replace('/\D+/', '', (string)$config['port']) ?: '3306';
    $config['charset'] = 'utf8mb4';
    return $config;
}

function mc_opinions_db($allowCreateDatabase = true) {
    static $pdo = null;
    if ($pdo instanceof PDO) return $pdo;
    if (!class_exists('PDO')) throw new RuntimeException('PDO no está disponible en PHP.');

    $cfg = mc_opinions_db_config();
    $baseDsn = 'mysql:host=' . $cfg['host'] . ';port=' . $cfg['port'] . ';charset=utf8mb4';
    $dbDsn = $baseDsn . ';dbname=' . $cfg['database'];
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dbDsn, $cfg['username'], $cfg['password'], $options);
        return $pdo;
    } catch (PDOException $e) {
        $unknownDatabase = (string)$e->getCode() === '1049' || stripos($e->getMessage(), 'Unknown database') !== false;
        if (!$allowCreateDatabase || !$unknownDatabase) throw $e;
    }

    $server = new PDO($baseDsn, $cfg['username'], $cfg['password'], $options);
    $db = str_replace('`', '', $cfg['database']);
    $server->exec("CREATE DATABASE IF NOT EXISTS `{$db}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $server = null;

    $pdo = new PDO($dbDsn, $cfg['username'], $cfg['password'], $options);
    return $pdo;
}

function mc_opinions_install() {
    static $installed = false;
    if ($installed) return true;

    $pdo = mc_opinions_db(true);
    $pdo->exec("CREATE TABLE IF NOT EXISTS opiniones (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(100) NULL,
        sede VARCHAR(60) NOT NULL,
        calificacion TINYINT UNSIGNED NOT NULL,
        comentario VARCHAR(700) NOT NULL,
        consentimiento TINYINT(1) NOT NULL DEFAULT 1,
        estado ENUM('pendiente','publicado','rechazado','oculto') NOT NULL DEFAULT 'pendiente',
        destacado TINYINT(1) NOT NULL DEFAULT 0,
        ip_hash CHAR(64) NULL,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id),
        INDEX idx_opiniones_estado (estado, destacado, created_at),
        INDEX idx_opiniones_ip (ip_hash, created_at)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");

    $installed = true;
    return true;
}

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

function mc_opinions_summary() {
    mc_opinions_install();
    $row = mc_opinions_db()->query("SELECT COUNT(*) AS total, COALESCE(AVG(calificacion),0) AS promedio FROM opiniones WHERE estado='publicado'")->fetch();
    return [
        'total' => (int)($row['total'] ?? 0),
        'average' => round((float)($row['promedio'] ?? 0), 1),
    ];
}

function mc_opinions_public($limit = 12) {
    mc_opinions_install();
    $limit = max(1, min(30, (int)$limit));
    $stmt = mc_opinions_db()->query("SELECT id,nombre,sede,calificacion,comentario,destacado,created_at FROM opiniones WHERE estado='publicado' ORDER BY destacado DESC, created_at DESC, id DESC LIMIT {$limit}");
    $rows = $stmt->fetchAll();
    foreach ($rows as &$row) {
        $row['id'] = (int)$row['id'];
        $row['calificacion'] = (int)$row['calificacion'];
        $row['destacado'] = (bool)$row['destacado'];
        $row['nombre'] = trim((string)($row['nombre'] ?? '')) ?: 'Cliente de Multicredit';
        $row['initials'] = mc_opinion_initials($row['nombre']);
    }
    unset($row);
    return $rows;
}

function mc_opinion_ip_hash($ip = null) {
    if ($ip === null) $ip = (string)($_SERVER['REMOTE_ADDR'] ?? '');
    return hash('sha256', (string)$ip . '|multicredit-opiniones|' . date('Y-m'));
}

function mc_opinion_rate_limited($ipHash, $minutes = 10) {
    mc_opinions_install();
    $minutes = max(1, min(1440, (int)$minutes));
    $stmt = mc_opinions_db()->prepare("SELECT COUNT(*) FROM opiniones WHERE ip_hash=? AND created_at >= DATE_SUB(NOW(), INTERVAL {$minutes} MINUTE)");
    $stmt->execute([(string)$ipHash]);
    return (int)$stmt->fetchColumn() > 0;
}

function mc_opinion_create($data) {
    mc_opinions_install();
    $stmt = mc_opinions_db()->prepare("INSERT INTO opiniones (nombre,sede,calificacion,comentario,consentimiento,estado,destacado,ip_hash) VALUES (?,?,?,?,1,'pendiente',0,?)");
    $stmt->execute([
        trim((string)($data['nombre'] ?? '')) ?: null,
        trim((string)($data['sede'] ?? '')),
        (int)($data['calificacion'] ?? 0),
        trim((string)($data['comentario'] ?? '')),
        (string)($data['ip_hash'] ?? ''),
    ]);
    return (int)mc_opinions_db()->lastInsertId();
}

function mc_opinions_admin_stats() {
    mc_opinions_install();
    $stats = ['total'=>0,'pendiente'=>0,'publicado'=>0,'rechazado'=>0,'oculto'=>0,'average'=>0.0];
    $rows = mc_opinions_db()->query("SELECT estado,COUNT(*) AS cantidad FROM opiniones GROUP BY estado")->fetchAll();
    foreach ($rows as $row) {
        $estado = (string)$row['estado'];
        $cantidad = (int)$row['cantidad'];
        if (array_key_exists($estado, $stats)) $stats[$estado] = $cantidad;
        $stats['total'] += $cantidad;
    }
    $avg = mc_opinions_db()->query("SELECT COALESCE(AVG(calificacion),0) FROM opiniones WHERE estado='publicado'")->fetchColumn();
    $stats['average'] = round((float)$avg, 1);
    return $stats;
}

function mc_opinions_admin_list($status = '') {
    mc_opinions_install();
    $allowed = ['pendiente','publicado','rechazado','oculto'];
    if (in_array($status, $allowed, true)) {
        $stmt = mc_opinions_db()->prepare("SELECT * FROM opiniones WHERE estado=? ORDER BY created_at DESC,id DESC");
        $stmt->execute([$status]);
        return $stmt->fetchAll();
    }
    return mc_opinions_db()->query("SELECT * FROM opiniones ORDER BY CASE estado WHEN 'pendiente' THEN 0 WHEN 'publicado' THEN 1 WHEN 'oculto' THEN 2 ELSE 3 END, created_at DESC,id DESC")->fetchAll();
}

function mc_opinion_get($id) {
    mc_opinions_install();
    $stmt = mc_opinions_db()->prepare('SELECT * FROM opiniones WHERE id=? LIMIT 1');
    $stmt->execute([(int)$id]);
    $row = $stmt->fetch();
    return $row ?: null;
}

function mc_opinion_set_status($id, $status) {
    $allowed = ['pendiente','publicado','rechazado','oculto'];
    if (!in_array($status, $allowed, true)) return false;
    mc_opinions_install();
    $stmt = mc_opinions_db()->prepare('UPDATE opiniones SET estado=? WHERE id=?');
    return $stmt->execute([$status, (int)$id]);
}

function mc_opinion_toggle_featured($id) {
    mc_opinions_install();
    $stmt = mc_opinions_db()->prepare('UPDATE opiniones SET destacado=IF(destacado=1,0,1) WHERE id=?');
    return $stmt->execute([(int)$id]);
}

function mc_opinion_update($id, $data) {
    $allowed = ['pendiente','publicado','rechazado','oculto'];
    $status = (string)($data['estado'] ?? 'pendiente');
    if (!in_array($status, $allowed, true)) $status = 'pendiente';
    mc_opinions_install();
    $stmt = mc_opinions_db()->prepare('UPDATE opiniones SET nombre=?,sede=?,calificacion=?,comentario=?,estado=?,destacado=? WHERE id=?');
    return $stmt->execute([
        trim((string)($data['nombre'] ?? '')) ?: null,
        trim((string)($data['sede'] ?? '')),
        max(1, min(5, (int)($data['calificacion'] ?? 5))),
        trim((string)($data['comentario'] ?? '')),
        $status,
        !empty($data['destacado']) ? 1 : 0,
        (int)$id,
    ]);
}

function mc_opinion_delete($id) {
    mc_opinions_install();
    $stmt = mc_opinions_db()->prepare('DELETE FROM opiniones WHERE id=?');
    return $stmt->execute([(int)$id]);
}
