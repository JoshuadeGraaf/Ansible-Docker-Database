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
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Begin a transaction
$conn->begin_transaction();

try {
  // sql to delete a record from Guest table
  $guestSql = "DELETE FROM Guest WHERE id=$id";

  // sql to delete the associated account from login table
  $loginSql = "DELETE FROM login WHERE guest_id=$id";

  // Execute the first query
  $conn->query($guestSql);

  // Execute the second query
  $conn->query($loginSql);

  // Commit the transaction
  $conn->commit();

  echo "Record deleted successfully";
} catch (Exception $e) {
  // Rollback the transaction if an error occurred
  $conn->rollback();
  echo "Error deleting record: " . $e->getMessage();
}

$conn->close();
?>
