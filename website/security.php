<?php
session_start();
    // Verbinding maken met de database
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "BMG";

    $conn = mysqli_connect($host, $user, $password, $database);

    $verbinding = false;

      // Controleer of de verbinding succesvol is gemaakt
    if (!$conn) {
        die("Verbinding mislukt: " . mysqli_connect_error());
            } else {
                $verbinding == true;
    }

    // Check if the username session variable is set
    if(isset($_SESSION['username'])){
        // Get the value of the username session variable
        $username = $_SESSION['username'];

        // Do something with the username variable
        echo "Hey $username, je wordt zo doorgestuurd naar de homepagina";
    } else {
        echo "You are not logged in";
    }


    $query = "SELECT * FROM login WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $guest_id = $row['guest_id'];


    echo "<br>";
    echo $guest_id;

    if ($guest_id == 0) {
        echo "You are an admin je wordt zo doorgestuurd naar de admin pagina";
        header('location: Admin/home.php');
    } else {
        echo "You are a guest je wordt zo doorgestuurd naar de guest pagina";
        header('location: Guest/homeGuest.php');
    }

    if ($verbinding == true){
        echo "<br>Verbinding gelukt<br>";
    } 
?>

