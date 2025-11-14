<?php
session_start();

$conn = new mysqli("localhost", "root", "", "hackaware");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT id, username, password_hash FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();

  if (password_verify($password, $user['password_hash'])) {
    // ✅ Store session data
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];

    // ✅ Redirect to dashboard
    header("Location: dashboard.php");
    exit;
  } else {
    echo "❌ Incorrect password.";
  }
} else {
  echo "❌ No account found with that email.";
}

$stmt->close();
$conn->close();
?>
