<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Provincie Groningen</title>
    <link rel="stylesheet" href="indexstyle.css">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="deny">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">
</head>
<body>
<h2>Provincie Groningen</h2> 
    <form method="POST" class="login-container">
        <input type="text" name="username" class="input-field" placeholder="Username" required>
        <input type="password" name="password" class="input-field" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
        <p class="message">Not registered? <a href="Register/registerForm.php">Create an account</a></p>

        <?php
            // Check for the error message and display it
            if (isset($_SESSION['msg'])) {
                echo '<p class="error-message">' . $_SESSION['msg'] . '</p>';
                unset($_SESSION['msg']); // Clear the message to avoid displaying it on subsequent requests
            }
        ?>
    </form>
</body>
</html>
