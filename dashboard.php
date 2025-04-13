<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Dashboard – Novarix Studio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-left">
            <h1>Novarix Studio</h1>
        </div>
        <div class="header-right">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </header>

    <main>
        <h2>Willkommen, <?= htmlspecialchars($user['username']) ?></h2>
        <p>Du bist jetzt eingeloggt.</p>
        <p><strong>E-Mail:</strong> <?= htmlspecialchars($user['email'] ?? 'Nicht verfügbar') ?></p>
        <p><img src="<?= htmlspecialchars($user['avatar']) ?>" width="80" alt="Avatar"></p>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> Novarix Studio</p>
        <div class="footer-links">
            <a href="#">Hauptseite</a> | <a href="#">Dokumentation</a>
        </div>
    </footer>
</body>
</html>
