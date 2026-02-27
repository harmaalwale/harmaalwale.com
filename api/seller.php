<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }

require_once 'db.php';

$method = $_SERVER['REQUEST_METHOD'];

// ── Utility ─────────────────────────────────────────────────────────────────
function gen_ref() {
    return 'HW-' . strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 7));
}

function require_admin() {
    $headers = getallheaders();
    $token   = $headers['X-Admin-Token'] ?? ($_GET['token'] ?? '');
    $cfg     = require_once __DIR__ . '/db.php';
    // Simple token check — same admin credentials used in admin.php
    global $pdo;
    $stmt = $pdo->prepare("SELECT id FROM users WHERE role='admin' AND auth_token=? LIMIT 1");
    $stmt->execute([$token]);
    if (!$stmt->fetch()) { http_response_code(401); echo json_encode(['error'=>'Unauthorized']); exit; }
}

// ── Ensure table exists ──────────────────────────────────────────────────────
function ensure_table($pdo) {
    $pdo->exec("CREATE TABLE IF NOT EXISTS seller_applications (
        id            INT AUTO_INCREMENT PRIMARY KEY,
        ref_code      VARCHAR(20) UNIQUE NOT NULL,
        name          VARCHAR(200) NOT NULL,
        biz_name      VARCHAR(200) NOT NULL,
        email         VARCHAR(200) NOT NULL,
        phone         VARCHAR(30) NOT NULL,
        city          VARCHAR(100),
        gst           VARCHAR(20),
        address       TEXT,
        is_owner      VARCHAR(30),
        biz_type      VARCHAR(30),
        categories    TEXT,
        products      TEXT,
        source_type   VARCHAR(30),
        source_detail TEXT,
        is_authorized VARCHAR(30),
        brands        TEXT,
        stock         VARCHAR(30),
        plan          VARCHAR(20),
        heard         VARCHAR(60),
        website       VARCHAR(300),
        message       TEXT,
        status        ENUM('pending','approved','rejected','info_needed') DEFAULT 'pending',
        admin_notes   TEXT,
        reviewed_by   VARCHAR(100),
        reviewed_at   DATETIME,
        submitted_at  DATETIME DEFAULT CURRENT_TIMESTAMP,
        created_at    DATETIME DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}

// ══════════════════════════════════════════════════════════════════════════════
// POST — Submit new application
// ══════════════════════════════════════════════════════════════════════════════
if ($method === 'POST' && !isset($_GET['action'])) {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!$data) { echo json_encode(['error'=>'Invalid JSON']); exit; }

    $required = ['name','biz_name','email','phone'];
    foreach ($required as $f) {
        if (empty($data[$f])) {
            echo json_encode(['error'=>"Missing required field: $f"]);
            exit;
        }
    }

    ensure_table($pdo);

    $ref = gen_ref();
    $stmt = $pdo->prepare("INSERT INTO seller_applications
        (ref_code,name,biz_name,email,phone,city,gst,address,is_owner,biz_type,
         categories,products,source_type,source_detail,is_authorized,brands,
         stock,plan,heard,website,message,submitted_at)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $cats = is_array($data['categories'] ?? null) ? implode(',', $data['categories']) : ($data['categories'] ?? '');

    $stmt->execute([
        $ref,
        $data['name'], $data['biz_name'], $data['email'], $data['phone'],
        $data['city'] ?? '', $data['gst'] ?? '', $data['address'] ?? '',
        $data['is_owner'] ?? '', $data['biz_type'] ?? '',
        $cats, $data['products'] ?? '',
        $data['source_type'] ?? '', $data['source_detail'] ?? '',
        $data['is_authorized'] ?? '', $data['brands'] ?? '',
        $data['stock'] ?? '', $data['plan'] ?? '',
        $data['heard'] ?? '', $data['website'] ?? '',
        $data['message'] ?? '',
        $data['submitted_at'] ?? date('Y-m-d H:i:s')
    ]);

    echo json_encode(['success'=>true, 'ref_code'=>$ref]);
    exit;
}

// ══════════════════════════════════════════════════════════════════════════════
// GET — Admin list / stats / single
// All GET endpoints require admin token
// ══════════════════════════════════════════════════════════════════════════════
if ($method === 'GET') {
    ensure_table($pdo);

    // Auth check via session (admin already logged in via admin.html)
    session_start();
    if (empty($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
        http_response_code(401);
        echo json_encode(['error'=>'Admin access required']);
        exit;
    }

    $action = $_GET['action'] ?? 'list';

    if ($action === 'stats') {
        $stats = [];
        foreach (['pending','approved','rejected','info_needed'] as $s) {
            $row = $pdo->query("SELECT COUNT(*) as n FROM seller_applications WHERE status='$s'")->fetch(PDO::FETCH_ASSOC);
            $stats[$s] = (int)$row['n'];
        }
        $stats['total'] = array_sum($stats);
        echo json_encode($stats);
        exit;
    }

    if ($action === 'single' && isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM seller_applications WHERE id=? LIMIT 1");
        $stmt->execute([(int)$_GET['id']]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) { http_response_code(404); echo json_encode(['error'=>'Not found']); exit; }
        echo json_encode($row);
        exit;
    }

    // List with filters
    $status = $_GET['status'] ?? 'all';
    $search = $_GET['search'] ?? '';
    $page   = max(1, (int)($_GET['page'] ?? 1));
    $limit  = 20;
    $offset = ($page - 1) * $limit;

    $where = [];
    $params = [];
    if ($status !== 'all') { $where[] = 'status = ?'; $params[] = $status; }
    if ($search) {
        $where[] = '(name LIKE ? OR biz_name LIKE ? OR email LIKE ? OR ref_code LIKE ?)';
        $s = "%$search%";
        $params = array_merge($params, [$s,$s,$s,$s]);
    }
    $wClause = $where ? ('WHERE ' . implode(' AND ', $where)) : '';

    $total = $pdo->prepare("SELECT COUNT(*) FROM seller_applications $wClause");
    $total->execute($params);
    $totalCount = (int)$total->fetchColumn();

    $stmt = $pdo->prepare("SELECT id,ref_code,name,biz_name,email,phone,plan,status,submitted_at FROM seller_applications $wClause ORDER BY submitted_at DESC LIMIT $limit OFFSET $offset");
    $stmt->execute($params);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['applications'=>$rows, 'total'=>$totalCount, 'page'=>$page, 'pages'=>ceil($totalCount/$limit)]);
    exit;
}

// ══════════════════════════════════════════════════════════════════════════════
// PATCH — Update status / admin notes
// ══════════════════════════════════════════════════════════════════════════════
if ($method === 'PATCH' || ($method === 'POST' && isset($_GET['action']) && $_GET['action'] === 'update')) {
    session_start();
    if (empty($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
        http_response_code(401); echo json_encode(['error'=>'Admin access required']); exit;
    }

    ensure_table($pdo);
    $data = json_decode(file_get_contents('php://input'), true);
    $id   = (int)($data['id'] ?? $_GET['id'] ?? 0);
    if (!$id) { echo json_encode(['error'=>'Missing id']); exit; }

    $allowed = ['pending','approved','rejected','info_needed'];
    $status  = in_array($data['status'] ?? '', $allowed) ? $data['status'] : null;
    $notes   = $data['admin_notes'] ?? null;

    $sets = [];
    $params = [];
    if ($status) { $sets[] = 'status = ?'; $params[] = $status; }
    if ($notes !== null) { $sets[] = 'admin_notes = ?'; $params[] = $notes; }
    if ($status) {
        $sets[] = 'reviewed_at = NOW()';
        $sets[] = 'reviewed_by = ?';
        $params[] = $_SESSION['user_name'] ?? 'Admin';
    }
    if (!$sets) { echo json_encode(['error'=>'Nothing to update']); exit; }

    $params[] = $id;
    $pdo->prepare("UPDATE seller_applications SET " . implode(',', $sets) . " WHERE id=?")->execute($params);
    echo json_encode(['success'=>true]);
    exit;
}

echo json_encode(['error'=>'Invalid request']);
