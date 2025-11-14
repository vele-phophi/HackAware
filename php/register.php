<?php
include 'db_connect.php';

// Get form input
$username = $_POST['username'];
$email    = $_POST['email'];
$password = $_POST['password'];

// Hash the password
$password_hash = password_hash($password, PASSWORD_BCRYPT);

// Check if email already exists
$check_query = "SELECT id FROM users WHERE email = $1";
$check_result = pg_query_params($conn, $check_query, array($email));

if (pg_num_rows($check_result) > 0) {
    echo "❌ Email already registered";
    exit();
}

// Insert new user
$insert_query = "INSERT INTO users (username, email, password_hash, created_at) VALUES ($1, $2, $3, CURRENT_TIMESTAMP)";
$insert_result = pg_query_params($conn, $insert_query, array($username, $email, $password_hash));

if ($insert_result) {
    echo "Registration successful. You can now log in.";
} else {
    echo "❌ Registration failed: " . pg_last_error($conn);
}
?>
