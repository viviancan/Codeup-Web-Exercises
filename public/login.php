<?php 

session_start();

function pageController()
{

	$data = [];

	$username = (isset($_POST['username'])) ? $_POST['username'] : "undefined"; 

	$password = (isset($_POST['password'])) ? $_POST['password'] : "undefined"; 

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
	</head>
	<body>

		<h1>Please enter your login information:</h1>


		<form method="post">

			<label for="username">Username: </label>
			<input type="text" name="username" id="username">

			<label for="password">Password: </label>
			<input type="text" name="password" id="password">

			<button>Submit</button>
			

		</form>

		<h2> <?= $message ?></p></h2>
	 
	</body>
</html>