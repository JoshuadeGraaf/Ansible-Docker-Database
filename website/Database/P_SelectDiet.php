<?php
// Database declaration
include "A_declaration.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET["diet_code"])) {
  $selectedCode = $_GET["diet_code"];

  $firstname = $_SESSION["firstname"];
  $lastname = $_SESSION["lastname"];
  $updateQuery = "UPDATE guest SET diet_code = '$selectedCode' WHERE firstname = '$firstname' AND lastname = '$lastname'";
  $conn->query($updateQuery);

  header("Location: homeGuest.php");
  exit();
} 

if (isset($_POST["delete_diet"])) {
  $firstname = $_SESSION["firstname"];
  $lastname = $_SESSION["lastname"];

  $deleteQuery = "UPDATE guest SET diet_code = NULL WHERE firstname = '$firstname' AND lastname = '$lastname'";
  $conn->query($deleteQuery);

  header("Location: homeGuest.php");
  exit(); 
}

$sql = "SELECT * FROM diet";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $firstname = $_SESSION["firstname"];
  $lastname = $_SESSION["lastname"];

  $selectedDietQuery = "SELECT diet_code FROM guest WHERE firstname = '$firstname' AND lastname = '$lastname'";
  $selectedDietResult = $conn->query($selectedDietQuery);

  if ($selectedDietResult->num_rows > 0) {
    $selectedDietRow = $selectedDietResult->fetch_assoc();
    $selectedDietCode = $selectedDietRow["diet_code"];
  } else {
    $selectedDietCode = null;
  }

  echo "<form method='get' action='' style='display: inline-block;'>";
  echo "<select name='diet_code' style='padding: 8px 16px; border-radius: 4px;'>";
  
  while ($row = $result->fetch_assoc()) {
    $code = $row["code"];
    $description = $row["description"];
    
    $selected = ($code == $selectedDietCode) ? "selected" : "";

    echo "<option value='$code' $selected>$description</option>";
  }
  
  echo "</select>";
  echo "<button type='submit' style='padding: 8px 16px; margin-left: 10px; border: none; background-color: #4CAF50; color: white; cursor: pointer; border-radius: 4px;'>Kies</button>";
  echo "</form>";

  echo "<form method='post' action='' style='display: inline-block;'>";
  echo "<button type='submit' name='delete_diet' style='padding: 8px 16px; margin-left: 10px; border: none; background-color: #f44336; color: white; cursor: pointer; border-radius: 4px;'>Verwijder mijn dieetplan</button>";
  echo "</form>";
  
  if (isset($_POST["delete_diet"])) {
    header("Location: homeGuest.php");
    exit(); 
  }
} else {
  echo "0 results";
}

$conn->close();
?>
