<?php
function login($conn, $username, $password) {
    // Use prepared statements to prevent SQL injection
    $login_query = "SELECT user_id, username, password FROM login WHERE username=?";
    $stmt = $conn->prepare($login_query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        $user_id = $row['user_id']; // Fetch 'user_id' from login table

        // Verify password using password_verify function
        if (password_verify($password, $hashed_password)) {
            // Password is correct, retrieve user details from 'users' table
            $user_query = "SELECT id FROM users WHERE id=?";
            $stmt = $conn->prepare($user_query);
            $stmt->bind_param('i', $user_id); // Assuming 'id' column in 'users' table
            $stmt->execute();
            $user_result = $stmt->get_result();

            if ($user_result->num_rows == 1) {
                $user_row = $user_result->fetch_assoc();
                $id = $user_row['id']; // Fetch 'id' from users table

                // Set session variables
                $_SESSION['user_id'] = $id; // Using 'id' from 'users' table
                $_SESSION['username'] = $username;

                // Redirect based on user_id or any other condition
                if ($_SESSION['user_id'] == 0) {
                    header('location: ../Home/Admin/homepage.php');
                } else {
                    header('location: ../Home/Users/homepage.php');
                }
                exit();
            }
        }
    } else {
        echo "User not found";
    }
}
?>