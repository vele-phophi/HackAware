<?php
$servername = "sql300.infinityfree.com";         // Your InfinityFree DB server
$username   = "if0_40418028";                    // Your DB username
$password   = "YOUR_DB_PASSWORD";                // Replace with actual password
$database   = "if0_40418028_hackaware_db";       // Your DB name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
