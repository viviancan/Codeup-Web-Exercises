<?php 

require_once __DIR__ . '/../parks_login.php';
require_once __DIR__ . '/../db_connect.php';
require_once __DIR__ . '/../Input.php';

var_dump($dbc);





$query ='
		SELECT * 
		FROM national_parks
		LIMIT 4';

$stmt = $dbc->query($query);
var_dump($stmt);

print_r($stmt->fetchALL(PDO::FETCH_NUM));




// function pageController($dbc) {
// 	$data = [];

// 	if(!empty($_REQUEST)) {

// 		// $parkName = 'SELECT name FROM national_parks';

// 		$query ='
// 			SELECT * 
// 			FROM national_parks
// 			LIMIT 5';

// 		$stmt = $dbc->query($query);
// 		var_dump($stmt);

// 		$data['results'] = $stmt->fetchALL(PDO::FETCH_NUM);
// 		// $request = Input::get('view');

// 		// $query = ($request == 'next') ? 


// 	}
// }

// extract(pageController($dbc));



 ?>