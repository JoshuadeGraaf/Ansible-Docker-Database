<?php
session_start();
include "database/A_declaration.php";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $verbinding = false;

      // Controleer of de verbinding succesvol is gemaakt
    if (!$conn) {
        die("Verbinding mislukt: " . mysqli_connect_error());
            } else {
                $verbinding == true;
    }
?>

<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="registerstyle.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Register an account</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="post">
					<input class="text" type="text" name="fname" placeholder="First name" required="">
					<br>
					<input class="text" type="text" name="lname" placeholder="Last name" required="">
					<br>
					<input class="text" type="text" name="user" placeholder="Username" required="">
					<input class="text email" type="email" name="mail" placeholder="Email" required="">
					<input class="text" type="password" name="pass" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="confirm_pass" placeholder="Confirm Password" required="">
					<div class="wthree-text">
						<label class="anim">
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" name="submit" value="SIGNUP">
				</form>
				<p>Already have an account? <a href="index.php"> Login here!</a></p>
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

<?php
if (isset($_POST['submit'])) {

  include "registerinclude.php";
  
} else {
		echo "Password do not match";
	}

	
?>