<?php
$host = "sql303.infinityfree.com"; // Ersetze mit deinem Host
$dbname = "if0_38729105_logs";
$username = "if0_38729105";
$password = "p3Fuvu1gawZo";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbindung fehlgeschlagen: " . $e->getMessage());
}
?>
