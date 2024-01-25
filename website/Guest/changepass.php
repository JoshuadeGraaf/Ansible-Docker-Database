<?php
session_start();
include "../BMGDatabase/A_declaration.php";

$conn = mysqli_connect($host, $user, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
} else {
    $verbinding = true;
}

include "changepassinclude.php";
?>

<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h2>Update</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        Username: <input name="username" type="text" value="<?php echo $_SESSION['username']; ?>" readonly="readonly"><br>
        First name: <input name="fname" type="text" value="<?php echo $_SESSION['fname']; ?>" readonly="readonly"><br>
        Last name: <input name="lname" type="text" value="<?php echo $_SESSION['lname']; ?>" readonly="readonly"><br>
        E-mail: <input name="email" type="text" value="<?php echo $_SESSION['email']; ?>" readonly="readonly"><br>
        Old Password: <input name="old_pass" type="password" id="old_pass" placeholder="oldpass" required><br>
        New Password: <input name="new_pass" type="password" id="new_pass" placeholder="newpass" required><br>
        <input name="verzenden" value="Verzenden" type="submit">
        <button type="button" onclick="togglePasswordVisibility()">Show/Hide password</button>
        <button type="button" onclick="location.href='homeGuest.php'">Back</button>
    </form>

    <script>
        function togglePasswordVisibility() {
            var oldPassField = document.getElementById("old_pass");
            var newPassField = document.getElementById("new_pass");

            if (oldPassField.type === "password") {
                oldPassField.type = "text";
                newPassField.type = "text";
            } else {
                oldPassField.type = "password";
                newPassField.type = "password";
            }
        }
    </script>
</body>
</html>
