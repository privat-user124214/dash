<?php
session_start();

$client_id = "1284484623279067196";
$client_secret = "rWr9kGV33-rTIvhv6ACi-NrJVxbQFQKy";
$redirect_uri = "https://dash.novarix-studio.de/callback.php";

// Überprüfe, ob ein Code übergeben wurde
if (!isset($_GET['code'])) {
    die("Kein Code erhalten.");
}

$code = $_GET['code'];

// Token von Discord anfordern
$token_url = "https://discord.com/api/oauth2/token";

$data = [
    'client_id'     => $client_id,
    'client_secret' => $client_secret,
    'grant_type'    => 'authorization_code',
    'code'          => $code,
    'redirect_uri'  => $redirect_uri,
    'scope'         => 'identify email connections guilds guilds.members.read'
];

$ch = curl_init($token_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    die("cURL-Fehler beim Token abrufen: " . curl_error($ch));
}

curl_close($ch);

$token_data = json_decode($response, true);

if (!isset($token_data['access_token'])) {
    die("Zugriffstoken fehlt.");
}

$access_token = $token_data['access_token'];

// Benutzerdaten mit Access Token abrufen
$user_response = file_get_contents("https://discord.com/api/users/@me", false, stream_context_create([
    'http' => [
        'method'  => 'GET',
        'header'  => "Authorization: Bearer $access_token"
    ]
]));

$user = json_decode($user_response, true);

if (isset($user['id'])) {
    $_SESSION['user'] = [
        'id'       => $user['id'],
        'username' => $user['username'] . '#' . $user['discriminator'],
        'email'    => $user['email'] ?? null,
        'avatar'   => "https://cdn.discordapp.com/avatars/{$user['id']}/{$user['avatar']}.png"
    ];

    // Weiterleitung nach erfolgreichem Login
    header("Location: https://dash.novarix-studio.de/dashboard.php");
    exit();
} else {
    die("Fehler beim Abrufen der Nutzerdaten.");
}
