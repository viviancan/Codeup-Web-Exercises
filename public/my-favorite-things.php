<?php 


function pageController()
{
	$data = array();

	$favoriteThings = array("Puppies", "Reading", "Soccer", "Pizza", "The Flash");

	$data['favoriteThings'] = $favoriteThings;

	return $data;

}

extract(pageController());

 ?>


<!DOCTYPE html>
	<html>
	<head>
		<title>Favorite Things PHP</title>


	 	<!-- Bootstrap Core CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<style type="text/css">
			body{
				text-align: center;
			}

		</style>
	</head>

	<body>

		<h1>My Favorite Things</h1>
		<table class="table table-striped">
			<?php foreach ($favoriteThings as $favoriteThing) : ?>

				<tr>	
					<td>
						 <?= $favoriteThing; ?>
					</td>
				</tr>

			<?php endforeach; ?>
							
		</table>
	</body>
</html>












