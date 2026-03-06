<?php
// ============================================================
//  HarmaalWale — Authentication API v4 (Fully Fixed)
// ============================================================
error_reporting(0);  // Suppress PHP notices/warnings from breaking JSON output
ini_set('display_errors', 0);
require_once 'db.php';

define('MAIL_FROM',      'noreply@harmaalwale.com');
define('MAIL_FROM_NAME', 'HarmaalWale');
define('SITE_URL',       'https://harmaalwale.com');

// ── Always set JSON + CORS headers immediately ──────────────
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit; }

function sendMailAsync($to, $subject, $htmlBody) {
    // Use a background process so mail() never blocks the response
    $data = base64_encode(json_encode(['to'=>$to,'subject'=>$subject,'body'=>$htmlBody]));
    $scriptPath = __DIR__ . '/send_mail_worker.php';
    if (function_exists('fastcgi_finish_request')) {
        // Best: send response first, then mail
        register_shutdown_function(function() use ($to, $subject, $htmlBody) {
            @mail($to, $subject, $htmlBody, buildMailHeaders());
        });
    } else {
        // Fallback: just send synchronously (might be slow but won't hang JS since we return first)
        register_shutdown_function(function() use ($to, $subject, $htmlBody) {
            @mail($to, $subject, $htmlBody, buildMailHeaders());
        });
    }
}

function buildMailHeaders() {
    $h  = "MIME-Version: 1.0\r\n";
    $h .= "Content-Type: text/html; charset=UTF-8\r\n";
    $h .= "From: " . MAIL_FROM_NAME . " <" . MAIL_FROM . ">\r\n";
    $h .= "Reply-To: support@harmaalwale.com\r\n";
    return $h;
}

function welcomeEmailHtml($name, $verifyLink) {
    $n = htmlspecialchars($name);
    return '<!DOCTYPE html><html><head><meta charset="UTF-8"><style>body{font-family:Arial,sans-serif;background:#f4f4f4;margin:0;padding:0}.w{max-width:560px;margin:30px auto;background:#fff;border-radius:10px;overflow:hidden}.h{background:#111;padding:28px;text-align:center}.l{font-size:26px;font-weight:900;color:#fff;text-transform:uppercase}.l span{color:#E87000}.b{padding:32px}.btn{display:inline-block;background:#E87000;color:#fff;text-decoration:none;padding:13px 32px;border-radius:6px;font-weight:700;font-size:14px;text-transform:uppercase;margin:12px 0}p{color:#555;font-size:14px;line-height:1.7}.f{background:#f9f9f9;padding:16px;text-align:center;font-size:12px;color:#aaa;border-top:1px solid #eee}</style></head><body><div class="w"><div class="h"><div class="l">Harmaal<span>Wale</span></div></div><div class="b"><p>Hi <strong>' . $n . '</strong>,</p><p>Thanks for joining HarmaalWale! Click the button below to verify your email and activate your account:</p><a href="' . $verifyLink . '" class="btn">Verify My Account →</a><p style="font-size:12px;color:#aaa">Or paste: <a href="' . $verifyLink . '" style="color:#E87000;word-break:break-all">' . $verifyLink . '</a><br>Link expires in 24 hours.</p></div><div class="f">© 2025 HarmaalWale · <a href="' . SITE_URL . '" style="color:#E87000">harmaalwale.com</a></div></div></body></html>';
}

