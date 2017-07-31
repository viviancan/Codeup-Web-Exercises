<?php  

$adjectiveArray = array('New', 'Good', 'Important', 'Bad', 'Best', 'Purple', 'Human', 'Hard', 'Greatest', 'Other');

$nounArray = array('Book', 'Eye', 'Mother', 'Money', 'Night', 'World', 'Study', 'Time', 'School', 'System');


function randomElement($adjective, $noun)
{

	$randomAdj = array_rand($adjective);
	
	$randomNoun = array_rand($noun);
	
	return $adjective[$randomAdj] . " " . $noun[$randomNoun];
}


?>


<!DOCTYPE html>
	<html>
	<head>
		<title>Server Name Generator</title>
		<style type="text/css">
			
			body{
				text-align: center;
			}

		</style>
	</head>
	<body>
		<div>
			<h1>Random Server Name Generator</h1>	
		</div>

		<div>
			<h2>Your server name is....</h2>	
		</div>
		<div>
			<h3><?php echo randomElement($adjectiveArray, $nounArray);?></h3>
		</div>
	</body>
</html>






