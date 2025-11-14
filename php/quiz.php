<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  echo "❌ You must be logged in to save results.";
  exit;
}

$data = json_decode(file_get_contents("php://input"), true);
$score = $data['score'];
$total = $data['total'];

$conn = new mysqli("localhost", "root", "", "hackaware");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO quiz_results (user_id, score, total) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iii", $_SESSION['user_id'], $score, $total);

if ($stmt->execute()) {
  echo "✅ Quiz result saved!";
} else {
  echo "❌ Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
