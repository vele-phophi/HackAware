<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | HackAware</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header>
    <h1>📝 Create Your HackAware Account</h1>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <!-- ✅ Points to backend handler -->
    <form action="php/register.php" method="POST">
      <label for="username">Username:</label><br>
      <input type="text" id="username" name="username" required><br><br>

      <label for="email">Email:</label><br>
      <input type="email" id="email" name="email" required><br><br>

      <label for="password">Password:</label><br>
      <input type="password" id="password" name="password" required><br><br>

      <button type="submit">Register</button>
    </form>
    <div id="register-result"></div>
  </main>

  <footer>
    <p>&copy; 2025 TechTitans | HackAware for Nemisa Hackathon</p>
  </footer>
</body>
</html>
