<?php
// Discord OAuth2-Konfiguration
$client_id = "1284484623279067196";
$redirect_uri = "https://dash.novarix-studio.de/callback.php";

// OAuth2-URL ohne Bot-Scopes (kein Einladen des Bots)
$discord_oauth_url = "https://discord.com/oauth2/authorize?" . http_build_query([
    'client_id' => $client_id,
    'redirect_uri' => $redirect_uri,
    'response_type' => 'code',
    'scope' => 'identify email connections guilds guilds.members.read'
]);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login mit Discord</title>
    <style>
        body {
            background-color: #121212;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 120px;
            margin: 0;
        }
        h1 {
            color: #a64eff;
        }
        .login-button {
            display: inline-flex;
            align-items: center;
            background-color: #5865F2;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #4752c4;
        }
        .login-button img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Willkommen beim NovaRix Dashboard</h1>
    <a href="<?= htmlspecialchars($discord_oauth_url) ?>" class="login-button">
        <img src="https://cdn.icon-icons.com/icons2/2108/PNG/512/discord_icon_130958.png" alt="Discord">
        Mit Discord einloggen
    </a>
</body>
</html>
