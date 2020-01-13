<?php 

	require_once('config.php');
	$id = $_POST['id'];
	$delete = "DELETE FROM category where id='$id'";
	mysqli_query($connect, $delete);
	echo "Successfully deleted!";

 ?>