<?php  


function randomElement($input)
{

	$random = array_rand($input);
	
	return $input[$random];
}

function randomServerName($adjective, $noun)
{
	return randomElement($adjective) . " " . randomElement($noun);
}

function pageController()
{

	$adjectiveArray = ['New', 'Good', 'Important', 'Bad', 'Best', 'Purple', 'Human', 'Hard', 'Greatest', 'Other', 'Glittery', 'Loud', 'Dead', 'Spooky', 'Funny', 'Ugly'];

	$nounArray = ['Book', 'Eye', 'Mother', 'Money', 'Night', 'World', 'Study', 'Time', 'School', 'System' , 'Dog', 'Grave', 'President' , 'Chair'];

	$data = [
		'serverName' => randomServerName($adjectiveArray, $nounArray)
	];

	return $data;

}

extract(pageController());


?>

<!DOCTYPE html>
	<html>

	<head>
		<title>Server Name Generator</title>

		<!-- Bootstrap Core CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<style type="text/css">
			
			body{
				background-color: turquoise;
				text-align: center;
				font-family: 'Roboto Condensed', sans-serif;
				letter-spacing: 5px;

			}
			h1{
				padding-bottom: 50px;
			}
			h3 {
				border: white solid;
				padding: 20px;
				font-size: 40px;
			}

		</style>
	</head>

	<body>

		<main class="container">

			<h1>your server name is...</h1>	
		
			

			<div>
				<h3><?= $serverName ?></h3>
			</div>

		</main>

	

	<!-- jQuery Version 1.11.1 -->
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


	</body>

</html>









