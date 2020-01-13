<?php 

	require_once('config.php');
	$id = $_POST['cat_id'];
	$name = strtoupper($_POST['cat_name']);
	$update = "UPDATE category SET category_name='$name' where id='$id'";
	mysqli_query($connect,$update);
	header('Location:../viewCategory.php?edit=1');

 ?>