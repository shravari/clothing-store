<?php 

	require_once('config.php');
	$id =$_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$category_id = $_POST['category'];
	if ($_FILES['image']['name'] != '') {
		$rename_file = Date('Ymdhis').$_FILES['image']['name'];
		$destination='images/'.$rename_file;
		$source = $_FILES['image']['tmp_name'];
		move_uploaded_file($source, $destination);
		echo $update = "UPDATE products SET product_name='$name' ,price='$price', description='$description', category_id='$category_id', image='$rename_file' where id='$id' ";
		echo mysqli_query($connect, $update);
		
		header('Location:../viewProducts.php?edit=1');
	}else{
		echo $update = "UPDATE products SET product_name='$name' ,price='$price', description='$description', category_id='$category_id'where id='$id' ";
		echo mysqli_query($connect, $update); 
		
		header('Location:../viewProducts.php?edit=1');
	}
	

 ?>