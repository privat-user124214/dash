<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login | Novarix Studio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h2>Willkommen bei Novarix Studio</h2>
        <p>Bitte logge dich mit Discord ein, um fortzufahren.</p>
        <a href="https://discord.com/oauth2/authorize?client_id=1284484623279067196&permissions=0&response_type=code&redirect_uri=https%3A%2F%2Fdash.novarix-studio.de%2Fcallback.php&integration_type=0&scope=identify+email+connections+bot+guilds+applications.commands+guilds.members.read" style="display: inline-flex; align-items: center; background-color: #5865F2; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-size: 16px;">
            <img src="https://cdn.icon-icons.com/icons2/2108/PNG/512/discord_icon_130958.png" alt="Discord" style="width: 24px; height: 24px; margin-right: 10px;">
            Mit Discord einloggen
        </a>
    </main>
</body>
</html>
