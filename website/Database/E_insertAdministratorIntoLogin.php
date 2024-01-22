<?php

// Database declaration
include "A_declaration.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($fname) && isset($lname) && isset($email)) {
    // the variables $fname, $lname, and $email are already set
    $isIncludeFile = true;
} else {
    $username_administrator = "Administrator";
    $password_administrator = password_hash('geheim' , PASSWORD_DEFAULT); // Password hashing using password_hash() 
    $user_id_administrator = 0; // Explicitly set user_id to 0

    $isIncludeFile = false;

    // Create SQL statement
    $sql = "INSERT INTO login (user_id, username, password)
            VALUES ('$user_id_administrator', '$username_administrator', '$password_administrator')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
