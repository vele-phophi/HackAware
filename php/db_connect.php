<?php
// Use environment variables set in Render
$host     = getenv("DB_HOST");
$port     = getenv("DB_PORT");
$dbname   = getenv("DB_NAME");
$user     = getenv("DB_USER");
$password = getenv("DB_PASS");

// Connect to Supabase (PostgreSQL)
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
} else {
    echo " Connected successfully!";
}
?>
