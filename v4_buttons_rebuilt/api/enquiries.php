<?php
// Enquiries API
require_once 'db.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method==='POST') {
    $b=getBody();
    if (!($b['name']??'')||!($b['email']??'')||!($b['message']??''))
        jsonResponse(['error'=>'Name, email and message required'],400);
    $db=getDB();
    // Optional: link to logged-in user
    $uid=null;
    $h=$_SERVER['HTTP_AUTHORIZATION']??'';
    if ($h) { $t=str_replace('Bearer ','',$h); $u=verifyToken($t); if($u) $uid=$u['uid']; }
    $pid=intval($b['product_id']??0)||null;
    $s=$db->prepare("INSERT INTO enquiries (user_id,name,email,phone,product_id,subject,message) VALUES (?,?,?,?,?,?,?)");
    $s->bind_param('isssisss',$uid,$b['name'],$b['email'],$b['phone']??'',$pid,$b['subject']??'',$b['message']);

    // Fix bind
    $s2=$db->prepare("INSERT INTO enquiries (user_id,name,email,phone,product_id,subject,message) VALUES (?,?,?,?,?,?,?)");
    $s2->bind_param('isssiss',$uid,$b['name'],$b['email'],$b['phone']??'',$pid,$b['subject']??'',$b['message']);
    $s2->execute();
    $db->close();
    jsonResponse(['success'=>true,'message'=>'Enquiry submitted! We will contact you soon.'],201);
}

if ($method==='GET') {
    requireAdmin();
    $db=$db=getDB();
    $status=$_GET['status']??'';
    $where=$status?"WHERE status='$status'":'';
    $rows=$db->query("SELECT e.*,p.name as product_name FROM enquiries e LEFT JOIN products p ON e.product_id=p.id $where ORDER BY e.created_at DESC LIMIT 100")->fetch_all(MYSQLI_ASSOC);
    $db->close();
    jsonResponse(['success'=>true,'enquiries'=>$rows,'count'=>count($rows)]);
}

if ($method==='PUT'&&isset($_GET['id'])) {
    requireAdmin(); $id=intval($_GET['id']);
    $status=getBody()['status']??'read';
    $db=getDB(); $db->prepare("UPDATE enquiries SET status=? WHERE id=?")->bind_param('si',$status,$id)->execute(); $db->close();
    jsonResponse(['success'=>true,'message'=>'Updated']);
}
