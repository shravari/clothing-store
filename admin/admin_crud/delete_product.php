<?php 

	require_once('config.php');
	$id = $_POST['id'];
	// $file = 'images/'.$_POST['file']; 
	$delete = "DELETE FROM product where id='$id'";
	// unlink($file);
	mysqli_query($connect, $delete);
	echo "success";

 ?>