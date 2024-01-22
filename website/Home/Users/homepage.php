<?php
session_cache_limiter('nocache');
session_start();
include "../../Database/A_declaration.php";

if (!isset($_SESSION['user_id'])) {
  header("Location: ../index.php");
  exit;
}


$user_id = $_SESSION['user_id'];
$user_query = "SELECT firstname, lastname, email FROM users WHERE id = ?";
$stmt = $conn->prepare($user_query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $_SESSION['firstname'] = $row['firstname'];
  $_SESSION['lastname'] = $row['lastname'];
  $_SESSION['email'] = $row['email'];
} else {
  echo "No Data Found";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Homepage</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">
  <link rel="stylesheet" href="style.css">
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
    <div class="info-box">
      <p>Je bent ingelogd als:</p>
      <?php
        echo "Username: " . $_SESSION['username'] . "<br>";
        echo "First Name: " . $_SESSION['firstname'] . "<br>";
        echo "Last Name: " . $_SESSION['lastname'] . "<br>";
        echo "Email: " . $_SESSION['email'] . "<br>";

        echo "<br>";

        $query = "SELECT * FROM users WHERE id = {$_SESSION['user_id']}";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user_id = $row['id'];
            $reservation_query = "SELECT * FROM reservations WHERE user_id = $user_id";
            $reservation_result = $conn->query($reservation_query);

            if ($reservation_result->num_rows > 0) {
                $reservation_row = $reservation_result->fetch_assoc();
                $reservation_id = $reservation_row['reservation_id'];
                $reservation_room_id = $reservation_row['room_id'];
            }
                if ($reservation_row->num_rows > 0) {
                    $room_query = "SELECT * FROM rooms WHERE room_id = $reservation_room_id";
                    $room_result = $conn->query($room_query);
                    $room_row = $room_result->fetch_assoc();
                    $room_number = $room_row['room_number'];
                }
        }
        if ($reservation_result->num_rows > 0) {
            echo "Je hebt een reservering voor kamer: " . $room_number . "<br>";
        } else {
            echo "Je hebt geen reservering";
        }
      ?>
    </div>
  </div>
</body>
</html>

