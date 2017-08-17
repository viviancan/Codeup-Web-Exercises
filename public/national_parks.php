<?php 

	require_once __DIR__ . '/../parks_login.php';
	require_once __DIR__ . '/../db_connect.php';
	require_once __DIR__ . '/../Input.php';
	require_once __DIR__ . '/../Park.php';


	var_dump($_POST);
	var_dump($_GET);


	function addParkToDatabase(){

		$name = Input::get('name');
		$location = Input::get('location');
		$date_established = Input::get('date_established');
		$area = Input::get('area');
		$description = Input::get('description');
		$type = Input::get('type');
		$tagline = Input::get('tagline');

		if(!is_numeric($area)) {
			echo "Area must be numeric";
			return;
		}

		$park = new Park();
		$park->name = $name;
		$park->location = $location;
		$park->dateEstablished= $date_established;
		$park->areaInAcres = $area;
		$park->description = $description;
		$park->type = $type;
		$park->tagline = $tagline;
		$park->insert();	

	}

	function searchForPark($dbc){
		$search = Input::get('search', "");

		$query = "SELECT * FROM np_details WHERE name = :search";

		$stmt = $dbc->prepare($query);

		$stmt->bindValue(':search', $search, PDO::PARAM_STR);

		$stmt->execute();

		$searchParks = $stmt->fetchAll(PDO::FETCH_ASSOC);

		var_dump($searchParks); 



		return $searchParks;
	}

	function pageController($dbc) {

		$data = [];

		$page = Input::escape(Input::get('page', 1));

		$recordsPerPage = Input::escape(Input::get('recordsPerPage', Park::count()));

		$results = Park::paginate($page, $recordsPerPage);

		$search = searchForPark($dbc);


		$data = [

			'results' => $results,
			'page' => $page,
			'parksCount' => Park::count(),
			'recordsPerPage' => $recordsPerPage,
			'search'=> $search

		];

		if(!empty($_POST)){
			addParkToDatabase();
			header("Location: http://codeup.dev/national_parks.php");
			die();
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

				<form method="GET" action="national_parks.php">
					<label for="search">Search for Park: </label>
						<input type="text" name="search" input="search" placeholder="Enter park name">
						<button type="submit">Search</button>
				</form>

				<a href="national_parks.php"><button type="button" class="btn btn-primary btn-lg">View All Results</button></a>

				<a href="?page=<?=$page?>&recordsPerPage=4"><button type="button" class="btn btn-primary btn-lg">View 4 per page</button></a>

				<a href="?page=<?=$page?>&recordsPerPage=6"><button type="button" class="btn btn-primary btn-lg">View 6 per page</button></a>

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
							<form method="POST" action="national_parks.php">
								<label for="name">Park Name</label>
								<input class="form-control" type="text" name="name" input="name" placeholder="Park Name" autofocus required>
								
								<label for="location">Park Location</label>
								<input class="form-control" type="text" name="location" input="location" placeholder="Park State" required>
								
								<label for="date_established">Date Established</label>
								<input class="form-control" type="date" name="date_established" input="date_established" required>
								
								<label for="area">Park Area</label>
								<input class="form-control" type="text" name="area" input="area" placeholder="Park Area" required>

								<label for="tagline">Tagline</label>
								<input class="form-control" type="text" name="tagline" input="tagline" placeholder="tagline" required>
								
								<label for="description">Description</label>
								<textarea class="form-control" type="textarea" rows="3" name="description" placeholder="Please enter description here...." required></textarea>

								<label for="type">Park Type</label>
								<br>
								<input type="radio" name="type" value="National"> National
								<input type="radio" name="type" value="State"> State
								<br>
								<button class="pull-right" type="submit">Submit</button>
								
							</form>	
						</div>
					</div>	
				</div>	
			</div>	

		</header>

		<span>Total Records: <?= $parksCount ?></span>
		<hr>

		<div id="park_details">

			<?php if(empty($search)){ ?>
				<?php foreach ($results as $result): ?>

					<?php if (!empty($result->url)) {?>
						<a href="https://www.nps.gov/<?= $result->url?>" target="_blank">
							<h3> <?= Input::escape($result->name) ?></h3>
						</a>
					<?php } else { ?>
						<h3> <?= Input::escape($result->name) ?></h3>
					<?php }; ?>


					<h4>"<?= Input::escape($result->tagline) ?>"</h4>

					<p><?= Input::escape($result->description) ?></p>

					<p> Location: <?= Input::escape($result->location) ?></p>

					<?php $date = strtotime($result->dateEstablished)?>

					<p> Date Established: <?= Input::escape(date("F j, Y", $date)) ?></p>

					<p> Area: <?= Input::escape($result->areaInAcres) ?> acres</p>

					<hr>
				<?php endforeach ?>
			<?php } else { ?>

				<p><?= $search[0]['name'] ?></p>
				<p><?= $search[0]['tagline'] ?></p>
				<p><?= $search[0]['description'] ?></p>
				<p><?= $search[0]['location'] ?></p>
				<p><?= $search[0]['date_established'] ?></p>
				<p><?= $search[0]['area'] ?></p>


			<?php } ?>
		</div>




		<div class='container'>
			
			<?php if($page > 1) :?>
				<a href='?page=<?=$page-1?>&recordsPerPage=<?=$recordsPerPage?>'><button>Previous</button></a>
			<?php endif ?>

			<?php if($page < ($parksCount / $recordsPerPage)):?>
				<a href='?page=<?=$page+1?>&recordsPerPage=<?=$recordsPerPage?>'><button>Next</button></a>
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


















