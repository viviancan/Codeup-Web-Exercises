<?php 
$favoriteThings = array("Puppies", "Reading", "Soccer", "Pizza", "The Flash");








 ?>







<!DOCTYPE html>
	<html>
	<head>
		<title>Favorite Things PHP</title>
		<style type="text/css">
			tr:nth-child(even) { 
				background-color: #D3D3D3;
			}


		</style>
	</head>
	<body>
		<h1>My Favorite Things</h1>
		<table>
			<?php foreach ($favoriteThings as $favoriteThing) { ?>

				<tr>	
					<td>
						 <?php echo $favoriteThing; ?>
					</td>
				</tr>

			<?php } ?>
							
		</table>
	</body>
</html>