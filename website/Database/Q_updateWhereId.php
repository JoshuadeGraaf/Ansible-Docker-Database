<?php

// Database declaration
include "A_declaration.php";

// Declare update values
/* ------------------------------------------------------------------------------
   Please, note:
   This file can be used as an include file, or can be used as standalone file
   -if the variables $fname, $lname and $email are already set
   then this file is used as an include file
   -if not, then the variables $fname, $lname and $email will be declared here
------------------------------------------------------------------------------ */
if (isset($fname) && isset($lname) && isset($email)) {
    // the variables $fname, $lname and $email are already set
    $isIncludeFile = true;
} else {
    $id = 1;
    $fname = "Elvis";
    $lname = "Presley";
    $email = "elvis@hello.com";
    $isIncludeFile = false;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE Guest SET firstname = '$fname' , lastname='$lname', email = '$email' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>