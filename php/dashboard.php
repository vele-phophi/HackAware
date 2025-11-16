<?php
include '../php/db_connect.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../php/login.php");
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
        <li><a href="../php/logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <p>You are logged in as <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>.</p>
    <p>Ready to test your cybersecurity knowledge?</p>
    <a href="quiz.php"><button>Start Quiz</button></a>

    <?php
    // ✅ Use PDO from db_connect.php instead of mysqli
    try {
        $sql = "SELECT score, completed, module_id FROM progress WHERE user_id = ? ORDER BY id DESC";
        $stmt = $db->prepare($sql);
        $stmt->execute([$_SESSION['user_id']]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo "<h2>Your Progress</h2>";
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th>Module</th><th>Score</th><th>Status</th></tr>";

        foreach ($results as $row) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['module_id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['score']) . "</td>";
            echo "<td>" . ($row['completed'] ? 'Completed' : 'In Progress') . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } catch (Exception $e) {
        echo "Error fetching progress: " . $e->getMessage();
    }
    ?>
  </main>

  <footer>
    <p>&copy; 2025 TechTitans | HackAware for Nemisa Hackathon</p>
  </footer>
</body>
</html>
