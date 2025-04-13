<?php
// Discord OAuth Link
$client_id = "1284484623279067196";
$redirect_uri = urlencode("https://dash.novarix-studio.de/callback.php");
$scope = "identify email connections guilds guilds.members.read";

$discord_login_url = "https://discord.com/oauth2/authorize?client_id=$client_id&redirect_uri=$redirect_uri&response_type=code&scope=$scope";
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Novarix Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="header-left"><h1>Novarix Studio</h1></div>
    </header>
    <main style="text-align: center; padding-top: 100px;">
        <h2>Willkommen beim Novarix Dashboard</h2>
        <a href="https://discord.com/oauth2/authorize?client_id=1284484623279067196&permissions=0&response_type=code&redirect_uri=https%3A%2F%2Fdash-k7s3.onrender.com%2Fcallback.php&integration_type=0&scope=identify+email+connections+guilds+guilds.members.read
">
            <img src="https://discord.com/assets/bb408e0343ddedc0967f246f7e89cebf.svg" width="200" alt="Login mit Discord">
        </a>
        <p>Klicke auf das Discord-Logo, um dich anzumelden</p>
    </main>
</body>
</html>
