<?php
$host = 'dpg-cvtulfvgi27c73abb1s0-a.frankfurt-postgres.render.com';
$db   = 'novarix_db';
$user = 'novarix_db_user';
$pass = 'CuPJkCvTCSm0zo0vR3pnGRGxtr0P6gzV';
$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "✅ Verbindung zu PostgreSQL erfolgreich!";
} catch (PDOException $e) {
    echo "❌ Verbindung fehlgeschlagen: " . $e->getMessage();
}
?>
