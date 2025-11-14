<?php
include '../php/db_connect.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | HackAware</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>👋 Welcome to HackAware</h1>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <p>✅ You are logged in as <strong><?php echo $_SESSION['username']; ?></strong>.</p>
    <p>Ready to test your cybersecurity knowledge?</p>
    <a href="quiz.html"><button>Start Quiz</button></a>

    <?php
    // ✅ No second session_start here
    $conn = new mysqli("localhost", "root", "", "hackaware");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT score, total, taken_at FROM quiz_results WHERE user_id = ? ORDER BY taken_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h2>Your Quiz History</h2>";
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>Date</th><th>Score</th></tr>";

    while ($row = $result->fetch_assoc()) {
      echo "<tr><td>{$row['taken_at']}</td><td>{$row['score']} / {$row['total']}</td></tr>";
    }

    echo "</table>";

    $stmt->close();
    $conn->close();
    ?>
  </main>

  <footer>
    <p>&copy; 2025 TechTitans | HackAware for Nemisa Hackathon</p>
  </footer>
</body>
</html>
