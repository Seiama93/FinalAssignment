<?php
include("db.php");
session_start();

if (isset($_POST['id'])) {
	$id = $_POST['id'];
	$password = $_POST['password'];
	
	$query = "SELECT * from users where studentID='" 
		. $id . "' AND pass='" . $password . "'";
	$result = mysqli_query($connection, $query);

	if (mysqli_num_rows($result) >= 1) {
		$_SESSION['id'] = $id;
		header("Location: profile.php");
		die;
	} 
	else 
	{
		echo "You Have Entered Incorrect Login Information";
	}
}

?>

<html>
<link rel="stylesheet" href="styles.css">

<head>
	<title>Login Page</title>
</head>
<h1> Login Here </h1>

<body>
	<div class="container">
		<form method="POST" action="#">
			<div class="form_input">
				<input type="text" name="id" placeholder=" Enter Your ID " />
			</div>
			<div class="form_input">
				<input type="text" name="password" placeholder=" Enter Your Password " />
			</div>
			<input type="submit" name="submit" value="LOGIN" class="btn-login" />
			<p>No account? <a href="register.php">Sign Up</a></p>
		</form>
	</div>
</body>

</html>