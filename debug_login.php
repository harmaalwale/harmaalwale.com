<?php
// ================================================================
//  HarmaalWale — Admin Login Debugger
//  Visit: harmaalwale.com/debug_login.php
//  DELETE THIS FILE after fixing login issues!
// ================================================================
require_once 'api/db.php';

echo "<!DOCTYPE html><html><head><title>HW Debug</title>
<style>body{font-family:monospace;background:#111;color:#eee;padding:24px;font-size:13px}
h2{color:#E87000;margin:20px 0 8px}.ok{color:#4CAF50}.err{color:#e74c3c}.warn{color:#F5A623}
pre{background:#1a1a1a;padding:14px;border-radius:6px;margin:8px 0;overflow-x:auto;line-height:1.7}
table{border-collapse:collapse;width:100%}td,th{border:1px solid #333;padding:8px 12px;text-align:left}
th{background:#1a1a1a;color:#E87000}.del{background:#1a0000;border:1px solid #e74c3c;color:#e74c3c;padding:12px 20px;border-radius:6px;margin-top:24px}
</style></head><body>";

echo "<h1 style='color:#fff'>🔍 HarmaalWale Login Debug</h1>";
echo "<p style='color:#555'>Delete this file after debugging: <code>debug_login.php</code></p>";

// ── 1. DB Connection ──
echo "<h2>1. Database Connection</h2>";
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($db->connect_error) {
    echo "<pre class='err'>❌ DB connect failed: " . $db->connect_error . "</pre>";
} else {
    echo "<pre class='ok'>✅ Connected to DB: " . DB_NAME . " as " . DB_USER . "</pre>";
}

// ── 2. Users table ──
echo "<h2>2. Users Table</h2>";
$r = $db->query("SHOW TABLES LIKE 'users'");
if (!$r || $r->num_rows === 0) {
    echo "<pre class='err'>❌ users table does NOT exist</pre>";
} else {
    $count = $db->query("SELECT COUNT(*) c FROM users")->fetch_assoc()['c'];
    echo "<pre class='ok'>✅ users table exists &nbsp;·&nbsp; $count total rows</pre>";

    $users = $db->query("SELECT id, name, email, role, verified, LENGTH(password) as pw_len FROM users ORDER BY id ASC LIMIT 20");
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Verified</th><th>Password hash len</th></tr>";
    while ($u = $users->fetch_assoc()) {
        $vOk  = $u['verified'] ? "<span class='ok'>✅ yes</span>" : "<span class='err'>❌ no</span>";
        $rOk  = $u['role'] === 'admin' ? "<span class='ok'>admin</span>" : "<span class='warn'>" . htmlspecialchars($u['role']) . "</span>";
        $pwOk = $u['pw_len'] > 20 ? "<span class='ok'>{$u['pw_len']}</span>" : "<span class='err'>{$u['pw_len']} (too short!)</span>";
        echo "<tr><td>{$u['id']}</td><td>" . htmlspecialchars($u['name']) . "</td><td>" . htmlspecialchars($u['email']) . "</td><td>$rOk</td><td>$vOk</td><td>$pwOk</td></tr>";
    }
    echo "</table>";
}

// ── 3. Test login with known credentials ──
echo "<h2>3. Test Admin Login (admin@harmaalwale.com / Harmaalwale@2026)</h2>";
$stmt = $db->prepare("SELECT id,name,email,role,verified,password FROM users WHERE email=? LIMIT 1");
$testEmail = 'admin@harmaalwale.com';
$testPass  = 'Harmaalwale@2026';
$stmt->bind_param('s', $testEmail); $stmt->execute();
$u = $stmt->get_result()->fetch_assoc();
if (!$u) {
    echo "<pre class='err'>❌ No user found with email: $testEmail
→ Run reset_admin.php to create/fix the admin user</pre>";
} else {
    echo "<pre>Found user: ID={$u['id']} &nbsp; role={$u['role']} &nbsp; verified={$u['verified']}</pre>";
    if (!password_verify($testPass, $u['password'])) {
        echo "<pre class='err'>❌ Password does NOT match 'Harmaalwale@2026'
→ Run reset_admin.php to reset the password</pre>";
    } else {
        echo "<pre class='ok'>✅ Password matches!</pre>";
    }
    if ($u['role'] !== 'admin') {
        echo "<pre class='err'>❌ Role is '{$u['role']}' not 'admin' — run reset_admin.php</pre>";
    } else {
        echo "<pre class='ok'>✅ Role is 'admin'</pre>";
    }
    if (!$u['verified']) {
        echo "<pre class='err'>❌ Account is NOT verified — run reset_admin.php</pre>";
    } else {
        echo "<pre class='ok'>✅ Account is verified</pre>";
    }
}

// ── 4. PHP mail() test ──
echo "<h2>4. PHP mail() Test</h2>";
$testTo = 'support@harmaalwale.com';
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: HarmaalWale <support@harmaalwale.com>\r\n";
$result = mail($testTo, 'HarmaalWale Debug — Mail Test', '<p>This is a <b>test email</b> from debug_login.php — if you received this, PHP mail works ✅</p>', $headers, '-f support@harmaalwale.com');
if ($result) {
    echo "<pre class='ok'>✅ mail() returned true — check support@harmaalwale.com inbox for test email</pre>";
} else {
    echo "<pre class='err'>❌ mail() returned false — PHP mail is not configured on this server
→ Check cPanel > Email Accounts that support@harmaalwale.com exists
→ Check cPanel > PHP Mail Settings / MX records</pre>";
}

// ── 5. API path check ──
echo "<h2>5. API Paths</h2>";
$files = ['api/auth.php','api/admin.php','api/enquiries.php','api/db.php'];
foreach ($files as $f) {
    if (file_exists(__DIR__ . '/' . $f)) echo "<pre class='ok'>✅ $f exists</pre>";
    else echo "<pre class='err'>❌ $f MISSING</pre>";
}

echo "<div class='del'>⚠️ DELETE this file from your server after debugging: <strong>harmaalwale.com/debug_login.php</strong></div>";
echo "</body></html>";
