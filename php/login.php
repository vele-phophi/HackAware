<?php
session_start();
include 'db_connect.php';

// Get form input
$email = $_POST['email'];
$password = $_POST['password'];

// Query user by email (using pg_query_params for safety)
$query = "SELECT * FROM users WHERE email = $1";
$result = pg_query_params($conn, $query, array($email));

if (!$result) {
    die("Query failed: " . pg_last_error());
}

if (pg_num_rows($result) === 1) {
    $user = pg_fetch_assoc($result);

    // Verify password hash
    if (password_verify($password, $user['password_hash'])) {
        // ✅ Login success
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "❌ Incorrect password";
    }
} else {
    echo "❌ No account found";
}
?>
