<?php
session_start();
include "Database/A_declaration.php";
include "Scripts/loginScript.php";

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
    <title>Provincie Groningen</title>
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="deny">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">
</head>
    <body>
        <center><h2>Provincie Groningen</h2></center>
        <form method="POST">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit" name="login">Login</button>
            <p class="message">Not registered? <a href="Register/registerForm.php">Create an account</a></p>
        </form>
        <?php if (isset($msg)) { echo "<p>$msg</p>"; } ?>
    </body> 
</html>