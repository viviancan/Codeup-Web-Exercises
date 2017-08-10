<?php 

require_once 'parks_login.php';
require_once 'db_connect.php';

$dbc->exec("DROP TABLE IF EXISTS parksInfo");

$query = "CREATE TABLE IF NOT EXISTS parksInfo (
	id INT UNSIGNED NOT NULL AUTO_INCREMENT, 
	name VARCHAR(250),
	location VARCHAR(250),
	date_established DATE,
	area FLOAT(14, 2),
	PRIMARY KEY (id)
);";


$dbc->exec($query);