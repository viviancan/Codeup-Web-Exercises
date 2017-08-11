<?php 

require_once __DIR__ . '/../parks_login.php';
require_once __DIR__ . '/../db_connect.php';
require_once __DIR__ . '/../Input.php';

// var_dump($dbc);

$limit = 4;
$page = Input::get('page',1);
$offset = ($page - 1) * $limit; 

$query ="
		SELECT * 
		FROM national_parks
		LIMIT $limit OFFSET $offset ;";

$stmt = $dbc->query($query);
var_dump($stmt);

print_r($stmt->fetchALL(PDO::FETCH_NUM));




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

	$data['results'] = $stmt->fetchALL(PDO::FETCH_NUM);

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

	 		<?=$result ?>

	 	<?php endforeach ?>

	 
	 </body>
 </html>


















