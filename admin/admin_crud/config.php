<?php 

	//Making a configuration file that will be used while executing any sql query
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "clothing_store";

	//making the connection with the database
	$connect = mysqli_connect($host, $username, $password, $db);

 ?>