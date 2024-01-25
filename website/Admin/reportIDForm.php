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

include "../header.php";

/* ------------------------------------------
       Process Data First then Form (PDF)
   ------------------------------------------ */

$errorFound = false; // Er is nog GEEN fout gevonden

    $errId = "";
    $errNum2 = "";

    $id = "";
    $firstname = "";
    $lastname = "";
    $email = "";
    $num2 = "";

if ( isSet($_GET["verzenden"]) ) { // Test of verzenden is ingedrukt

    if ( empty($_GET["id"]) ) { // Test of Id leeg is

        $errorFound = true; // Er is een fout gevonden
        $errId = "Id is required";

    } elseif ( is_numeric($_GET["id"]) == false ) { // Test of Id numeric is

        $errorFound = true; // Er is een fout gevonden
        $errId = "Id is not numeric";

    } else {

        // collect value of input field Id
        $id = $_GET["id"];

    }

}

?>

<h2>Report ID</h2>

<form action="reportIDForm.php" method="GET">
     Id: <input name="id" type="text" value="<?php echo $id; ?>">*<?php echo $errId; ?><br>
     <input name="verzenden" value="Verzenden" type="submit">
     <input name="cancel" value="Cancel" type="submit">
</form>

<?php

if ( isSet($_GET["verzenden"]) && ( $errorFound == false ) ) { // Verzenden is ingedrukt zonder fouten
                                                             
   // include database file
   include "../../BMGDatabase/N_selectWhereId.php";
    echo "<table><tr><th>Label</th><th>Value</th></tr>";
    echo "<tr><td>Id</td><td>".$id."</td></tr>";
    echo "<tr><td>Voornaam</td><td>".$firstname."</td></tr>";
    echo "<tr><td>Achternaam</td><td>".$lastname."</td></tr>";
    echo "<tr><td>E-mail</td><td>".$email."</td></tr>";
    echo "</table>";



}
  

?>
<br>
<a href="home.php">Terug naar Homepage</a>
</html>