<?php
$servername = "192.168.81.174";
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
