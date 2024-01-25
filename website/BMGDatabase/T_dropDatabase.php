<?php

// Database declaration
include "A_declaration.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "DROP DATABASE $dbname";

if ($conn->query($sql) === TRUE) {
  echo "Database $dbname dropped successfully";
} else {
  echo "Error droping database: " . $conn->error;
}

$conn->close();
?>