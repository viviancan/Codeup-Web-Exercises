<?php 

	require_once __DIR__ . '/../parks_login.php';
	require_once __DIR__ . '/../db_connect.php';
	require_once __DIR__ . '/../Input.php';


	function pageController($dbc) {

		$data = [];


		$limit = 4;
		$page = Input::get('page',1);
		$offset = ($page - 1) * $limit; 

		$query ="
				SELECT * 
				FROM national_parks
				LIMIT $limit OFFSET $offset ;";

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
	 	<title></title>
	 </head>
	 <body>
	 	<h1>National Parks</h1>

	 	<?php foreach ($results as $result): ?>

	 		<h2> <?= $result[1] ?></h2>
	 		<p> Location: <?= $result[2] ?></p>
	 		<p> Date Established: <?= $result[3] ?></p>
	 		<p> Area: <?= $result[4] ?></p>

	 	<?php endforeach ?>

	  	
	  	<?php if($page > 1) :?>
	  		<a href='?page=<?=$page-1?>'><button>Previous</button></a>
	  	<?php endif ?>

	  	<?php if($page < 15):?>
	 		<a href='?page=<?=$page+1?>'><button>Next</button></a>
	  	<?php endif ?>

	  	

	 
	 </body>
 </html>


















