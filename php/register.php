<?php
include 'db_connect.php';

// Get form input safely
$name     = $_POST['username'] ?? '';
$email    = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if ($name && $email && $password) {
    try {
        // Check if email already exists
        $check = $db->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->fetch()) {
            echo "❌ Email already registered";
            exit();
        }

        // Hash the password securely
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        // Insert new user (default role = learner)
        $insert = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'learner')");
        $insert->execute([$name, $email, $password_hash]);

        echo "✅ Registration successful. You can now log in.";
    } catch (Exception $e) {
        echo "❌ Registration failed: " . $e->getMessage();
    }
} else {
    echo "❌ Please fill in all fields.";
}
?>
