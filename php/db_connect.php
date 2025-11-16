<?php
// db_connect.php
// Central database connection file for HackAware (SQLite)

try {
    // Connect to the SQLite database file in your project folder
    $db = new PDO("sqlite:" . __DIR__ . "/../hackaware.db");
    echo __DIR__ . "/../hackaware.db";


    // Set error mode to exceptions for easier debugging
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: enable foreign key constraints
    $db->exec("PRAGMA foreign_keys = ON;");

    // Test query (you can remove this later)
    $stmt = $db->query("SELECT name, email, role FROM users");
    foreach ($stmt as $row) {
        echo "User: " . $row['name'] . " | Email: " . $row['email'] . " | Role: " . $row['role'] . "<br>";
    }

} catch (PDOException $e) {
    // Handle connection errors gracefully
    echo "Database connection failed: " . $e->getMessage();
    exit;
}
?>
