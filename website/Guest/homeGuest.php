<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}

include "../BMGDatabase/A_declaration.php";

$conn = mysqli_connect($host, $user, $password, $database);
// Controleer of de verbinding succesvol is gemaakt
if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
} else {
    $verbinding = true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logged In Page</title>
    <link rel="stylesheet" href="gueststyle.css">
</head>
<body>
<nav>
    <a href="changepass.php">Change password</a>
    <a href="logoutform.php">Logout</a>
</nav>

<?php
$diet_description = "";


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "Your first name is: " . $_SESSION['fname'];
echo "<br>";
echo "Your last name is: " . $_SESSION['lname'];
echo "<br>";
echo "Your username is: " . $_SESSION['username'];
echo "<br>";
echo "Your ID is: " . $_SESSION['guest_id'];
echo "<br>";
echo "Your email is: " . $_SESSION['email'];
echo "<br>";
echo "<br>";

$query = "SELECT * FROM guest WHERE id='{$_SESSION['guest_id']}'";
$result = mysqli_query($conn, $query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $diet_code = $row['diet_code'];
    $diet_query = "SELECT description FROM diet WHERE code='$diet_code'";
    $diet_result = mysqli_query($conn, $diet_query);

    if ($diet_result->num_rows > 0) {
        $diet_row = $diet_result->fetch_assoc();
        $diet_description = $diet_row['description'];
    }

    echo "Your diet is: " . $diet_description .  " <a href= 'dietkeuze.php'>Change diet</a>";
    echo "<br>";
}
?>
</body>
</html>
