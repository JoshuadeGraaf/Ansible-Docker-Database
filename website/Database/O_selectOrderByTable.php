<html>
<body>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    </body>
</html>


<?php
// Database declaration
include "A_declaration.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, email FROM Guest ORDER BY lastname";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output table header
  echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
  
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]."</td><td>".$row["lastname"]."</td><td>".$row["email"]."</td></tr>";
  }
  
  // Output table footer
  echo "</table>";
} else {
  echo "0 results";
}

$conn->close();
?>