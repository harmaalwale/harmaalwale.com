<?php
// ============================================================
//  HarmaalWale — Cart API
//  GET    /api/cart.php          — get my cart
//  POST   /api/cart.php          — add item
//  PUT    /api/cart.php?id=1     — update quantity
//  DELETE /api/cart.php?id=1     — remove item
//  DELETE /api/cart.php?clear=1  — clear cart
// ============================================================
require_once 'db.php';
$auth   = requireAuth();
$uid    = $auth['uid'];
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $db   = getDB();
    $stmt = $db->prepare(
        "SELECT c.id, c.product_id, c.quantity,
                p.name, p.price, p.image, p.size, p.fabric, p.stock
         FROM cart c JOIN products p ON c.product_id=p.id
         WHERE c.user_id=? ORDER BY c.created_at DESC");
    $stmt->bind_param('i', $uid);
    $stmt->execute();
    $items = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

    $subtotal = array_sum(array_map(fn($i) => $i['price'] * $i['quantity'], $items));
    $db->close();
    jsonResponse(['success'=>true,'items'=>$items,'subtotal'=>round($subtotal,2),'count'=>count($items)]);
}

if ($method === 'POST') {
    $b  = getBody();
    $pid = intval($b['product_id'] ?? 0);
    $qty = intval($b['quantity'] ?? 1);
    if (!$pid || $qty < 1) jsonResponse(['error'=>'Invalid product or quantity'], 400);

    $db = getDB();
    $stmt = $db->prepare(
        "INSERT INTO cart (user_id,product_id,quantity) VALUES (?,?,?)
         ON DUPLICATE KEY UPDATE quantity=quantity+?");
    $stmt->bind_param('iiii', $uid, $pid, $qty, $qty);
    $stmt->execute();
    $db->close();
    jsonResponse(['success'=>true,'message'=>'Added to cart']);
}

if ($method === 'PUT' && isset($_GET['id'])) {
    $cartId = intval($_GET['id']);
    $qty    = intval(getBody()['quantity'] ?? 1);
    if ($qty < 1) {
        $db = getDB();
        $db->prepare("DELETE FROM cart WHERE id=? AND user_id=?")->bind_param('ii',$cartId,$uid)->execute();
    } else {
        $db = getDB();
        $db->prepare("UPDATE cart SET quantity=? WHERE id=? AND user_id=?")->bind_param('iii',$qty,$cartId,$uid)->execute();
    }
    $db->close();
    jsonResponse(['success'=>true,'message'=>'Cart updated']);
}

if ($method === 'DELETE') {
    $db = getDB();
    if (isset($_GET['clear'])) {
        $db->prepare("DELETE FROM cart WHERE user_id=?")->bind_param('i',$uid)->execute();
        jsonResponse(['success'=>true,'message'=>'Cart cleared']);
    }
    $cartId = intval($_GET['id'] ?? 0);
    $db->prepare("DELETE FROM cart WHERE id=? AND user_id=?")->bind_param('ii',$cartId,$uid)->execute();
    $db->close();
    jsonResponse(['success'=>true,'message'=>'Item removed']);
}
