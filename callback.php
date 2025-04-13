<?php
include 'config.php';

if (!isset($_GET['code'])) {
    exit('Kein Code übergeben');
}

$code = $_GET['code'];
$data = [
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'grant_type' => 'authorization_code',
    'code' => $code,
    'redirect_uri' => $redirect_uri,
    'scope' => 'identify email connections guilds guilds.members.read',
];

$ch = curl_init('https://discord.com/api/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
$response = curl_exec($ch);

if (!$response) {
    exit('cURL Fehler: ' . curl_error($ch));
}

$response_data = json_decode($response, true);
$access_token = $response_data['access_token'] ?? null;

if (!$access_token) {
    exit('Kein Access Token erhalten.');
}

$ch = curl_init('https://discord.com/api/users/@me');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Bearer ' . $access_token]);
$user_response = curl_exec($ch);
$user = json_decode($user_response, true);

echo "<h1>Willkommen, " . htmlspecialchars($user['username']) . "</h1>";
echo "<p>Email: " . htmlspecialchars($user['email'] ?? 'Keine E-Mail angegeben') . "</p>";
?>
<a href="dashboard.php">Zum Dashboard</a>
