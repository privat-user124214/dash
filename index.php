<?php
session_start();

// Dummy-Daten für Server (später mit Discord API ersetzen)
$servers = [
    ["id" => "123", "name" => "Dev Server", "icon" => "https://via.placeholder.com/64", "bot" => true],
    ["id" => "456", "name" => "Gaming Hub", "icon" => "https://via.placeholder.com/64", "bot" => false],
    ["id" => "789", "name" => "Community", "icon" => "https://via.placeholder.com/64", "bot" => true],
];
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
        <h2>Serverübersicht</h2>
        <div class="server-grid">
            <?php foreach ($servers as $server): ?>
                <div class="server-card">
                    <img src="<?= $server['icon'] ?>" alt="Server Icon">
                    <h3><?= htmlspecialchars($server['name']) ?></h3>
                    <?php if ($server['bot']): ?>
                        <a href="manage.php?server=<?= $server['id'] ?>" class="btn">Bot verwalten</a>
                    <?php else: ?>
                        <a href="invite.php?server=<?= $server['id'] ?>" class="btn btn-invite">Bot einladen</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> Novarix Studio</p>
        <div class="footer-links">
            <a href="#">Hauptseite</a> | <a href="#">Dokumentation</a>
        </div>
    </footer>
</body>
</html>
