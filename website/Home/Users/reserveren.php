<?php
session_start();
include "../../Database/A_declaration.php";

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reserveer</title>
    <link rel="stylesheet" href="indexstyle.css">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="deny">
    <meta name="referrer" content="no-referrer">
    <meta http-equiv="Strict-Transport-Security" content="max-age=31536000; includeSubDomains; preload">
    <link rel="stylesheet" href="kamerstyle.css">
</head>
<body>
    <div id="content">
        <nav class="navbar">
            <div class="container-fluid">
                <ul>
                    <li><a href="./homepage.php">Home</a></li>
                    <li><a href="./reserveren.php">Reserveer</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <h2>Kies een ruimte:</h2>
        <form action="verwerk.php" method="post">
            <label for="room_id">Ruimte</label>
            <select name="room_id" id="room_id">
                <?php
                $kamer_query = "SELECT * FROM rooms";
                $stmt = $conn->prepare($kamer_query);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    $room_id = $row['room_id'];
                    $room_number = $row['room_number'];
                    echo "<option value='$room_id'>$room_number</option>";
                }
                ?>
            </select>
            <br>

            <h2>Vul de datum en tijd in:</h2>
            <label for="checkin">Check-in datum</label>
            <input type="datetime-local" id="checkin" name="checkin" required>
            <br>
            <label for="checkout">Check-out datum</label>
            <input type="datetime-local" id="checkout" name="checkout" required>
            <br>
            <input type="submit" value="Verzenden">
        </form>
    </div>
</body>
</html>