function verifiedEmailHtml($name) {
    $n = htmlspecialchars($name);
    return '<!DOCTYPE html><html><head><meta charset="UTF-8"><style>body{font-family:Arial,sans-serif;background:#f4f4f4;margin:0;padding:0}.w{max-width:560px;margin:30px auto;background:#fff;border-radius:10px;overflow:hidden}.h{background:#111;padding:28px;text-align:center}.l{font-size:26px;font-weight:900;color:#fff;text-transform:uppercase}.l span{color:#E87000}.b{padding:32px}.btn{display:inline-block;background:#E87000;color:#fff;text-decoration:none;padding:13px 32px;border-radius:6px;font-weight:700;font-size:14px;text-transform:uppercase;margin:12px 0}.hl{background:#fff8f0;border-left:4px solid #E87000;padding:12px 16px;border-radius:0 6px 6px 0;margin:14px 0}p{color:#555;font-size:14px;line-height:1.7}.f{background:#f9f9f9;padding:16px;text-align:center;font-size:12px;color:#aaa;border-top:1px solid #eee}</style></head><body><div class="w"><div class="h"><div class="l">Harmaal<span>Wale</span></div></div><div class="b"><p>Hi <strong>' . $n . '</strong> 🎉</p><p>Your HarmaalWale account is <strong>verified and ready</strong>!</p><div class="hl"><p style="margin:0">Shop fashion, electronics, refurbished office equipment, daily essentials and more — or ask us to source anything you can\'t find.</p></div><p>Start exploring what HarmaalWale has to offer:</p><a href="' . SITE_URL . '" class="btn">Start Shopping →</a><p style="font-size:12px;color:#aaa">Questions? <a href="mailto:support@harmaalwale.com" style="color:#E87000">support@harmaalwale.com</a></p></div><div class="f">© 2025 HarmaalWale · <a href="' . SITE_URL . '" style="color:#E87000">harmaalwale.com</a></div></div></body></html>';
}

