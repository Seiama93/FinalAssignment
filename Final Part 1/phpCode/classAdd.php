<?php
require("db.php");
session_start();
$id = $_SESSION['id'];
$query = "SELECT * FROM users WHERE studentID = '" . $id . "'";
$result = mysqli_query($connection, $query);
$classes = mysqli_fetch_assoc($result)['classes'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "POST detected. ";
    $postedClass = $_POST["class"];
    if (!$classes) 
    {
        echo "There were no classes.";
        $newClasses = $classes . $postedClass;
    }
    else #there are classes
    {   
        echo "There were classes.";
        $newClasses = $classes . ',' . $postedClass;
    }
    $query = "UPDATE users SET classes='" . $newClasses . "' WHERE studentID='" . $id . "'";
    $result = mysqli_query($connection, $query);
    header("Location: profile.php");
	echo "You have successfully registered for " . $postedClass . ".";
    die;
    #if there are no classes
    #   classes += class
    #   
    #else (there are classes)
    #   classes += ',' + class
}
else {
    if (!$classes) echo "You are signed up for no classes.";
    else echo "Current class schedule: " . $classes;
}?>

<html>
<head>
    <title>Class Registration</title>
</head>
<body>
<br>
    <form action="classAdd.php" method="post">
		<table border="1" width="300" height="150">
            <tr>
                <td>Class:</td>
                <td>
                    <input type="varchar" name="class">
                </td>
            </tr>
            <tr>
                <td colspan="5" align="center"> 
                    <input type="submit" name="signup" value="signup">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>