<?php 

	session_start();

	require "functions.php";
	require "../Auth.php";

function pageController(){





	
}
	if(!isset($_SESSION['logged_in_user'])){
		header("Location:http://codeup.dev/login.php");
		die();
	}

	$username = isset($_SESSION['logged_in_user']) ? $_SESSION['logged_in_user'] : "";

 ?>


<!DOCTYPE html>
	<html>
	<head>
		<title>Authorized</title>

	 	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	</head>
	<body>
		<div class='container'>
			<h1>Authorized</h1>

			<h3>Welcome, <?= escape($username) ?>!</h3>

			<a href="http://codeup.dev/logout.php"> LOGOUT</a>
		</div>

		<!-- jQuery Version 1.11.1 -->
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</body>
</html>