<?php

        // Database declaration
        include "A_declaration.php";

        // Declare $id value
        /* ------------------------------------------------------------------------------
           Please, note:
           This file can be used as an include file, or can be used as standalone file
           -if the variable $id is already set
           then this file is used as an include file
           -if not, then the variable $id will be declared here
        ------------------------------------------------------------------------------ */
        if ( isset($id) ) {
            // the variable $id is already set
            $isIncludeFile = true;
        } else {
            $id = 1;
            $isIncludeFile = false;
        }

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, firstname, lastname, email FROM Guest WHERE id='$id'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
          // output data of each row
          $row = $result->fetch_assoc();
            if ( !$isIncludeFile ) {

                echo "id: " . $row["id"]. " <br> - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br> - E-mail: " . $row["email"]. "<br>";

            } else { 

                // Fill local variables for usage in main programs
                $id = $row["id"];
                $fname = $row["firstname"];
                $lname = $row["lastname"];
                $email = $row["email"];

            }
        } else {
          echo "0 results";
        }

        $conn->close();

?>