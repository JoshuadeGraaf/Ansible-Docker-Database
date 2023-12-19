<?php
session_start();
include "../Database/A_declaration.php";
include "../Scripts/loginScript.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    login($conn, $username, $password); // Call the login function from loginScript.php
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Loginpagina</title>
  <link rel="stylesheet" href="./style.css">
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="" method="post">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login" class="login-btn">Login</button>
      <a href="../index.php" class="return-link">Return</a>
    </form>
  </div>
</body>
</html>
