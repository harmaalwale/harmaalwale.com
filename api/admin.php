<?php
// ============================================================
//  HarmaalWale — Admin Dashboard API
// ============================================================
error_reporting(0);
ini_set('display_errors', 0);
require_once 'db.php';
requireAdmin();

$db     = getDB();
$action = $_GET['action'] ?? 'stats';
$method = $_SERVER['REQUEST_METHOD'];

// ── Helper: safe query that never crashes if table missing ───
function safeCount($db, $sql) {
    $r = $db->query($sql);
    if (!$r) return 0;
    $row = $r->fetch_assoc();
    return $row ? (int)($row['c'] ?? $row['s'] ?? 0) : 0;
}
function safeRows($db, $sql) {
    $r = $db->query($sql);
    if (!$r) return [];
    return $r->fetch_all(MYSQLI_ASSOC);
}

// ── Ensure tables exist so stats never crash ─────────────────
$db->query("CREATE TABLE IF NOT EXISTS orders (
    id             INT AUTO_INCREMENT PRIMARY KEY,
    user_id        INT NOT NULL,
    order_number   VARCHAR(30) NOT NULL,
    status         VARCHAR(30) NOT NULL DEFAULT 'pending',
    payment_status VARCHAR(30) NOT NULL DEFAULT 'pending',
    payment_method VARCHAR(30) DEFAULT 'COD',
    subtotal       DECIMAL(10,2) DEFAULT 0,
    shipping       DECIMAL(10,2) DEFAULT 0,
    total          DECIMAL(10,2) DEFAULT 0,
    notes          TEXT,
    address_id     INT DEFAULT NULL,
    created_at     DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$db->query("CREATE TABLE IF NOT EXISTS products (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(200) NOT NULL,
    category_id INT DEFAULT 1,
    price       DECIMAL(10,2) DEFAULT 0,
    stock       INT DEFAULT 0,
    size        VARCHAR(100) DEFAULT NULL,
    fabric      VARCHAR(100) DEFAULT NULL,
    description TEXT,
    image       VARCHAR(200) DEFAULT NULL,
    status      VARCHAR(20) NOT NULL DEFAULT 'active',
    shoulder    VARCHAR(20) DEFAULT NULL,
    chest       VARCHAR(20) DEFAULT NULL,
    length      VARCHAR(20) DEFAULT NULL,
    sleeve      VARCHAR(20) DEFAULT NULL,
    neck        VARCHAR(20) DEFAULT NULL,
    created_at  DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$db->query("CREATE TABLE IF NOT EXISTS enquiries (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    user_id    INT DEFAULT NULL,
    name       VARCHAR(120) NOT NULL,
    email      VARCHAR(160) NOT NULL,
    phone      VARCHAR(30) DEFAULT NULL,
    product_id INT DEFAULT NULL,
    subject    VARCHAR(200) DEFAULT NULL,
    message    TEXT NOT NULL,
    status     VARCHAR(20) NOT NULL DEFAULT 'new',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$db->query("CREATE TABLE IF NOT EXISTS notify_list (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    email      VARCHAR(160) NOT NULL,
    category   VARCHAR(60) DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$db->query("CREATE TABLE IF NOT EXISTS wishlist (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    user_id    INT NOT NULL,
    product_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

$db->query("CREATE TABLE IF NOT EXISTS cart (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    user_id    INT NOT NULL,
    product_id INT NOT NULL,
    quantity   INT DEFAULT 1,
    size       VARCHAR(50) DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

// ── STATS ────────────────────────────────────────────────────
if ($action === 'stats' && $method === 'GET') {
    $stats = [];
    $stats['total_users']    = safeCount($db, "SELECT COUNT(*) c FROM users WHERE role='customer'");
    $stats['total_orders']   = safeCount($db, "SELECT COUNT(*) c FROM orders");
    $stats['pending_orders'] = safeCount($db, "SELECT COUNT(*) c FROM orders WHERE status='pending'");
    $stats['total_revenue']  = safeCount($db, "SELECT COALESCE(SUM(total),0) s FROM orders WHERE payment_status='paid'");
    $stats['total_products'] = safeCount($db, "SELECT COUNT(*) c FROM products WHERE status='active'");
    $stats['new_enquiries']  = safeCount($db, "SELECT COUNT(*) c FROM enquiries WHERE status='new'");
    $stats['total_enquiries']= safeCount($db, "SELECT COUNT(*) c FROM enquiries");
    $stats['notify_count']   = safeCount($db, "SELECT COUNT(*) c FROM notify_list");
    $stats['wishlist_count'] = safeCount($db, "SELECT COUNT(*) c FROM wishlist");
    $stats['cart_count']     = safeCount($db, "SELECT COUNT(*) c FROM cart");

    $stats['recent_orders']  = safeRows($db,
        "SELECT o.id,o.order_number,o.total,o.status,o.created_at,
                u.name AS user_name, u.email AS user_email
         FROM orders o JOIN users u ON o.user_id=u.id
         ORDER BY o.created_at DESC LIMIT 5");

    $stats['recent_users']   = safeRows($db,
        "SELECT id,name,email,phone,verified,created_at
         FROM users WHERE role='customer' ORDER BY created_at DESC LIMIT 5");

    $stats['top_wishlisted'] = safeRows($db,
        "SELECT p.name, COUNT(*) AS wish_count
         FROM wishlist w JOIN products p ON w.product_id=p.id
         GROUP BY p.id ORDER BY wish_count DESC LIMIT 5");

    $db->close();
    jsonResponse(['success' => true, 'stats' => $stats, 'recent_orders' => $stats['recent_orders'], 'recent_users' => $stats['recent_users'], 'top_wishlisted' => $stats['top_wishlisted']]);
}

// ── ALL USERS ─────────────────────────────────────────────────
if ($action === 'users' && $method === 'GET') {
    $search = $_GET['search'] ?? '';
    if ($search) {
        $stmt = $db->prepare("SELECT id,name,email,phone,role,verified,created_at FROM users WHERE (name LIKE ? OR email LIKE ? OR phone LIKE ?) ORDER BY created_at DESC");
        $q = "%$search%";
        $stmt->bind_param('sss', $q, $q, $q);
    } else {
        $stmt = $db->prepare("SELECT id,name,email,phone,role,verified,created_at FROM users ORDER BY created_at DESC");
    }

    // Also get order count per user
    $users = [];
    $stmt->execute();
    $rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    foreach ($rows as &$u) {
        $oc = $db->prepare("SELECT COUNT(*) c FROM orders WHERE user_id=?");
        $oc->bind_param('i', $u['id']);
        $oc->execute();
        $u['order_count'] = (int)($oc->get_result()->fetch_assoc()['c'] ?? 0);
        $oc->close();
    }
    $db->close();
    jsonResponse(['success' => true, 'users' => $rows, 'count' => count($rows)]);
}

// ── SINGLE USER ───────────────────────────────────────────────
if ($action === 'user' && $method === 'GET' && isset($_GET['id'])) {
    $uid  = intval($_GET['id']);
    $stmt = $db->prepare("SELECT id,name,email,phone,role,verified,created_at FROM users WHERE id=?");
    $stmt->bind_param('i', $uid); $stmt->execute();
    $u = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    if (!$u) { $db->close(); jsonResponse(['error' => 'User not found'], 404); }

    $o = $db->prepare("SELECT id,order_number,total,status,created_at FROM orders WHERE user_id=? ORDER BY created_at DESC");
    $o->bind_param('i', $uid); $o->execute();
    $u['orders'] = $o->get_result()->fetch_all(MYSQLI_ASSOC);
    $o->close();

    $a = $db->prepare("SELECT * FROM addresses WHERE user_id=? ORDER BY id DESC");
    if ($a) { $a->bind_param('i', $uid); $a->execute(); $u['addresses'] = $a->get_result()->fetch_all(MYSQLI_ASSOC); $a->close(); }
    else { $u['addresses'] = []; }

    $e = $db->prepare("SELECT id,subject,message,status,created_at FROM enquiries WHERE user_id=? ORDER BY created_at DESC");
    if ($e) { $e->bind_param('i', $uid); $e->execute(); $u['enquiries'] = $e->get_result()->fetch_all(MYSQLI_ASSOC); $e->close(); }
    else { $u['enquiries'] = []; }

    $db->close();
    jsonResponse(['success' => true, 'user' => $u]);
}

// ── UPDATE USER ───────────────────────────────────────────────
if ($action === 'user' && $method === 'PUT' && isset($_GET['id'])) {
    $uid  = intval($_GET['id']);
    $b    = getBody();
    if (isset($b['role'])) {
        $s = $db->prepare("UPDATE users SET role=? WHERE id=?");
        $s->bind_param('si', $b['role'], $uid); $s->execute(); $s->close();
    }
    if (isset($b['verified'])) {
        $v = intval($b['verified']);
        $s = $db->prepare("UPDATE users SET verified=? WHERE id=?");
        $s->bind_param('ii', $v, $uid); $s->execute(); $s->close();
    }
    $db->close();
    jsonResponse(['success' => true, 'message' => 'User updated']);
}

jsonResponse(['error' => 'Unknown action or method'], 400);
