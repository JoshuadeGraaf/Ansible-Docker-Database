<?php
session_start();
include "../../Database/A_declaration.php";

$user_id = $_SESSION['user_id'];
// $username = $_SESSION['username'];

// Debugging - output received POST data
var_dump($_POST);

// Retrieve form data
$room_id = isset($_POST['room_id']) ? $_POST['room_id'] : '';
$checkin = isset($_POST['checkin']) ? $_POST['checkin'] : '';
$checkout = isset($_POST['checkout']) ? $_POST['checkout'] : '';

// Debugging - output retrieved form data
var_dump($room_id, $checkin, $checkout);

// Check for empty values
if (!empty($room_id) && !empty($checkin) && !empty($checkout) && !empty($user_id)) {
    // Perform database insertion
    $insert_sql = "INSERT INTO reservations (room_id, reservation_date, check_out_date, user_id) 
                   VALUES ('$room_id', '$checkin', '$checkout', '$user_id')";

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check for errors in connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Execute the query
    if ($conn->query($insert_sql) === TRUE) {
        echo "Reservering succesvol!";

        // Check if check_out_date is in the past, and delete the reservation if needed
        $current_date = date("Y-m-d H:i:s");
        $delete_sql = "DELETE FROM reservations WHERE user_id = '$user_id' AND check_out_date < '$current_date'";
        $conn->query($delete_sql); // Execute the delete query
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Error: Empty values for date, time, or user ID.";
}
?>
