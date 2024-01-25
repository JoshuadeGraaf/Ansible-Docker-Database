<?php

// Database declaration
include "A_declaration.php";

// Declare delete values
/* ------------------------------------------------------------------------------
   Please, note:
   This file can be used as an include file, or can be used as standalone file
   -if the variable $id is already set
   then this file is used as an include file
   -if not, then the variable $id will be declared here
------------------------------------------------------------------------------ */
if (isset($id)) {
    // the variable $id is already set
    $isIncludeFile = true;
} else {
    $id = 2;
    $isIncludeFile = false;
}

// Create connection
$conn = new mysqli($host, $user, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM login WHERE guest_id=$id";

if ($conn->query($sql) === TRUE) {
  $guest_sql = "DELETE FROM guest WHERE id=$id";
  $guest_result = $conn->query($guest_sql);
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
