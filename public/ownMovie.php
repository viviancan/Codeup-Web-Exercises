<?php

require_once "functions.php"; 

$allMovies = [
	[
		'title' => 'The Godfather',
		'release' => 1972,
		'rating' => '9.2',
		'genre' => ['crime', 'drama']
	],
	[
		'title' => 'The Godfather: Part II',
		'release' => 1974,
		'rating' => '9.0',
		'genre' => ['crime', 'drama']
	],
	[
		'title' => 'The Dark Knight',
		'release' => 2008,
		'rating' => '9.0',
		'genre' => ['action', 'crime', 'drama']

	],
	[
		'title' => 'The Good, The Bad, and The Ugly',
		'release' => '1966',
		'rating' => '8.9',
		'genre' => ['western']
	],
	[
		'title' => 'Forest Gump',
		'release' => 1994,
		'rating' => '8.7',
		'genre' => ['comedy', 'drama', 'romance']
	],
	[
		'title' => 'Seven Samurai',
		'release' => 1954,
		'rating' => '8.6',
		'genre' => ['adventure', 'drama']
	],
	[
		'title' => 'Back to the Future',
		'release' => 1985,
		'rating' => '8.5',
		'genre' => ['adventure', 'comedy', 'sci-fi']
	],
	[
		'title' => 'The Lion King',
		'release' => 1994,
		'rating' => '8.5',
		'genre' => ['animation', 'adventure', 'drama']
	],
	[
		'title' => 'Alien',
		'release' => 1979,
		'rating' => '8.5',
		'genre' => ['horror', 'sci-fi']
	],
	[
		'title' => '2001: A Space Odyssey',
		'release' => 1968,
		'rating' => '8.3',
		'genre' => ['adventure', 'sci-fi']
	],
];

function getMoviesByGenre($genre, $allMovies)
{
	$movies = [];

	foreach($allMovies as $movie){
		if(in_array($genre, $movie['genre'])){
			$movies[] = $movie;
		}
	}
	return $movies;
}

function getMoviesByTitle($title, $allMovies)
{
	$movies = [];

	foreach($allMovies as $movie){
		if(stripos($movie['title'], $title) !== false){
			$movies[] = $movie;
		}
	}
	return $movies;
}


function pageController($allMovies)
{

	$data = [];

	$genre = inputGet('genre');
	$title = inputGet('title');
	$release = inputGet('release');

	if(!empty($genre) && empty($title)) {
		$data['movies'] = getMoviesByGenre($genre, $allMovies);

	} elseif (!empty($title) && empty($genre)) {
		$data['movies'] = getMoviesByTitle($title, $allMovies);
		
	} elseif (!empty($title) && !empty($genre)) {		
		$moviesWithGenre = getMoviesByGenre($genre, $allMovies);
		$moviesWithGenreAndTitle = getMoviesByTitle($title, $moviesWithGenre);
		$data['movies'] = $moviesWithGenreAndTitle;
		
	} else {
		$data['movies'] = $allMovies;
	}

	if(!empty($release)){
		$movies = [];

		foreach($allMovies as $movie){
			if($movie['release'] > $release){
				$movies[] = $movie;
			}
		}
		$data['movies'] = $movies;
	}
	// if(isset($_GET['genre'])){

	// 	$genre = $_GET['genre'];

	// 	$movies = []; 

	// 	foreach ($allMovies as $movie) {
	// 		if(in_array($genre, $movie['genre'])){
	// 			$movies[] = $movie;
	// 		}
	// 	}

	// 	$data['movies'] = $movies;

	// } elseif(isset($_GET['release'])){
	// 	$release = $_GET['release'];
	// 	$movies = [];

	// 	foreach ($allMovies as $movie) {
	// 		if($movie['release'] > 2000){
	// 			$movies[] = $movie;
	// 		}
	// 	}

	// 	$data['movies'] = $movies;
		
	// } elseif(isset($_GET['title'])){
	// 	$title = $_GET['title'];
	// 	$movies = [];

	// 	foreach ($allMovies as $movie) {
	// 		if($movie['title'] == $title){
	// 			$movies[] = $movie;
	// 		}	
	// 	}

	// 	$data['movies'] = $movies;

	// } else{
	// 	$data['movies'] = $allMovies;
	// }

	return $data; 
}


extract(pageController($allMovies));


?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Movie Listener with GET</title>

	 	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">

		<style type="text/css">
			.movies{
				padding-left: 30px;
			}

			#forms{
				text-align: center;
				padding: 40px;
			}

			#links{
				text-align: center;
			}
			h1{
				font-family: 'Roboto Condensed', sans-serif;
				font-size: 50px;
				letter-spacing: 3px;

			}



		</style>
	</head>
	<body>
		<div class="container">

			<h1>Welcome to Movie Lister</h1>

			<div class="row" id="forms">
				<form method="get" action="#" class="col-xs-6">

					Movie Title: <input type="text" name="title" id="title">

<!-- 					<button type="submit">Search</button>

				</form>

				<form method="get" action="#" class="col-xs-6"> -->

					Genre: <input type="text" name="genre" id="genre">

					<button type="submit">Search</button>

				</form>
			</div>
				

			<div class="row" id="links">

				<a href="ownMovie.php">All Movies |</a>
			
				<a href="ownMovie.php?release=2000">Released since 2000 |</a>
			
				<a href="ownMovie.php?genre=comedy">Comedy Movies |</a>
			
				<a href="ownMovie.php?genre=sci-fi">Sci-Fi Movies</a>
				
			</div>

			<hr>


			<section class="row movies">
				
				<div> 
					<?php foreach($movies as $movie): ?>
						<div>
							<h4><?= $movie['title'];  ?></h4>
							<p>Released: <?= $movie['release'] ?></p>
							<p>Rating: <?= $movie['rating'] ?></p>
							<p>Genre: <?= implode(", ", $movie['genre']) ?></p>	
							<hr>
						</div>					 
					<?php endforeach; ?>	  			
				</div>
			
			</section>
		</div>


		<!-- jQuery Version 1.11.1 -->
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	</body>
</html>

































