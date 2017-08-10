<?php 


$dbc = new PDO("mysql:host=". HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

 ?>