<?php 

	require_once __DIR__ . '/../parks_login.php';
	require_once __DIR__ . '/../db_connect.php';
	require_once __DIR__ . '/../Input.php';
	require_once __DIR__ . '/../Park.php';


	var_dump($_POST);
	var_dump($_GET);


	function addParkToDatabase($dbc){

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

		$insert = "
			INSERT INTO np_details (name, location, date_established, area, description, type, tagline)
			VALUES(:name, :location, :date_established, :area, :description, :type, :tagline);";

		$stmt = $dbc->prepare($insert);

		$stmt->bindValue(':name', $name, PDO::PARAM_STR);
		$stmt->bindValue(':location', $location, PDO::PARAM_STR);
		$stmt->bindValue(':date_established', $date_established, PDO::PARAM_STR);
		$stmt->bindValue(':area', $area, PDO::PARAM_STR);	
		$stmt->bindValue(':description', $description, PDO::PARAM_STR);	
		$stmt->bindValue(':type', $type, PDO::PARAM_STR);	
		$stmt->bindValue(':tagline', $tagline, PDO::PARAM_STR);	

		$stmt->execute();	

	}

	// function getTotalCount($dbc){
	// 	$countQuery = "SELECT COUNT(*) FROM np_details";

	// 	$stmt = $dbc->query($countQuery);

	// 	$count = (int) $stmt->fetchColumn();

	// 	return $count;

	// }


	function getAllParks($dbc, $limit =2, $offset = 0){

		$query = "SELECT * FROM np_details ORDER BY name LIMIT :limit OFFSET :offset";

		$stmt = $dbc->prepare($query);

		$stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
		$stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);

		$stmt->execute();

		$rows = $stmt->fetchALL(PDO::FETCH_NUM); 
		return $rows;

	}

	function searchForPark($dbc){
		$search = Input::get('search', "");

		$query = "SELECT * FROM np_details WHERE name = :search";

		$stmt = $dbc->prepare($query);

		$stmt->bindValue(':search', $search, PDO::PARAM_STR);

		$stmt->execute();

		$searchParks = $stmt->fetchAll(PDO::FETCH_ASSOC); 

		return $searchParks;
	}

	function pageController($dbc) {

		$data = [];

		$page = Input::get('page', 1);
		$recordsPerPage = Input::get('recordsPerPage', Park::count());
		$results = getAllParks($dbc, $recordsPerPage, (($page - 1) * $recordsPerPage));
		// $results = Park::paginate($page);

		$search = searchForPark($dbc);

		$data = [

			'results' => $results,
			'page' => $page,
			'parksCount' => Park::count(),
			'recordsPerPage' => $recordsPerPage,
			'search'=> $search

		];

		if(!empty($_POST)){
			addParkToDatabase($dbc);
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


















