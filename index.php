<?php
include 'config.php';
$discord_url = "https://discord.com/oauth2/authorize?" . http_build_query([
    'client_id'     => $client_id,
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'scope'         => 'identify email connections guilds guilds.members.read'
]);
?>
<a href="<?= $discord_url ?>">Mit Discord einloggen</a>
