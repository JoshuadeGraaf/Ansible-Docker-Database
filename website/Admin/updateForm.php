<html>
<body>

<?php

include "../header.php";

$errorFound = false; // Er is nog GEEN fout gevonden

    $errFname = "";
    $errLname = "";
    $errEmail = "";

    $firstname = "";
    $lastname = "";
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

<h2>Update</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
     Id: <input name="id" value="<?php echo "$id"; ?>" readonly="readonly"><br>
     First name: <input name="firstname" type="text" value="<?php echo $firstname; ?>">*<?php echo $errFname; ?><br>
     Last name: <input name="lastname" type="text" value="<?php echo $lastname; ?>">*<?php echo $errLname; ?><br>
     E-mail: <input name="email" type="text" value="<?php echo $email; ?>">*<?php echo $errEmail; ?><br>
     <input name="verzenden" value="Verzenden" type="submit">
     <input name="cancel" value="Cancel" type="submit">
</form>

<?php

if ( isSet($_GET["verzenden"]) && ( $errorFound == false ) ) { // Verzenden is ingedrukt zonder fouten

   // include database file
   include "../BMGdatabase/Q_updateWhereId.php";


}
?>

<br>
<a href="home.php">Terug naar Homepage</a>
     
</body>
</html>