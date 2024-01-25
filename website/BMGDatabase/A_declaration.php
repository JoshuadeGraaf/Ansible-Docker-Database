<?php
$host = "db";
$user = "root";
$password = "Mobiel007";
$database = "BMG";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>