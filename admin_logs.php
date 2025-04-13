<?php
require_once 'db.php';

$stmt = $pdo->query("SELECT * FROM dashboard_logs ORDER BY created_at DESC");
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Logs</title>
</head>
<body>
    <h2>Aktivitätslogs</h2>
    <table border="1">
        <tr>
            <th>Server ID</th>
            <th>User ID</th>
            <th>Aktion</th>
            <th>Zeit</th>
        </tr>
        <?php foreach ($logs as $log): ?>
        <tr>
            <td><?= htmlspecialchars($log['server_id']) ?></td>
            <td><?= htmlspecialchars($log['user_id']) ?></td>
            <td><?= htmlspecialchars($log['action']) ?></td>
            <td><?= $log['created_at'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
