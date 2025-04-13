<?php
require_once 'db.php';

function logAction($serverId, $userId, $action) {
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO dashboard_logs (server_id, user_id, action, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->execute([$serverId, $userId, $action]);
}
?>
