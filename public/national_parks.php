<?php 

	require_once __DIR__ . '/../parks_login.php';
	require_once __DIR__ . '/../db_connect.php';
	require_once __DIR__ . '/../Input.php';

	print_r($_POST);


	function getTotalCount($dbc){

	}




	function addParkToDatabase($dbc){
		$insert = "INSERT INTO np_details (name, location, date_established, area, type)
			VALUES(:park_name, :park_location, :date_established, :area, :type)";
		$stmt = $dbc->prepare($insert);
		$stmt->bindValue(':park_name', Input::get('park_name'), PDO::PARAM_STR);
		$stmt->bindValue(':park_location', Input::get('park_location'), PDO::PARAM_STR);
		$stmt->bindValue(':date_established', Input::get('date_established'), PDO::PARAM_STR);
		$stmt->bindValue(':area', Input::get('area'), PDO::PARAM_STR);	
		$stmt->bindValue(':type', Input::get('type'), PDO::PARAM_STR);	

		$stmt->execute();	

	}


	function pageController($dbc) {

		$data = [];


		$limit = 4;
		$page = Input::get('page',1);
		$offset = ($page - 1) * $limit; 

		$query = "SELECT * FROM np_details LIMIT :limit OFFSET :offset";

		$stmt = $dbc->prepare($query);
		$stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
		$stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);

		$queryTotal = "SELECT * FROM np_details";

		$stmt->execute();

		$data = [

			'results' => $stmt->fetchALL(PDO::FETCH_NUM),
			'page' => $page

		];

		if(!empty($_POST)){
			addParkToDatabase($dbc);
			header("Location: http://codeup.dev/national_parks.php");
		} 

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
			<div class="carousel slide" id="parkSlider" data-ride="">
				<div class="carousel-inner">
					<div class="item active">
						<img src="/img/man_sunset.jpeg" alt="Los Angeles">
						<div class="carousel-caption">
							<h1>NATIONAL PARKS DATABASE</h1>
						</div>
					</div>

					<div class="item">
						<img src="/img/man_sunset.jpeg" alt="Chicago">
						<div class="carousel-caption">
							<h1>NATIONAL PARKS DATABASE</h1>
						</div>
					</div>

					<div class="item">
						<img src="/img/man_sunset.jpeg" alt="New York">
						<div class="carousel-caption">
							<h1>NATIONAL PARKS DATABASE</h1>
						</div>
					</div>
				</div>

				<a class="left carousel-control" href="#parkSlider" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				</a>

				<a class="right carousel-control" href="#parkSlider" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				</a>			
			</div>

		<?php endif ?>

		<header>
			<div id='heading'>
				<a href="#" data-toggle="modal" data-target="#parkModal"><button type="button" class="btn btn-primary btn-lg">Add a National or State Park</button></a>
			</div>	

			<div class="modal" id="parkModal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button class="close" type="button" data-dismiss="modal">x</button>
							<h2>Add a National or State Park</h2>
						</div>
						<div class="modal-body">
							<form method="POST">
								<label for="park_name">Park Name: </label>
								<input type="text" name="park_name" input="park_name" placeholder="Park Name" autofocus>
								<br>
								<label for="park_location">Park Location: </label>
								<input type="text" name="park_location" input="park_location" placeholder="Park State">
								<br>
								<label for="date_established">Date Established: </label>
								<input type="text" name="date_established" input="date_established" placeholder="YYYY-MM-DD">
								<br>
								<label for="area">Park Area: </label>
								<input type="text" name="area" input="area" placeholder="Park Area">
								<br>
								<label for="type">Park Type: </label>
								<input type="radio" name="type" value="National">National
								<input type="radio" name="type" value="State">State

								<button type="submit">Submit</button>
								
							</form>	
						</div>
					</div>	
				</div>	
			</div>	

		</header>

		<hr>

		<div id="park_details">
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

			<?php if($page < 17):?>
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


















