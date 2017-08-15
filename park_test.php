<?php 

require_once __DIR__ .'/Park.php';

// $parkCount = Park::count();

// echo "There are " . $parkCount . "parks in the datbase";

// $paginate = Park::paginate(3, 10);

// print_r($paginate);



 // Inserting a new record into the database
     $park = new Park();
     $park->name = 'aaaaaaa';
     $park->location = 'texas';
     $park->areaInAcres = 48995.91;
     $park->dateEstablished = '1919-02-26';
     $park->insert()

 ?>