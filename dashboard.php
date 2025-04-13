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
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Novarix Dashboard</h1>
    <nav>
        <ul>
            <li><a href="logout.php">Ausloggen</a></li>
        </ul>
    </nav>
</header>

<main>
    <section class="hero">
        <h2>Willkommen, <?= htmlspecialchars($user['username']) ?></h2>
        <p>Hier ist deine Server-Übersicht (funktion noch in Arbeit):</p>
        <img src="<?= $user['avatar'] ?>" alt="Avatar" width="100" style="border-radius: 50%;">
    </section>
</main>

<footer>
    <p>&copy; Novarix Studio</p>
    <p>
        <a href="https://novarix-studio.de" style="color: #a64eff;">Hauptseite</a> |
        <a href="#" style="color: #a64eff;">Documentation</a>
    </p>
</footer>
</body>
</html>
