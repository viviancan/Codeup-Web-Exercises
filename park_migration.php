<?php 

require_once 'parks_login.php';
require_once 'db_connect.php';

$dbc->exec("DROP TABLE IF EXISTS national_parks");

$query = "CREATE TABLE IF NOT EXISTS national_parks (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	name VARCHAR(250) NOT NULL,
	location VARCHAR(250) NOT NULL,
	date_established DATE NOT NULL,
	area FLOAT(14, 2) NOT NULL,
	PRIMARY KEY (id)
);";


$dbc->exec($query);
echo "parks table created" . PHP_EOL; 