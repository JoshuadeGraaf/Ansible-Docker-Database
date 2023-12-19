<?php
function register($conn, $firstname, $lastname, $username, $email, $hashed_password) {
    $firstname = mysqli_real_escape_string($conn, $firstname);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $username = mysqli_real_escape_string($conn, $username);
    $email = mysqli_real_escape_string($conn, $email);

    // Query to insert user details into 'Users' table
    $register_query = "INSERT INTO users (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
    $register_result = mysqli_query($conn, $register_query);

    if ($register_result) {
        $user_id = mysqli_insert_id($conn);

        // Query to insert login credentials into 'login' table
        $login_query = "INSERT INTO login (user_id, username, password) VALUES ('$user_id', '$username', '$hashed_password')";
        $login_result = mysqli_query($conn, $login_query);

        if ($login_result) {
            return "User created successfully";
        } else {
            return "Error inserting login credentials: " . mysqli_error($conn);
        }
    } else {
        return "Error inserting user details: " . mysqli_error($conn);
    }
}

?>
