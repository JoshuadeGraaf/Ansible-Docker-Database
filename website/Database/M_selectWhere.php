<?php

// Database declaration
include "A_declaration.php";

// Declare the search argument
/* ------------------------------------------------------------------------------
   Please, note:
   This file can be used as an include file, or can be used as standalone file
   -if the variable $lname is already set
   then this file is used as an include file
   -if not, then the variable $lname will be declared here
----------------------------------------------------------------------------- */
if ( isset($lname) ) {
     // the variable $lname is already set
     $isIncludeFile = true;
} else {
     $lname = "Doe";
     $isIncludeFile = false;
}


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname FROM Guest WHERE lastname='$lname'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>