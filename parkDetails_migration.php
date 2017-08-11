<?php 

require_once 'parks_login.php';
require_once 'db_connect.php';

$dbc->exec("DROP TABLE IF EXISTS np_details");

$query = "CREATE TABLE IF NOT EXISTS np_details (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	name VARCHAR(250) NOT NULL,
	location VARCHAR(250) NOT NULL,
	date_established DATE NOT NULL,
	area FLOAT(14, 2) NOT NULL,
	home_url VARCHAR(250) NOT NULL,
	PRIMARY KEY (id)
);";


$dbc->exec($query);
echo "parkDetails table created" . PHP_EOL; 