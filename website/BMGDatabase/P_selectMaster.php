<?php

// Database declaration
include "A_declaration.php";

// Create connection
$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM guest";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $searchLine =  "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"];
    $searchLine = $searchLine . " " . "<a href=\"viewForm.php?id=". $row["id"] . "\">View</a>";
    $searchLine = $searchLine . " " . "<a href=\"updateForm.php?id=". $row["id"] . "\">Update</a>";
    $searchLine = $searchLine . " " . "<a href=\"deleteForm.php?id=". $row["id"] . "\">Delete</a>" . "<br>";
    echo $searchLine;
  }
} else {
  echo "0 results";
}


$conn->close();
?>