<?php 

function pageController()
{
	
	$count = (isset($_GET["count"])) ? $_GET["count"] : 0;

	$data["count"] = $count;

	return $data; 



}

extract(pageController());



 ?>


 <!DOCTYPE html>
	 <html>
	 <head>
	 	<title>PING AND PONG</title>


	 	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<style type="text/css">
			.container{
				margin-top: 75px;
			}
			body{
				font-family: 'Roboto Condensed', sans-serif;
				text-align: center;
				font-size: 100px;
				letter-spacing: 10px;
			}

			#counter{
				border: black solid;
				padding: 50px;
			}

			.controls{
				font-size: 75px;
				margin-top: 50px;
			}

			a{
				color: #333;
			}

			a:hover{
				color: grey;
			}

		</style>



	 </head>
	 <body>


	 	<div class='container'>

	 		<div class='row' id='counter'>
	 			PING <?php echo $count ?>
	 		</div>

			<div class='row'> 
				<div id='hit'>
					<a href="http://codeup.dev/pong.php?hit=true&count=<?php echo ++$count?>">HIT</a>
				</div>

				<div>
					<a href="?miss=true&count= <?php echo $count = 0 ?>">MISS
					</a>
				</div>
			</div>

	 	</div>




		<!-- jQuery Version 1.11.1 -->
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 
	 </body>
 </html>