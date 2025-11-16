<?php
session_start();
include 'db_connect.php';

// Get form input safely
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($email && $password) {
    try {
        // Query user by email using PDO prepared statement
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify password (if stored as hash)
            if (password_verify($password, $user['password'])) {
                // ✅ Login success
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['name']; // use 'name' column from your schema
                $_SESSION['role'] = $user['role'];

                header("Location: dashboard.php");
                exit();
            } else {
                echo "❌ Incorrect password";
            }
        } else {
            echo "❌ No account found";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "❌ Please enter both email and password.";
}
?>
