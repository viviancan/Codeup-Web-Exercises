<?php 



var_dump($_POST);


function pageController()
{

	$data = [];

	$loginInfo = (isset($_POST))



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
	 
	</body>
</html>