<?php
// Database connection
include "../Database/A_declaration.php"; // Include the file where the database connection is defined
include "../Scripts/registerScript.php"; // Include the file where register() function is defined

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Password hashing using password_hash() - Replace this with your own password hashing logic
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($password === $confirm_password) {
        $registration_result = register($conn, $firstname, $lastname, $username, $email, $hashed_password);

        if ($registration_result === "User created successfully") {
            echo "Registration successful";
            // Clear input fields or handle redirection
            $_POST['firstname'] = '';
            $_POST['lastname'] = '';
            $_POST['username'] = '';
            $_POST['email'] = '';
        } else {
            echo "Registration failed: " . $registration_result;
        }
    } else {
        echo "Passwords do not match";
    }
}
?>

<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Register an account</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="firstname" placeholder="First name"value="<?php echo $_POST['firstname'] ?? ''; ?>" required>
					<br>
					<input class="text" type="text" name="lastname" placeholder="Last name" value="<?php echo $_POST['lastname'] ?? ''; ?>" required>
					<br>
					<input class="text" type="text" name="username" placeholder="Username" value="<?php echo $_POST['username'] ?? ''; ?>" required>
					<input class="text email" type="email" name="email" placeholder="Email" required="">
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="confirm_password" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name="submit" value="SIGNUP">
				</form>
				<p>Already have an account? <a href="../index.php"> Login here!</a></p>
			</div>
		</div>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</body>
</html>
