<?php
require("db.php");
session_start();

if(isset($_SESSION['id'])) 
{
	$id = $_SESSION['id'];
	$query = "select * from users where studentID = '" . $id . "'";
	$result = mysqli_query($connection, $query);
	$user_data = mysqli_fetch_assoc($result);
}
/*
foreach ($user_data as $column => $data) {
	if ($column == "studentID") 
		echo "Column is " . $column . "<br>Data is " . $data . "<br>";
}
*/
?>

<html>

<head>
	<title>Website</title>
</head>

<body>


	<a href="logout.php">Logout</a>
	<h1>This is your profile page</h1>

	<br>
	Hello, <?php echo $user_data['studentName']; ?>
	<table>
		<tr>
			<td>Your ID is </td>
			<td><?php echo $user_data['studentID']; ?></td>
		</tr>
		<tr>
			<td>Your current classes: </td>
			<td><?php echo $user_data['classes']; ?></td>
		</tr>
		<tr>
			<td><a href="classAdd.php">Class Registration</a></td>
		</tr>
	</table>
</body>
</html>