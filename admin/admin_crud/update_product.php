<?php 

	require_once('config.php');
	$id =$_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$category_id = $_POST['category'];
	$rename_file = Date('Ymdhis').$_FILES['image']['name'];
	$destination='images/'.$rename_file;
	$source = $_FILES['image']['tmp_name'];
	move_uploaded_file($source, $destination);
	$update = "UPDATE product SET name='$name' ,price='$price', description='$description', category_id='$category_id', image='$rename_file' where id='$id' ";
	mysqli_query($connect, $update);
	header('Location:viewProduct.php');

 ?>