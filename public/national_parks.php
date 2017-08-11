<?php 

	require_once __DIR__ . '/../parks_login.php';
	require_once __DIR__ . '/../db_connect.php';
	require_once __DIR__ . '/../Input.php';


	function pageController($dbc) {

		$data = [];


		$limit = 4;
		$page = Input::get('page',1);
		$offset = ($page - 1) * $limit; 

		$query = "SELECT * FROM np_details LIMIT $limit OFFSET $offset ;";

		$stmt = $dbc->query($query);

		$data = [

			'results' => $stmt->fetchALL(PDO::FETCH_NUM),
			'page' => $page

		];

		return $data;
	}

	extract(pageController($dbc));

 ?>

<!DOCTYPE html>
	<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>National Parks Database</title>

		<!-- Bootstrap CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
		rel="stylesheet" 
		integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
		crossorigin="anonymous">

	</head>
	<body>	

	<div class='container'>

		<a href="http://codeup.dev/national_parks.php"><h1 id='heading'>NATIONAL PARKS</h1></a>

		<?php foreach ($results as $result): ?>

			<a href="https://www.nps.gov/<?= $result[5]?>" target="_blank"><h3> <?= $result[1] ?></h3></a>
			<p> Location: <?= $result[2] ?></p>
			<p> Date Established: <?= $result[3] ?></p>
			<p> Area: <?= $result[4] ?></p>
			<hr>
		<?php endforeach ?>

		
		<?php if($page > 1) :?>
			<a href='?page=<?=$page-1?>'><button>Previous</button></a>
		<?php endif ?>

		<?php if($page < 15):?>
			<a href='?page=<?=$page+1?>'><button>Next</button></a>
		<?php endif ?>


		<footer>
				<a href="?page=1">1</a>
				<a href="?page=2">2</a>
				<a href="?page=3">3</a>
				<a href="?page=4">4</a>
				<a href="?page=5">5</a>
				<a href="?page=6">6</a>
				<a href="?page=7">7</a>
				<a href="?page=8">8</a>
				<a href="?page=9">9</a>
				<a href="?page=10">10</a>
				<a href="?page=11">11</a>
				<a href="?page=12">12</a>
				<a href="?page=13">13</a>
				<a href="?page=14">14</a>
				<a href="?page=15">15</a>

				<!-- <?php foreach ($results as $result):?>
					<a href='?page=<?=$page+1?>'><?=$page ?></a>
				<?php endforeach ?> -->
				<br>
				<a href="http://codeup.dev/national_parks.php"><button>Home</button></a>
		
		</footer>



		<!-- jQuery Version 2.2.4 -->
		<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- Bootstrap JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
		crossorigin="anonymous"></script>
	</div>
	
	</body>
</html>


















