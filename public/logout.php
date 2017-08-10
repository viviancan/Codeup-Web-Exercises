<?php 
session_start();

require_once "../Auth.php";

Auth::logout();

header("Location:http://codeup.dev/login.php");
die();

?>