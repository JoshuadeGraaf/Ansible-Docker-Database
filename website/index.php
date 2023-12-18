<?php
    session_start();
    include "database/A_declaration.php"; 
?>

<head>     
        <link rel="stylesheet" href="indexstyle.css">
    </head>

    <body>
        <center><h2>Login to BeMyGuest</h2></center>
        <form method="POST">
            <input type="text" name="username" placeholder="username" required>
            <input type="password" name="password" placeholder="password" required>
            <button type="submit" name="login">Login</button>
            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        </form>
        <?php if (isset($msg)) { echo "<p>$msg</p>"; } ?>
    </body> 

<?php
    $verbinding = '';
    $incorrect = '';
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Controleer of de verbinding succesvol is gemaakt
    if (!$conn) {
        die("Verbinding mislukt: " . mysqli_connect_error());
    } else {
        $verbinding = true;
    }

    if (isset($_POST['login'])) {
        include "indexinclude.php";
}

    if ($incorrect == true){
        echo "<br><center><h3>Incorrect username or password</h3></center><br>";
    }
?>




</html>
