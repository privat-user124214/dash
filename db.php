<?php
$host = 'dpg-cvtulfvgi27c73abb1s0-a.frankfurt-postgres.render.com';
$db   = 'novarix_db';
$user = 'novarix_db_user';
$pass = 'CuPJkCvTCSm0zo0vR3pnGRGxtr0P6gzV';
$port = "5432";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbindung fehlgeschlagen: " . $e->getMessage());
}
?>
