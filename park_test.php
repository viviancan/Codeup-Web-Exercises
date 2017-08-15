<?php 

require_once __DIR__ .'/Park.php';

// $parkCount = Park::count();

// echo "There are " . $parkCount . "parks in the datbase";

// $paginate = Park::paginate(3, 10);

// print_r($paginate);



 // Inserting a new record into the database
     // $park = new Park();
     // $park->name = 'aaaaaaa131314';
     // $park->location = 'texas';
     // $park->area = 48995.91;
     // $park->date_established = '1919-02-26';
     // $park->insert()


//////////////////////////////////////////////////////////////////////////////////////////

// test dbConnect() and Park::$connection

	// Park::dbConnect();
	// var_dump(Park::$dbc);


// test Park::count()
	
	// echo "There are " . Park::count() . " parks in the parks table.";



// test Park::all()

	var_dump(Park::all());

	// $allParks = Park::all();

	// echo "Park 1 details..." . PHP_EOL;

	// echo $allParks[0]->name . PHP_EOL;
	// echo $allParks[0]->location . PHP_EOL;
	// echo $allParks[0]->dateEstablished . PHP_EOL;
	// echo $allParks[0]->areaInAcres . PHP_EOL;
	// echo $allParks[0]->description . PHP_EOL;

// test Park::paginate()

	// print_r(Park::paginate(1));
	// print_r(Park::paginate(2));
	// print_r(Park::paginate(2, 2));
	// print_r(Park::paginate(1, 8));


// // test inserting a new park

// $park = new Park();

// $park->name = "Frio River Park";
// $park->location = "Texas";
// $park->areaInAcres = 700;
// $park->dateEstablished = '1913-02-02';
// $park->description = 'Yadda yadda';
// $park->insert();



 ?>