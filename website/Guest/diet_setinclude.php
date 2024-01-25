<?php
    $diet_code = $_GET["diet_code"];

    $first_name = $_SESSION['fname'];
    $last_name = $_SESSION['lname'];

    $update_query = "UPDATE guest SET diet_code='$diet_code' WHERE firstname='$first_name' AND lastname='$last_name'";
    $conn->query($update_query);

    header('location: homeGuest.php');
    exit();
?>