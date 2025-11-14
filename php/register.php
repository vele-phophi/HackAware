<?php
$conn = new mysqli("localhost", "root", "", "hackaware");

include '../php/db_connect.php';
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];
$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (email, password_hash) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $hash);

if ($stmt->execute()) {
  echo "✅ Registration successful!";
} else {
  echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
