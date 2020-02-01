<?php 
	session_start();
	$_SESSION['cart'] = array();
	require_once('admin/admin_crud/config.php');
 	$id = $_GET['id'];
 	$_SESSION['cart'][] = $id;
 	print_r($_SESSION); 
 	$select = "SELECT * FROM products where id='$id'";
  	$query = mysqli_query($connect, $select);
 ?>