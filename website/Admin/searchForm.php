<html>
<body>

<?php

include "../header.php";

// echo "File Name: searchForm.php";

// echo "<br><br>";

// echo "*** under construction ***";

// echo "<br><br>";

/* ------------------------------------------
       Process Data First then Form (PDF)
   ------------------------------------------ */

$errorFound = false; // Er is nog GEEN fout gevonden

    $errLname = "";

    $lastname = "";

if ( isSet($_GET["verzenden"]) ) { // Test of berekenen is ingedrukt

    if ( empty($_GET["lastname"]) ) { // Test of Num1 leeg is

        $errorFound = true; // Er is een fout gevonden
        $errLname = "Lname is required";

    } else {

        // collect value of input field Num1
        $lastname = $_GET["lastname"];

    }

}

?>
<h2>searchForm</h2>

<form action="searchForm.php" method="GET">
     Lname: <input name="lastname" type="text" value="<?php echo $lastname; ?>">*<?php echo $errLname; ?><br>
     <input name="verzenden" value="Verzenden" type="submit">
     <input name="cancel" value="Cancel" type="submit">
</form>

<?php

if ( isSet($_GET["verzenden"]) && ( $errorFound == false ) ) { // Berekenen is ingedrukt zonder fouten
                                                             
        // echo ($lname);
        // include M_SelectWhere
        include "../BMGdatabase/M_selectWhere.php";
}
  
?>

<br>
<a href="home.php">Terug naar Homepage</a>
</body>
</html>