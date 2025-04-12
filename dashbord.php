<?php
// Beispiel-Daten, die aus der Callback-Datei gespeichert wurden
$userData = json_decode(file_get_contents('user_data.json'), true);

// Benutzerinformation anzeigen
echo '<h1>Dashboard</h1>';
echo '<h2>Benutzername: ' . htmlspecialchars($userData['username']) . '</h2>';
echo '<p>Email: ' . htmlspecialchars($userData['email']) . '</p>';
echo '<p>Server:</p>';
echo '<ul>';
foreach ($userData['guilds'] as $guild) {
    echo '<li>' . htmlspecialchars($guild['name']) . ' - Besitzer: ' . htmlspecialchars($guild['owner']) . '</li>';
}
echo '</ul>';
?>
