<?php    
    $username = $_POST['user'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $email = $_POST['mail'];
    $password = $_POST['pass'];

	$confirm_password = $password;

	if ($password === $confirm_password) {
		$hash_password = sha1($password);

		$guest_query = "INSERT INTO guest (firstname, lastname, email) VALUES ('$fname', '$lname', '$email')";
		$guest_result = mysqli_query($conn, $guest_query);

	if ($guest_result) {
        $guest_id = mysqli_insert_id($conn);

		$login_query = "INSERT INTO login (guest_id, username, password) VALUES ('$guest_id', '$username', '$hash_password')";
    	$login_result = mysqli_query($conn, $login_query);

		if ($guest_result) {
			header("Location: index.php");				
    } else {
        echo "Something went wrong";
    }
}
}
?>