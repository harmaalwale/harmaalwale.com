<?php
// ============================================================
//  HarmaalWale — Database Configuration
//  Edit these values in cPanel > MySQL Databases
// ============================================================
define('DB_HOST', 'localhost');
define('DB_USER', 'harmakko_hw_admin');
define('DB_PASS', 'Harmaalwale@2026');
define('DB_NAME', 'harmakko_users');

define('JWT_SECRET', 'hw_secret_key_change_me_2025'); // Change this

function getDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        http_response_code(500);
        die(json_encode(['error' => 'Database connection failed']));
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}

function jsonResponse($data, $code = 200) {
    http_response_code($code);
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    echo json_encode($data);
    exit;
}

function getBody() {
    return json_decode(file_get_contents('php://input'), true) ?? [];
}

// Simple JWT-like token using HMAC
function createToken($userId, $email, $role) {
    $payload = base64_encode(json_encode([
        'uid'   => $userId,
        'email' => $email,
        'role'  => $role,
        'exp'   => time() + (7 * 24 * 3600) // 7 days
    ]));
    $sig = base64_encode(hash_hmac('sha256', $payload, JWT_SECRET, true));
    return $payload . '.' . $sig;
}

function verifyToken($token) {
    if (!$token) return null;
    $parts = explode('.', $token);
    if (count($parts) !== 2) return null;
    [$payload, $sig] = $parts;
    $expected = base64_encode(hash_hmac('sha256', $payload, JWT_SECRET, true));
    if (!hash_equals($expected, $sig)) return null;
    $data = json_decode(base64_decode($payload), true);
    if ($data['exp'] < time()) return null;
    return $data;
}

function requireAuth() {
    $h = $_SERVER['HTTP_AUTHORIZATION'] ?? '';
    $token = str_replace('Bearer ', '', $h);
    $user = verifyToken($token);
    if (!$user) jsonResponse(['error' => 'Unauthorized'], 401);
    return $user;
}

function requireAdmin() {
    $user = requireAuth();
    if ($user['role'] !== 'admin') jsonResponse(['error' => 'Forbidden'], 403);
    return $user;
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    exit(0);
}
