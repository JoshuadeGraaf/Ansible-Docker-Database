<html>
<body>

<?php

include "../header.php";

$errorFound = false; // Er is nog GEEN fout gevonden

$errfname = "";
$errlname = "";
$erremail = "";
$errusername = "";
$errpassword = "";

$fname = "";
$lname = "";
$email = "";
$username = "";
$password = "";

?>
<h2>Insertformulier</h2>

<form action="insertForm.php" method="GET">
     fname: <input name="fname" type="text" value="<?php echo $fname; ?>">*<?php echo $errfname; ?><br>
     lname: <input name="lname" type="text" value="<?php echo $lname; ?>">*<?php echo $errlname; ?><br>
     username: <input name="username" type="text" value="<?php echo $username; ?>">*<?php echo $errusername; ?><br>
     password: <input name="password" type="password" value="<?php echo $password; ?>">*<?php echo $errpassword; ?><br>
     email: <input name="email" type="text" value="<?php echo $email; ?>">*<?php echo $erremail; ?><br>
     <input name="Verzenden" value="Verzenden" type="submit">
     <input name="cancel" value="Cancel" type="submit">
</form>

<?php

if (isset($_GET["Verzenden"]) && (!$errorFound)) { // Verzenden is ingedrukt zonder fouten
    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
    $email = $_GET["email"];
    $username = $_GET["username"];
    $password = $_GET["password"];
    include "../BMGdatabase/E_insertData.php";
}

?>
<br>
<a href="home.php">Terug naar Homepage</a>
</body>
</html>
