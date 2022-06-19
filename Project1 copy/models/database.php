<?php

//database server type, location, and database name in the string below
$data_source_name = 'mysql:host=localhost;dbname=Stocks';

$username = 'root';
$password = '';
$database = new PDO($data_source_name, $username, $password);
?>

