<?php
session_start();
include 'db_connect.php'; // ✅ use your PDO connection

if (!isset($_SESSION['user_id'])) {
    echo "❌ You must be logged in to save results.";
    exit;
}

// Get JSON data from frontend
$data = json_decode(file_get_contents("php://input"), true);
$score = $data['score'] ?? 0;
$total = $data['total'] ?? 0;
$module_id = $data['module_id'] ?? 1; // default to module 1 if not provided

try {
    // Insert into progress table
    $stmt = $db->prepare("INSERT INTO progress (user_id, module_id, score, completed) VALUES (?, ?, ?, ?)");
    $completed = ($score == $total) ? 1 : 0; // mark completed if full score
    $stmt->execute([$_SESSION['user_id'], $module_id, $score, $completed]);

    echo "✅ Quiz result saved!";
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>
