<?php
// Include the file with database connection details
include 'A_declaration.php';

// SQL to create table
$sql = "CREATE TABLE Login (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Execute query to create table
if ($conn->query($sql) === TRUE) {
    echo "Table Login created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
