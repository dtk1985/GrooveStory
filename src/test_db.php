<?php

require_once __DIR__ . '/Database.php';

Database::configure([
    'host' => getenv('DB_HOST') ?: 'db',
    'dbname' => getenv('DB_NAME') ?: 'groovestory',
    'username' => getenv('DB_USER') ?: 'groovestory',
    'password' => getenv('DB_PASSWORD') ?: '',
]);

try {
    $db = Database::getConnection();
    echo "✓ Database connection successful!<br>";
    
    $result = $db->query("SELECT COUNT(*) as count FROM songs");
    $row = $result->fetch();
    echo "✓ Songs table accessible. Current count: " . $row['count'] . "<br>";
    
    $result = $db->query("SELECT COUNT(*) as count FROM games");
    $row = $result->fetch();
    echo "✓ Games table accessible. Current count: " . $row['count'] . "<br>";
    
    $result = $db->query("SELECT COUNT(*) as count FROM game_cards");
    $row = $result->fetch();
    echo "✓ Game_cards table accessible. Current count: " . $row['count'] . "<br>";
    
    echo "<br><strong>All database tests passed!</strong>";
    
} catch (PDOException $e) {
    echo "✗ Database error: " . $e->getMessage();
}
