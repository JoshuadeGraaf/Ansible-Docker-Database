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
if (isset($firstname) && isset($lastname) && isset($email)) {
    // the variables $fname, $lname and $email are already set
    $isIncludeFile = true;
} else {
    $id = 1;
    $firstname = "Elvis";
    $lastname = "Presley";
    $email = "elvis@hello.com";
    $isIncludeFile = false;
}

// Create connection
$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE guest SET firstname = '$firstname' , lastname= '$lastname', email = '$email' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>