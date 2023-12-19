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
$sql = "DROP TABLE Guest";

if ($conn->query($sql) === TRUE) {
  echo "Table Guest dropped successfully";
} else {
  echo "Error droping table: " . $conn->error;
}

$conn->close();
?>