<!DOCTYPE html>
<html>
<head>
<title>Select Form</title>
</head>
<body>

<?php
include "../Header.php";
?>

<h2>Select keuze</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
<input type="radio" name="sort" value="Ongesorteerd" checked="checked">
<label for="ongesorteerd">Ongesorteerd</label><br>
<input type="radio" name="sort" value="Gesorteerd">
<label for="gesorteerd">Gesorteerd</label><br>
<input type="Submit" name="verzenden" value= "Verzenden"><br>
</form>

<?php

         if ( isset($_GET["verzenden"] )) {   // If "verzenden" is set
         
             if ( $_GET["sort"] == "Ongesorteerd") { 
                 // If "Ongesorteerd" is selected go to selectOngesorteerd.php
                 header("Location: selectOngesorteerd.php");
                 exit;
             } else {
                 // Else go to selectGesorteerd.php
                 header("Location: selectGesorteerd.php");
                 exit;
             }

        }  // End if "verzenden" is set
 
?>

<hr>
<h2>Superglobal(s)</h2>
<?php
     include "../Footer.php";
?>
</body>
<br>
<a href="home.php">Terug naar Homepage</a>
</html>