<html>
<body>

<?php

include "../header.php";

$errorFound = false; // Er is nog GEEN fout gevonden

    $errFname = "";
    $errLname = "";
    $errEmail = "";

    $fname = "";
    $lname = "";
    $email = "";

    // input data processing
    $id = $_GET['id'];


    // determine if verzenden button is NOT set
    if ( !isset($_GET["verzenden"]) ) { // note: this line differs from Calculator5.php !

        // include data processing
        include "../BMGdatabase/N_selectWhereId.php";

    } else {    

        if ( empty($_GET["firstname"]) ) { // Test of Fname leeg is

            $errorFound = true; // Er is een fout gevonden
            $errFname = "Fname is required";

        } else {

            // collect value of input field Fname
            $firstname = $_GET["firstname"];

        }

        if ( empty($_GET["lastname"]) ) { // Test of Lname leeg is

            $errorFound = true; // Er is een fout gevonden
            $errLname = "Lname is required";

        } else {

            // collect value of input field Lname
            $lastname = $_GET["lastname"];

        }

        if ( empty($_GET["email"]) ) { // Test of Email leeg is

            $errorFound = true; // Er is een fout gevonden
            $errEmail = "Email is required";

        } else {

            // collect value of input field Lname
            $email = $_GET["email"];

        }

    }

?>

<h2>Delete</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
     Id: <input name="id" value="<?php echo "$id"; ?>" readonly="readonly"><br>
     First name: <input name="fname" type="text" readonly="readonly" value="<?php echo $firstname; ?>">*<?php echo $errFname; ?><br>
     Last name: <input name="lname" type="text" readonly="readonly" value="<?php echo $lastname; ?>">*<?php echo $errLname; ?><br>
     E-mail: <input name="email" type="text" readonly="readonly" value="<?php echo $email; ?>">*<?php echo $errEmail; ?><br>
     <input name="delete" value="delete" type="submit" readonly="readonly">
     <input name="cancel" value="Cancel" type="submit" readonly="readonly">
</form>

<?php

if ( isSet($_GET["delete"]) && ( $errorFound == false ) ) { // delete is ingedrukt zonder fouten

    // include database file

    include "../../BMGdatabase/G_deleteData2.php";


}
?>
<br>
<a href="../../BMGapplicatie/Admin/home.php">Terug naar Homepage</a>    
</body>
</html>