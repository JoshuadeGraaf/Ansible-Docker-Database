<?php

// Database declaration
include "A_declaration.php";

// Declare insert values
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
    $username_administrator = "Administrator";
    $password_administrator = sha1('geheim');
    $guest_id_administrator = 0;
    $isIncludeFile = false;
}

// Create connection
$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO Login (username, password, guest_id)
VALUES ('$username_administrator', '$password_administrator', '$guest_id_administrator')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>