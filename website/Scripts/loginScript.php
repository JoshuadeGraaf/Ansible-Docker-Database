<?php
function login($conn, $username, $password) {
    $login_query = "SELECT user_id, username, password FROM login WHERE username=?";
    $stmt = $conn->prepare($login_query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        $user_id = $row['user_id']; 
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;

            if ($username === 'Administrator') {
                header('location: ../Home/Admin/homepage.php');
            } else {
                header('location: ../Home/Users/homepage.php');
            }
            exit();
        } else {
            echo "<p>Verkeerde username & password combinatie</p>";
        }
    } else {
        echo "<p>Verkeerde username & password combinatie</p>";
    }
}
?>
