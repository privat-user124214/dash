<?php
// log_action.php
require_once 'db.php';

function logActivity($server_id, $user_id, $action, $details) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO logs (server_id, user_id, action, details, timestamp) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $server_id, $user_id, $action, $details);
    $stmt->execute();
    $stmt->close();
}
?>
