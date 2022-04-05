<?php

require("db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$id = $_POST['id'];
	$password = $_POST['password'];
	$name = $_POST['name'];

	if (!empty($id) && !empty($password) && !empty($name)) 
	{
		$query = "insert into users (studentID, studentName, pass) 
			values ('" . $id . "', '" . $name . "', '" . $password . "')";
		mysqli_query($connection, $query);
		header("Location: login.php");
		echo "You have successfully registered.";
		die;
	} 
	else 
	{
		echo "Oops! Please enter valid information.";
	}
}
?>
<html>

<head>
	<title>Sign Up</title>
	<center>

<body>
	<h2>Register Here</h2>
	<form action="register.php" method="post">
		<table border="1" width="300" height="150">
			<tr>
				<td>Student ID:</td>
				<td><input type="varchar" name="id"></td>
			</tr>
			<tr>
				<td>Name:</td>
				<td><input type="varchar" name="name"></td>
			<tr>
				<td>Password:</td>
				<td><input type="varchar" name="password"></td>
			</tr>
			
			<tr>
				<td colspan="5" align="center"> <input type="submit" name"signup" value="signup"></td>
			</tr>
			<a href="login.php">Login</a>

</html>