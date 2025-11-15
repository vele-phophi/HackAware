<?php
// Pull credentials from environment variables
$host     = getenv("DB_HOST");
$port     = getenv("DB_PORT");
$dbname   = getenv("DB_NAME");
$user     = getenv("DB_USER");
$password = getenv("DB_PASS");

// Add sslmode=require for Supabase
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
