<?php

    $id = $_GET['id'];
// data processing: include database file
    include "../BMGdatabase/N_selectWhereId.php";
// output: echo labels and values of $row["id"], $row["firstname"], $row["lastname"] and $row["email"]
echo "- id: " . $row["id"]. " <br> - Name: " . $row["firstname"]. "  " . $row["lastname"]. " <br> - E-mail: " . $row["email"]. "<br>";
?>

<br>
<html>
<body>
<a href="home.php">Terug naar Homepage</a>
</body>
</html>