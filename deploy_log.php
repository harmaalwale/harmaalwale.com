<?php
$secret = 'HW_DEPLOY_2026_SECRET';
if (!isset($_GET['token']) || $_GET['token'] !== $secret) { die('Unauthorized'); }
$log = '/home1/harmakko/deploy_log.txt';
echo '<pre>' . (file_exists($log) ? htmlspecialchars(file_get_contents($log)) : 'No log yet') . '</pre>';
?>
