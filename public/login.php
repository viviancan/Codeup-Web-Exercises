<?php 

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


	// if($username == 'guest' && $password == 'password'){
	// 	header("Location:http://codeup.dev/authorized.php");
	// 	die();
	// }else{
	// 	if(!empty($_POST)){
	// 		$data['message'] = "login failed";
	// 	}
	// }



	if(!empty($_POST)) {

		if($username == "guest" && $password == 'password'){
			header("Location:http://codeup.dev/authorized.php");
			die();
		} else {
			$data['message'] = "Login Failed";
		}

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