<?php 
	require_once('config.php');
	$name = strtoupper($_POST['name']);

	$select = "SELECT * FROM category where category_name='$name'";
	$query = mysqli_query($connect,$select);
		if (mysqli_num_rows($query) > 0) {
			echo "exists";
		}else{
			$insert = "INSERT INTO category(category_name) values('$name')";
			mysqli_query($connect,$insert);
			echo "does not" ;
		}

 ?>