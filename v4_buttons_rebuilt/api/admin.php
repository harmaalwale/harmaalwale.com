<?php
// ============================================================
//  HarmaalWale — Admin Dashboard API
//  GET /api/admin.php?action=stats     — dashboard stats
//  GET /api/admin.php?action=users     — all users
//  GET /api/admin.php?action=user&id=1 — single user detail
//  PUT /api/admin.php?action=user&id=1 — update user role/status
// ============================================================
require_once 'db.php';
requireAdmin();
$db     = getDB();
$action = $_GET['action'] ?? 'stats';
$method = $_SERVER['REQUEST_METHOD'];

if ($action==='stats' && $method==='GET') {
    $stats = [];
    $stats['total_users']    = $db->query("SELECT COUNT(*) c FROM users WHERE role='customer'")->fetch_assoc()['c'];
    $stats['total_orders']   = $db->query("SELECT COUNT(*) c FROM orders")->fetch_assoc()['c'];
    $stats['pending_orders'] = $db->query("SELECT COUNT(*) c FROM orders WHERE status='pending'")->fetch_assoc()['c'];
    $stats['total_revenue']  = $db->query("SELECT COALESCE(SUM(total),0) s FROM orders WHERE payment_status='paid'")->fetch_assoc()['s'];
    $stats['total_products'] = $db->query("SELECT COUNT(*) c FROM products WHERE status='active'")->fetch_assoc()['c'];
    $stats['new_enquiries']  = $db->query("SELECT COUNT(*) c FROM enquiries WHERE status='new'")->fetch_assoc()['c'];
    $stats['notify_count']   = $db->query("SELECT COUNT(*) c FROM notify_list")->fetch_assoc()['c'];
    $stats['wishlist_count'] = $db->query("SELECT COUNT(*) c FROM wishlist")->fetch_assoc()['c'];

    // Recent 5 orders
    $stats['recent_orders'] = $db->query(
        "SELECT o.id,o.order_number,o.total,o.status,o.created_at,u.name,u.email
         FROM orders o JOIN users u ON o.user_id=u.id
         ORDER BY o.created_at DESC LIMIT 5")->fetch_all(MYSQLI_ASSOC);

    // Recent 5 signups
    $stats['recent_users'] = $db->query(
        "SELECT id,name,email,phone,created_at FROM users
         WHERE role='customer' ORDER BY created_at DESC LIMIT 5")->fetch_all(MYSQLI_ASSOC);

    // Top products by wishlist
    $stats['top_wishlisted'] = $db->query(
        "SELECT p.name, COUNT(*) cnt FROM wishlist w
         JOIN products p ON w.product_id=p.id
         GROUP BY p.id ORDER BY cnt DESC LIMIT 5")->fetch_all(MYSQLI_ASSOC);

    $db->close();
    jsonResponse(['success'=>true,'stats'=>$stats]);
}

if ($action==='users' && $method==='GET') {
    $search = $_GET['search']??'';
    $where  = $search ? "WHERE (name LIKE ? OR email LIKE ? OR phone LIKE ?)" : '';
    $sql    = "SELECT id,name,email,phone,role,verified,created_at FROM users $where ORDER BY created_at DESC";
    $stmt   = $db->prepare($sql);
    if ($search) { $q="%$search%"; $stmt->bind_param('sss',$q,$q,$q); }
    $stmt->execute();
    $users = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $db->close();
    jsonResponse(['success'=>true,'users'=>$users,'count'=>count($users)]);
}

if ($action==='user' && $method==='GET' && isset($_GET['id'])) {
    $uid  = intval($_GET['id']);
    $user = $db->prepare("SELECT id,name,email,phone,role,verified,created_at FROM users WHERE id=?");
    $user->bind_param('i',$uid); $user->execute();
    $u = $user->get_result()->fetch_assoc();
    if (!$u) jsonResponse(['error'=>'User not found'],404);

    $orders = $db->prepare("SELECT id,order_number,total,status,created_at FROM orders WHERE user_id=? ORDER BY created_at DESC");
    $orders->bind_param('i',$uid); $orders->execute();
    $u['orders'] = $orders->get_result()->fetch_all(MYSQLI_ASSOC);

    $addr = $db->prepare("SELECT * FROM addresses WHERE user_id=?");
    $addr->bind_param('i',$uid); $addr->execute();
    $u['addresses'] = $addr->get_result()->fetch_all(MYSQLI_ASSOC);

    $enq = $db->prepare("SELECT * FROM enquiries WHERE user_id=? ORDER BY created_at DESC");
    $enq->bind_param('i',$uid); $enq->execute();
    $u['enquiries'] = $enq->get_result()->fetch_all(MYSQLI_ASSOC);

    $db->close();
    jsonResponse(['success'=>true,'user'=>$u]);
}

if ($action==='user' && $method==='PUT' && isset($_GET['id'])) {
    $uid  = intval($_GET['id']);
    $b    = getBody();
    $role = $b['role'] ?? null;
    $verified = isset($b['verified']) ? intval($b['verified']) : null;
    if ($role) {
        $db->prepare("UPDATE users SET role=? WHERE id=?")->bind_param('si',$role,$uid)->execute();
    }
    if ($verified!==null) {
        $db->prepare("UPDATE users SET verified=? WHERE id=?")->bind_param('ii',$verified,$uid)->execute();
    }
    $db->close();
    jsonResponse(['success'=>true,'message'=>'User updated']);
}
