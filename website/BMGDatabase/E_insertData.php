<?php

// Database declaration
include "A_declaration.php";

// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Declare insert values
$fname = isset($_GET["fname"]) ? $_GET["fname"] : "John";
$lname = isset($_GET["lname"]) ? $_GET["lname"] : "Doe";
$email = isset($_GET["email"]) ? $_GET["email"] : "john@example.com";
$username = isset($_GET["username"]) ? $_GET["username"] : "";
$password = isset($_GET["password"]) ? $_GET["password"] : "";
$hash_password = sha1($password);
$sql = "INSERT INTO guest (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";

// if ($sql_result) {
//   $guest_id = mysqli_insert_id($conn);

//   $login_query = "INSERT INTO login (guest_id, username, password) VALUES ('$guest_id', '$username', '$hash_password')";
// }

if ($conn->query($sql) === TRUE) {
  echo "Guest is successfully added to the database";
  $guest_id = mysqli_insert_id($conn);
  $login_query = "INSERT INTO login (guest_id, username, password) VALUES ('$guest_id', '$username', '$hash_password')";
  $login_result = mysqli_query($conn, $login_query);
}
 else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
