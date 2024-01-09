<?php

// Database declaration
include "A_declaration.php";

if (isset($fname) && isset($lname) && isset($email)) {
    // the variables $fname, $lname and $email are already set
    $isIncludeFile = true;
} else {
    $username_administrator = "Administrator";
    $password_administrator = password_hash('geheim' , PASSWORD_DEFAULT); // Password hashing using password_hash() 
    $user_id_administrator = 0;
    $isIncludeFile = false;
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO login (username, password, user_id)
VALUES ('$username_administrator', '$password_administrator', '$user_id_administrator')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
