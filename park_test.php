<?php 

require_once __DIR__ .'/Park.php';

// $parkCount = Park::count();

// echo "There are " . $parkCount . "parks in the datbase";

// $paginate = Park::paginate(3, 10);

// print_r($paginate);



 // Inserting a new record into the database
     $park = new Park();
     $park->name = 'aaaaaaa131314';
     $park->location = 'texas';
     $park->area = 48995.91;
     $park->date_established = '1919-02-26';
     $park->insert()

 ?>