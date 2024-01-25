<?php
// Database declaration
include "A_declaration.php";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE `login` (
    `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
    `password` varchar(50) NOT NULL,
    `guest_id` int(6) NOT NULL DEFAULT -1 COMMENT '0 = Admin',
    `lastlogin` timestamp NULL DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";
if ($conn->query($sql) === TRUE) {
    echo "Table Login created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
}
$conn->close();
?>
