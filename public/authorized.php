<?php 

session_start();
	$username = $_SESSION['logged_in_user'];


	if(!isset($_SESSION['logged_in_user'])){
		header("Location:http://codeup.dev/login.php");
		die();
	}


 ?>


<!DOCTYPE html>
	<html>
	<head>
		<title>Authorized</title>
	</head>
	<body>
		<h1>Authorized</h1>

		<h3>Welcome <?= $username ?> </h3>

		<a href="http://codeup.dev/logout.php"> LOGOUT</a>

	</body>
</html>