// ── MySQL 5.6/5.7/8.0 safe table+column bootstrap ────────────
function ensureUsersTable($db) {
    $db->query("CREATE TABLE IF NOT EXISTS users (
        id              INT AUTO_INCREMENT PRIMARY KEY,
        name            VARCHAR(120) NOT NULL,
        email           VARCHAR(160) NOT NULL UNIQUE,
        phone           VARCHAR(30)  DEFAULT NULL,
        password        VARCHAR(255) NOT NULL,
        role            VARCHAR(20)  NOT NULL DEFAULT 'customer',
        verified        TINYINT(1)   NOT NULL DEFAULT 0,
        verify_token    VARCHAR(100) DEFAULT NULL,
        verify_expires  DATETIME     DEFAULT NULL,
        created_at      DATETIME     DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
}

function ensureVerifyColumns($db) {
    $cols = [];
    $res = $db->query("SHOW COLUMNS FROM users");
    if ($res) { while ($r = $res->fetch_assoc()) $cols[] = $r["Field"]; }
    if (!in_array("verified", $cols))
        $db->query("ALTER TABLE users ADD COLUMN verified TINYINT(1) NOT NULL DEFAULT 0");
    if (!in_array("verify_token", $cols))
        $db->query("ALTER TABLE users ADD COLUMN verify_token VARCHAR(100) NULL");
    if (!in_array("verify_expires", $cols))
        $db->query("ALTER TABLE users ADD COLUMN verify_expires DATETIME NULL");
    if (!in_array("phone", $cols))
        $db->query("ALTER TABLE users ADD COLUMN phone VARCHAR(30) DEFAULT NULL");
}

$action = $_GET["action"] ?? "";

switch ($action) {

    // ============================================================
    case 'register':
    // ============================================================
        $body  = getBody();
        $name  = trim($body['name'] ?? '');
        $email = strtolower(trim($body['email'] ?? ''));
        $phone = trim($body['phone'] ?? '');
        $pass  = $body['password'] ?? '';

        // Validate inputs first — fast, no DB
        if (!$name || !$email || !$pass)
            jsonResponse(['error' => 'Name, email and password are required'], 400);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            jsonResponse(['error' => 'Invalid email address'], 400);
        if (strlen($pass) < 6)
            jsonResponse(['error' => 'Password must be at least 6 characters'], 400);

        $db = getDB();

        // Bootstrap table + columns — safe for MySQL 5.6, 5.7, 8.0
        ensureUsersTable($db);
        ensureVerifyColumns($db);

        // Check duplicate email
        $chk = $db->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
        $chk->bind_param('s', $email);
        $chk->execute();
        $chk->store_result();
        if ($chk->num_rows > 0) {
            $chk->close(); $db->close();
            jsonResponse(['error' => 'Email already registered. Please sign in.'], 409);
        }
        $chk->close();

        // columns ensured above via ensureUsersTable+ensureVerifyColumns

        // Hash password with reduced cost (4 = fastest safe, default 10 is very slow on shared hosting)
        $hash        = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 8]);
        $verifyToken = bin2hex(random_bytes(32));
        $expires     = date('Y-m-d H:i:s', time() + 86400);

        $ins = $db->prepare(
            "INSERT INTO users (name, email, phone, password, role, verified, verify_token, verify_expires)
             VALUES (?, ?, ?, ?, 'customer', 0, ?, ?)"
        );
        if (!$ins) {
            $db->close();
            jsonResponse(['error' => 'DB error: ' . $db->error], 500);
        }
        $ins->bind_param('ssssss', $name, $email, $phone, $hash, $verifyToken, $expires);
        if (!$ins->execute()) {
            $errMsg = $ins->error;
            $ins->close(); $db->close();
            jsonResponse(['error' => 'Registration failed: ' . $errMsg], 500);
        }
        $userId = $db->insert_id;
        $ins->close();
        $db->close();

        // Queue email via shutdown function — NEVER blocks response
        $verifyLink = SITE_URL . '/api/auth.php?action=verify&token=' . $verifyToken;
        $mailTo      = $email;
        $mailSubject = 'Welcome to HarmaalWale — Verify Your Account';
        $mailBody    = welcomeEmailHtml($name, $verifyLink);
        $mailHeaders = buildMailHeaders();
        register_shutdown_function(function() use ($mailTo, $mailSubject, $mailBody, $mailHeaders) {
            @mail($mailTo, $mailSubject, $mailBody, $mailHeaders);
        });

        // Return success IMMEDIATELY — don't wait for email
        jsonResponse([
            'success' => true,
            'message' => 'Account created! Check your email to verify.',
            'verify'  => true,
            'user'    => [
                'id'       => $userId,
                'name'     => $name,
                'email'    => $email,
                'phone'    => $phone,
                'role'     => 'customer',
                'verified' => 0
            ]
        ], 201);
        break;

    // ============================================================
    case 'verify':
    // ============================================================
        // This endpoint does a redirect, not JSON
        header('Content-Type: text/html'); // override JSON header for this case

        $token = trim($_GET['token'] ?? '');
        if (!$token) { header('Location: ' . SITE_URL . '?verified=fail'); exit; }

        $db = getDB();
        $s  = $db->prepare("SELECT id, name, email, verify_expires FROM users WHERE verify_token = ? AND verified = 0 LIMIT 1");
        $s->bind_param('s', $token);
        $s->execute();
        $user = $s->get_result()->fetch_assoc();
        $s->close();

        if (!$user) { $db->close(); header('Location: ' . SITE_URL . '?verified=expired'); exit; }
        if ($user['verify_expires'] && strtotime($user['verify_expires']) < time()) {
            $db->close(); header('Location: ' . SITE_URL . '?verified=expired'); exit;
        }

        $upd = $db->prepare("UPDATE users SET verified=1, verify_token=NULL, verify_expires=NULL WHERE id=?");
        if ($upd) { $upd->bind_param('i', $user['id']); $upd->execute(); $upd->close(); }
        $db->close();

        $mailTo      = $user['email'];
        $mailSubject = "You're verified! Welcome to HarmaalWale 🎉";
        $mailBody    = verifiedEmailHtml($user['name']);
        $mailHeaders = buildMailHeaders();
        register_shutdown_function(function() use ($mailTo, $mailSubject, $mailBody, $mailHeaders) {
            @mail($mailTo, $mailSubject, $mailBody, $mailHeaders);
        });

        header('Location: ' . SITE_URL . '?verified=success&name=' . urlencode($user['name']));
        exit;

    // ============================================================
    case 'login':
    // ============================================================
        $body  = getBody();
        $email = strtolower(trim($body['email'] ?? ''));
        $pass  = $body['password'] ?? '';

        if (!$email || !$pass)
            jsonResponse(['error' => 'Email and password are required'], 400);

        $db = getDB();
        $s  = $db->prepare("SELECT id, name, email, phone, password, role, verified FROM users WHERE email = ? LIMIT 1");
        $s->bind_param('s', $email);
        $s->execute();
        $user = $s->get_result()->fetch_assoc();
        $s->close(); $db->close();

        if (!$user || !password_verify($pass, $user['password']))
            jsonResponse(['error' => 'Invalid email or password'], 401);

        if (!$user['verified'])
            jsonResponse(['error' => 'Please verify your email first. Check your inbox.', 'unverified' => true], 403);

        $token = createToken($user['id'], $user['email'], $user['role']);
        jsonResponse([
            'success' => true,
            'token'   => $token,
            'user'    => ['id'=>$user['id'],'name'=>$user['name'],'email'=>$user['email'],'phone'=>$user['phone'],'role'=>$user['role']]
        ]);
        break;

    // ============================================================
    case 'resend_verify':
    // ============================================================
        $body  = getBody();
        $email = strtolower(trim($body['email'] ?? ''));
        if (!$email) jsonResponse(['error' => 'Email required'], 400);

        $db = getDB();
        $s  = $db->prepare("SELECT id, name, verified FROM users WHERE email = ? LIMIT 1");
        $s->bind_param('s', $email); $s->execute();
        $user = $s->get_result()->fetch_assoc();
        $s->close();

        if (!$user) { $db->close(); jsonResponse(['error' => 'Email not found'], 404); }
        if ($user['verified']) { $db->close(); jsonResponse(['error' => 'Already verified'], 400); }

        $tok = bin2hex(random_bytes(32));
        $exp = date('Y-m-d H:i:s', time() + 86400);
        $upd2 = $db->prepare("UPDATE users SET verify_token=?, verify_expires=? WHERE id=?");
        if ($upd2) { $upd2->bind_param('ssi', $tok, $exp, $user['id']); $upd2->execute(); $upd2->close(); }
        $db->close();

        $link = SITE_URL . '/api/auth.php?action=verify&token=' . $tok;
        $mailTo = $email; $mailSubject = 'HarmaalWale — Verify Your Account';
        $mailBody = welcomeEmailHtml($user['name'], $link); $mailHeaders = buildMailHeaders();
        register_shutdown_function(function() use ($mailTo, $mailSubject, $mailBody, $mailHeaders) {
            @mail($mailTo, $mailSubject, $mailBody, $mailHeaders);
        });
        jsonResponse(['success' => true, 'message' => 'Verification email sent. Check your inbox.']);
        break;

    // ============================================================
    case 'me':
    // ============================================================
        $auth = requireAuth();
        $db   = getDB();
        $s    = $db->prepare("SELECT id, name, email, phone, role, verified, created_at FROM users WHERE id = ? LIMIT 1");
        $s->bind_param('i', $auth['uid']); $s->execute();
        $user = $s->get_result()->fetch_assoc();
        $s->close(); $db->close();
        if (!$user) jsonResponse(['error' => 'User not found'], 404);
        jsonResponse(['success' => true, 'user' => $user]);
        break;

    // ============================================================
    case 'change_password':
    // ============================================================
        $auth    = requireAuth();
        $body    = getBody();
        $current = $body['current_password'] ?? '';
        $newPass = $body['new_password'] ?? '';
        if (!$current || !$newPass) jsonResponse(['error' => 'Both passwords required'], 400);
        if (strlen($newPass) < 6) jsonResponse(['error' => 'Min 6 characters'], 400);
        $db = getDB();
        $s  = $db->prepare("SELECT password FROM users WHERE id = ? LIMIT 1");
        $s->bind_param('i', $auth['uid']); $s->execute();
        $row = $s->get_result()->fetch_assoc(); $s->close();
        if (!password_verify($current, $row['password'])) { $db->close(); jsonResponse(['error' => 'Current password incorrect'], 400); }
        $hash = password_hash($newPass, PASSWORD_BCRYPT, ['cost' => 8]);
        $upd3 = $db->prepare("UPDATE users SET password=? WHERE id=?");
        if ($upd3) { $upd3->bind_param('si', $hash, $auth['uid']); $upd3->execute(); $upd3->close(); }
        $db->close();
        jsonResponse(['success' => true, 'message' => 'Password updated']);
        break;

    // ============================================================
    case 'update_profile':
    // ============================================================
        $auth  = requireAuth();
        $body  = getBody();
        $name  = trim($body['name'] ?? '');
        $phone = trim($body['phone'] ?? '');
        if (!$name) jsonResponse(['error' => 'Name required'], 400);
        $db = getDB();
        $upd4 = $db->prepare("UPDATE users SET name=?, phone=? WHERE id=?");
        if ($upd4) { $upd4->bind_param('ssi', $name, $phone, $auth['uid']); $upd4->execute(); $upd4->close(); }
        $db->close();
        jsonResponse(['success' => true, 'message' => 'Profile updated']);
        break;

    // ============================================================
    default:
        jsonResponse(['error' => 'Unknown action'], 400);
}
