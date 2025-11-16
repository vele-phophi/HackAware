<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Quiz | HackAware</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header>
    <h1>🧩 HackAware Quiz</h1>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="php/dashboard.php">Dashboard</a></li>
        <li><a href="php/logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- ✅ Quiz form posts to backend handler -->
    <form action="php/quiz.php" method="POST">

      <h2>Question 1</h2>
      <p>What does HTTPS stand for?</p>
      <label><input type="radio" name="q1" value="HyperText Transfer Protocol Secure" required> HyperText Transfer Protocol Secure</label><br>
      <label><input type="radio" name="q1" value="High Transfer Text Protocol Service"> High Transfer Text Protocol Service</label><br>
      <label><input type="radio" name="q1" value="Hyperlink Transfer Protocol Standard"> Hyperlink Transfer Protocol Standard</label><br>
      <label><input type="radio" name="q1" value="HyperText Transfer Private Server"> HyperText Transfer Private Server</label><br><br>

      <h2>Question 2</h2>
      <p>Which of these is a strong password?</p>
      <label><input type="radio" name="q2" value="123456"> 123456</label><br>
      <label><input type="radio" name="q2" value="password"> password</label><br>
      <label><input type="radio" name="q2" value="MyDog2025!"> MyDog2025!</label><br>
      <label><input type="radio" name="q2" value="qwerty"> qwerty</label><br><br>

      <button type="submit">Submit Quiz</button>
    </form>

    <div id="quiz-result"></div>
  </main>

  <footer>
    <p>&copy; 2025 TechTitans | HackAware for Nemisa Hackathon</p>
  </footer>
</body>
</html>
