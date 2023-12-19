<?php

include "A_declaration.php";

if (isset($fname) && isset($lname) && isset($email)) {
    $isIncludeFile = true;
} else {
    $fname = "John"; 
    $lname = "Doe"; 
    $email = "john@example.com";
    $isIncludeFile = false;
}

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert into Guest table
$sqlGuest = "INSERT INTO Guest (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";

if ($conn->query($sqlGuest) === TRUE) {
    // Get the guest ID from the last inserted row
    $guestId = $conn->insert_id;

    // Retrieve the username and password values
    $username = $_GET["username"];
    $password = $_GET["password"];

    // Hash the password
    $hashedPassword = sha1($password);

    // Insert into login table
    $sqlLogin = "INSERT INTO login (guest_id, username, password) VALUES ('$guestId', '$username', '$hashedPassword')";

    if ($conn->query($sqlLogin) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sqlLogin . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sqlGuest . "<br>" . $conn->error;
}

$conn->close();

?>
