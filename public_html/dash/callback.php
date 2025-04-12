<?php
include('config.php');

// Wenn der Code nicht vorhanden ist, zurück zur Startseite
if (!isset($_GET['code'])) {
    die('Kein Authentifizierungscode vorhanden!');
}

// Hole den Code von der URL
$code = $_GET['code'];

// Erstelle die POST-Daten für den Token-Austausch
$data = [
    'client_id' => CLIENT_ID,
    'client_secret' => CLIENT_SECRET,
    'code' => $code,
    'grant_type' => 'authorization_code',
    'redirect_uri' => REDIRECT_URI,
    'scope' => 'identify guilds email'
];

// Erstelle eine cURL-Anfrage, um das Access-Token zu erhalten
$ch = curl_init('https://discord.com/api/v10/oauth2/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
curl_close($ch);

// Verarbeite die Antwort
$responseData = json_decode($response, true);

// Wenn ein Fehler auftritt
if (isset($responseData['error'])) {
    die('Fehler: ' . $responseData['error_description']);
}

// Speichere das Access-Token
$accessToken = $responseData['access_token'];

// Holen Sie sich Benutzerinformationen mit dem Access-Token
$ch = curl_init('https://discord.com/api/v10/users/@me');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer ' . $accessToken
]);
$userResponse = curl_exec($ch);
curl_close($ch);

$userData = json_decode($userResponse, true);

// Wenn keine Benutzerinformationen zurückgegeben werden, Fehler anzeigen
if (isset($userData['error'])) {
    die('Fehler beim Abrufen der Benutzerdaten!');
}

// Zeige die Benutzerinformationen
echo '<h1>Willkommen, ' . htmlspecialchars($userData['username']) . '!</h1>';
echo '<p>Du bist in folgenden Servern:</p>';
echo '<ul>';
foreach ($userData['guilds'] as $guild) {
    echo '<li>' . htmlspecialchars($guild['name']) . '</li>';
}
echo '</ul>';

// Beispiel: Benutzerinformationen speichern
file_put_contents('user_data.json', json_encode($userData, JSON_PRETTY_PRINT));

?>
