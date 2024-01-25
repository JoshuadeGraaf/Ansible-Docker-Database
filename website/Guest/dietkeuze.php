<?php
    session_start();
    include "../BMGDatabase/A_declaration.php";

    $conn = mysqli_connect($host, $user, $password, $database);

    if (!$conn) {
        die("Verbinding mislukt: " . mysqli_connect_error());
    } else {
        $verbinding = true;
    }

    if (isset($_GET["diet_code"])) {
        include "diet_setinclude.php";
    }

    $sql = "SELECT * FROM diet";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        include "diet_unsetinclude.php";
    } else {
        echo "0 results";
    }

    $conn->close();
?>

<html>
    <body>
    </body>
</html>
