<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Novarix Studio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main style="margin-left: 220px; padding: 20px;">
        <h2>Dashboard Übersicht</h2>
        <p>Willkommen, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>!</p>
    </main>
</body>
</html>
