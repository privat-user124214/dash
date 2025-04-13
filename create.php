<?php
require_once 'db.php';

try {
    $sql = "
        CREATE TABLE IF NOT EXISTS logs (
            id SERIAL PRIMARY KEY,
            user_id VARCHAR(50),
            username VARCHAR(100),
            server_id VARCHAR(50),
            action TEXT,
            timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ";
    $pdo->exec($sql);
    echo "✅ Tabelle 'logs' erfolgreich erstellt!";
} catch (PDOException $e) {
    echo "❌ Fehler beim Erstellen der Tabelle: " . $e->getMessage();
}
