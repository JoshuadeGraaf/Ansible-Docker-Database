<?php
$servername = "db";
$username = "root";
$password = "Mobiel007";
$dbname = "Kerntaak";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>
