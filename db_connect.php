<?php 

require_once "env.php";


$dbc = new PDO("mysql:host=127.0.0.1;dbname=" . DBNAME, USERNAME, PASSWORD);

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

 ?>