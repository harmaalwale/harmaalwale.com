<?php
// ============================================================
//  HarmaalWale — One-Time Admin Password Reset
//  UPLOAD THIS FILE, VISIT IT ONCE, THEN DELETE IT IMMEDIATELY
// ============================================================

// ── CONFIG: Set your desired admin password here ─────────────
$ADMIN_EMAIL    = 'admin@harmaalwale.com';
$ADMIN_PASSWORD = 'Harmaalwale@2026';
// ─────────────────────────────────────────────────────────────

require_once __DIR__ . '/api/db.php';

$db   = getDB();
$hash = password_hash($ADMIN_PASSWORD, PASSWORD_BCRYPT, ['cost' => 8]);

// Update password
$stmt = $db->prepare("UPDATE users SET password=?, verified=1, role='admin' WHERE email=?");
$stmt->bind_param('ss', $hash, $ADMIN_EMAIL);
$ok = $stmt->execute();
$affected = $stmt->affected_rows;
$stmt->close();

// If no row updated, insert fresh admin
if ($affected === 0) {
    $ins = $db->prepare("INSERT INTO users (name,email,phone,password,role,verified,created_at) VALUES ('Admin',?,'' ,?,'admin',1,NOW())");
    $ins->bind_param('ss', $ADMIN_EMAIL, $hash);
    $ok = $ins->execute();
    $ins->close();
    $msg = $ok ? "✅ Admin account CREATED successfully!" : "❌ Failed: " . $db->error;
} else {
    $msg = $ok ? "✅ Admin password UPDATED successfully!" : "❌ Failed: " . $db->error;
}

$db->close();

// Verify it works
$db2  = getDB();
$chk  = $db2->prepare("SELECT id, role, verified FROM users WHERE email=? LIMIT 1");
$chk->bind_param('s', $ADMIN_EMAIL);
$chk->execute();
$row  = $chk->get_result()->fetch_assoc();
$chk->close();
$db2->close();

$verified_ok = password_verify($ADMIN_PASSWORD, $hash);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>HarmaalWale Admin Reset</title>
<style>
  body { font-family: Arial, sans-serif; background: #111; color: #fff; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
  .box { background: #1a1a1a; border: 1px solid #333; border-radius: 12px; padding: 40px; max-width: 500px; width: 100%; text-align: center; }
  h1 { font-size: 22px; margin-bottom: 6px; }
  .logo { font-size: 28px; font-weight: 900; text-transform: uppercase; margin-bottom: 24px; }
  .logo span { color: #E87000; }
  .status { font-size: 20px; margin: 20px 0; padding: 16px; border-radius: 8px; }
  .ok  { background: rgba(76,175,80,0.15); border: 1px solid #4CAF50; color: #4CAF50; }
  .err { background: rgba(231,76,60,0.15);  border: 1px solid #e74c3c;  color: #e74c3c; }
  table { width: 100%; border-collapse: collapse; margin: 20px 0; text-align: left; }
  td { padding: 10px 14px; border-bottom: 1px solid #222; font-size: 14px; }
  td:first-child { color: #888; width: 45%; }
  td:last-child { color: #fff; font-weight: 600; }
  .warn { background: rgba(255,152,0,0.12); border: 1px solid #FF9800; color: #FF9800; border-radius: 8px; padding: 14px; font-size: 13px; margin-top: 20px; }
  .btn { display: inline-block; background: #E87000; color: #fff; padding: 12px 28px; border-radius: 6px; text-decoration: none; font-weight: 700; font-size: 14px; text-transform: uppercase; margin-top: 16px; letter-spacing: 1px; }
</style>
</head>
<body>
<div class="box">
  <div class="logo">Harmaal<span>Wale</span></div>
  <h1>Admin Password Reset</h1>

  <div class="status <?= strpos($msg,'✅')!==false ? 'ok' : 'err' ?>">
    <?= htmlspecialchars($msg) ?>
  </div>

  <table>
    <tr><td>Email</td><td><?= htmlspecialchars($ADMIN_EMAIL) ?></td></tr>
    <tr><td>Password</td><td><?= htmlspecialchars($ADMIN_PASSWORD) ?></td></tr>
    <tr><td>Role</td><td><?= htmlspecialchars($row['role'] ?? '—') ?></td></tr>
    <tr><td>Verified</td><td><?= $row['verified'] ? '✅ Yes' : '❌ No' ?></td></tr>
    <tr><td>Hash valid</td><td><?= $verified_ok ? '✅ password_verify() passed' : '❌ Hash mismatch!' ?></td></tr>
  </table>

  <?php if (strpos($msg,'✅')!==false && $verified_ok): ?>
    <a href="admin.html" class="btn">Go to Admin Dashboard →</a>
  <?php endif; ?>

  <div class="warn">
    ⚠️ <strong>Delete this file immediately after use!</strong><br>
    Go to cPanel → File Manager → delete <code>reset_admin.php</code>
  </div>
</div>
</body>
</html>
