<?php 
	session_start();
	if (!array_key_exists('cart',$_SESSION)) {
		$_SESSION['cart'] = array();
	}
	require_once('admin/admin_crud/config.php');
 	$id = $_GET['id'];
 	$_SESSION['cart'][] = $id;
 	echo json_encode($_SESSION['cart']);
 ?>
