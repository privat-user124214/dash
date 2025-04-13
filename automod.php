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
    <title>AutoMod | Novarix Studio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main style="margin-left: 220px; padding: 20px;">
        <h2>AutoMod Einstellungen</h2>
        <p>Hier kannst du AutoMod konfigurieren.</p>
    </main>
</body>
</html>
