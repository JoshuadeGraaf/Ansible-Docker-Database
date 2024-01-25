<?php
$username = $_SESSION['username'];
$old_pass = isset($_POST['old_pass']) ? $_POST['old_pass'] : '';
$hashed_old_pass = sha1($old_pass);
$new_pass = isset($_POST['new_pass']) ? $_POST['new_pass'] : '';
$hashed_new_pass = sha1($new_pass);

$query = "UPDATE login SET password='$hashed_new_pass' WHERE username='$username' AND password='$hashed_old_pass'";
$result = mysqli_query($conn, $query);

if (isset($_POST['verzenden'])) {
    if ($result) {
        echo "Password changed successfully";
    } else {
        echo "Password change failed";
    }
}
?>