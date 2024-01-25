<!DOCTYPE html>
<html>
<head>
<title>Report Form</title>
</head>
<body>

<?php
include "../Header.php";
?>

<h2>Report keuze</h2>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="GET">
<input type="radio" name="report" value="Alles" checked="checked">
<label for="Alles">Alles</label><br>
<input type="radio" name="report" value="Id">
<label for="Id">Id</label><br>
<input type="Submit" name="verzenden" value= "Verzenden"><br>
</form>

<?php

         if ( isset($_GET["verzenden"] )) {   // If "verzenden" is set
         
             if ( $_GET["report"] == "Alles") { 
                 // If "Alles" is selected go to reportAlles
                 header("Location: reportAlles.php");
                 exit;
             } else {
                 // Else go to reportIDForm.php
                 header("Location: reportIDForm.php");
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
<a href="../../BMGapplicatie/Admin/home.php">Terug naar Homepage</a>
</html>