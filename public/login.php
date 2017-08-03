<?php 

session_start();

require "functions.php";

function pageController()
{

	$data = [];

	// $username = (isset($_POST['username'])) ? $_POST['username'] : "undefined"; 

	// $password = (isset($_POST['password'])) ? $_POST['password'] : "undefined"; 

	$username = inputHas('username') ? inputGet('username') : "undefined";

	$password = inputHas('password') ? inputGet('password') : "undefined";


	$data = [
		'username' => $username,
		'password' => $password,
		'message' => ""
	];


	if(!empty($_POST)) {

		if($username == "guest" && $password == 'password'){
			$_SESSION['logged_in_user'] = $username; 
			header("Location:http://codeup.dev/authorized.php");
			die();
		} else {
			$data['message'] = "Login Failed";
		}

	}

	if(isset($_SESSION['logged_in_user'])){
		header("Location:http://codeup.dev/authorized.php");
		die();
	}

	return $data;
}

extract(pageController());

?>


<!DOCTYPE html>
	<html>
	<head>
		<title>POST Practice (PHP)</title>

	 	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
	<div class='container'>
		
		<h1>Please enter your login information:</h1>


		<form method="post">

			<label for="username">Username: </label>
			<input type="text" name="username" id="username" placeholder="username" autofocus>

			<label for="password">Password: </label>
			<input type="password" name="password" id="password" placeholder="password">

			<button>Submit</button>
			

		</form>

		<h2> <?= escape($message) ?></p></h2>



	</div>


		<!-- jQuery Version 1.11.1 -->
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 
	</body>
</html>