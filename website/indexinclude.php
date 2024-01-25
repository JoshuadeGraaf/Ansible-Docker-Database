<?php
        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = sha1($password);

        $query = "SELECT * FROM login WHERE username='$username' AND password='$password' OR username='$username' AND password='$hashed_password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);


        if ($row && isset($row['guest_id'])) {
            $guest_id = $row['guest_id'];
            $guest_query = "SELECT * FROM guest WHERE id='$guest_id'";
            $guest_result = mysqli_query($conn, $guest_query);
            $guest_row = mysqli_fetch_assoc($guest_result);

            if ($guest_id == 0) {
                $_SESSION['fname'] = $guest_row['firstname'];
                $_SESSION['lname'] = $guest_row['lastname'];
                $_SESSION['username'] = $username;
                $_SESSION['guest_id'] = $guest_id;
                $_SESSION['email'] = $guest_row['email'];
                $_SESSION['password'] = $password;
                header('location: Admin/home.php');
                exit;
            } else {
                $_SESSION['fname'] = $guest_row['firstname'];
                $_SESSION['lname'] = $guest_row['lastname'];
                $_SESSION['username'] = $username;
                $_SESSION['guest_id'] = $guest_id;
                $_SESSION['email'] = $guest_row['email'];
                $_SESSION['password'] = $password;
                header('location: Guest/homeGuest.php');
                exit;
            }
        } else {
            $incorrect = true;
        }
?>