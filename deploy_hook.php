<?php
$secret = 'HW_DEPLOY_2026_SECRET';

if (!isset($_GET['token']) || $_GET['token'] !== $secret) {
    http_response_code(403);
    die('Unauthorized');
}

// Run deploy in background - return instantly before Cloudflare times out
$cmd = 'bash -c "' .
    'cd /home1/harmakko/repositories/harmaalwale.com && ' .
    'git fetch origin main && ' .
    'git reset --hard origin/main && ' .
    'cp -rf /home1/harmakko/repositories/harmaalwale.com/. /home1/harmakko/public_html/ && ' .
    'rm -rf /home1/harmakko/public_html/.git /home1/harmakko/public_html/.github ' .
    '" > /home1/harmakko/deploy_log.txt 2>&1 &';

exec($cmd);

// Return immediately
echo json_encode([
    'status' => 'triggered',
    'message' => 'Deploy started in background. Check site in 15 seconds.',
    'log' => 'https://harmaalwale.com/deploy_log.php?token=' . $secret
]);
?>
