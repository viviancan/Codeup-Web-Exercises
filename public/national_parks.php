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

		$queryTotal = "SELECT * FROM np_details;";

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

		<link rel="stylesheet" type="text/css" href="/css/national_parks.css">

	</head>
	<body>	

	<div class='container'>

		<?php if($page == 1) :?>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner">
					<div class="item active">
						<img src="/img/man_sunset.jpeg" alt="Los Angeles">
					</div>

					<div class="item">
						<img src="/img/man_sunset.jpeg" alt="Chicago">
					</div>

					<div class="item">
						<img src="/img/man_sunset.jpeg" alt="New York">
					</div>
				</div>
			</div>
		<?php endif ?>
		<header>
			<div id='heading'>
				<a href="http://codeup.dev/national_parks.php"><h1 id='heading'>NATIONAL PARKS</h1></a>
				<input type="text" name="search">	
			</div>	
		</header>

		<hr>

		<div id="map_details">
			<?php foreach ($results as $result): ?>

				<a href="https://www.nps.gov/<?= $result[5]?>" target="_blank"><h3> <?= $result[1] ?></h3></a>
				<h4>"<?= $result[6] ?>"</h4>
				<p><?= $result[7] ?></p>
				<p> Location: <?= $result[2] ?></p>
				<?php $date = strtotime($result[3])?>
				<p> Date Established: <?= date("F j, Y", $date) ?></p>
				<p> Area: <?= $result[4] ?> acres</p>
				<hr>
			<?php endforeach ?>
		</div>



		<div class='container'>
			
			<?php if($page > 1) :?>
				<a href='?page=<?=$page-1?>'><button>Previous</button></a>
			<?php endif ?>

			<?php if($page < 15):?>
				<a href='?page=<?=$page+1?>'><button>Next</button></a>
			<?php endif ?>

				<a href="http://codeup.dev/national_parks.php"><button>Home</button></a>
		
		</div>



		<!-- jQuery Version 2.2.4 -->
		<script src="http://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- Bootstrap JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
		crossorigin="anonymous"></script>
	</div>
	
	</body>
</html>


















