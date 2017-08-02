<?php

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
var_dump($_GET);

function pageController($allMovies)
{

	$data = [];

	if(isset($_GET['genre'])){

		$genre = $_GET['genre'];

		$movies = []; 

		foreach ($allMovies as $movie) {
			if(in_array($genre, $movie['genre'])){
				$movies[] = $movie;
			}
		}

		$data['movies'] = $movies;

	} elseif(isset($_GET['release'])){
		$release = $_GET['release'];
		$movies = [];

		foreach ($allMovies as $movie) {
			if($movie['release'] > 2000){
				$movies[] = $movie;
			}
		}

		$data['movies'] = $movies;
		
	} elseif(isset($_GET['title'])){
		$title = $_GET['title'];
		$movies = [];

		foreach ($allMovies as $movie) {
			if($movie['title'] == $title){
				$movies[] = $movie;
			}	
		}

		$data['movies'] = $movies;

	} else{
		$data['movies'] = $allMovies;
	}

	return $data; 
}


extract(pageController($allMovies));


?>

<!DOCTYPE html>
	<html>
	<head>
		<title>PHP GET PRACTICE</title>
	</head>
	<body>
		<section class="form" >
			<form method="get" action="#">

				Movie Title: <input type="text" name="title" id="title">

				<button type="submit">Search</button>

			</form>

				<form method="get" action="#">

				Genre: <input type="text" name="genre" id="genre">

				<button type="submit">Search</button>

			</form>
			
		</section>

		<section class="links">

		<a href="ownMovie.php">All movies</a>
		<br>
		<a href="ownMovie.php?release">Released since 2000</a>
		<br>
		<a href="ownMovie.php?genre=comedy">Comedy movies</a>
		<br>
		<a href="ownMovie.php?genre=sci-fi">Sci-Fi movies</a>
			
		</section>


		<section class="movies">
			
			<div> 
				<?php foreach($movies as $movie): ?>
					<div>
						<h3>Title: <?= $movie['title'];  ?></h3>
						<p>Released: <?= $movie['release'] ?></p>
						<p>Rating: <?= $movie['rating'] ?></p>
						<p>Genre: <?= implode(", ", $movie['genre']) ?></p>	
					</div>					 
				<?php endforeach; ?>	  			
			</div>
		
		</section>

	</body>
</html>

































