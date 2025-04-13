<?php
include 'config.php';
$discord_url = "https://discord.com/oauth2/authorize?" . http_build_query([
    'client_id'     => $client_id,
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'scope'         => 'identify email connections guilds guilds.members.read'
]);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login mit Discord</title>
</head>
<body>
    <h1>Login Dashboard</h1>
    <a href="<?= $discord_url ?>">
        <img src="https://discord.com/assets/bb408e0343ddedc0967f246f7e89cebf.svg" width="200">
    </a>
</body>
</html>
