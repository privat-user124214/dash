<?php
session_start();

$client_id = "1284484623279067196";
$client_secret = "DEIN_CLIENT_SECRET";
$redirect_uri = "https://dash.novarix-studio.de/callback.php";

if (!isset($_GET['code'])) {
    die("Kein Code erhalten.");
}

$code = $_GET['code'];

$token_url = "https://discord.com/api/oauth2/token";

$data = [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'code' => $code,
    'redirect_uri' => $redirect_uri,
    'scope' => 'identify email'
];

$ch = curl_init($token_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

$response = curl_exec($ch);
if (curl_errno($ch)) {
    die("Fehler: " . curl_error($ch));
}
curl_close($ch);

$token_data = json_decode($response, true);

if (!isset($token_data['access_token'])) {
    die("Zugriffstoken fehlt.");
}

$access_token = $token_data['access_token'];

$user_response = file_get_contents("https://discord.com/api/users/@me", false, stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => "Authorization: Bearer $access_token"
    ]
]));

$user = json_decode($user_response, true);

if (isset($user['id'])) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'username' => $user['username'] . '#' . $user['discriminator'],
        'email' => $user['email'] ?? null,
        'avatar' => "https://cdn.discordapp.com/avatars/{$user['id']}/{$user['avatar']}.png"
    ];

    header("Location: dashboard.php");
    exit();
} else {
    die("Fehler beim Abrufen der Nutzerdaten.");
}
