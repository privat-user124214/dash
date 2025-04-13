<?php
$host = "sql303.infinityfree.com";
$dbname = "if0_38729105_logs";
$username = "if0_38729105";
$password = "p3Fuvu1gawZo";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}
?>
