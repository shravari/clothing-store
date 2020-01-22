<?php 

	require_once('config.php');
	print_r($_POST);
	echo "<br>";
	$name = $_POST['name'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	$images = '';
	$i = 0;
	// echo "<pre>";
	// print_r($_FILES);
	// echo "</pre>";

	//This while loop is to get multiple images into a single variable in a string format
	while ($i < count($_FILES['image']['name'])) {
		if ($i == (count($_FILES['image']['name'])-1)) {
			$images .= Date('ymdhis').$_FILES['image']['name'][$i];
			$destination='../../images/product-img/'.Date('ymdhis').$_FILES['image']['name'][$i];
			$source = $_FILES['image']['tmp_name'][$i];
			move_uploaded_file($source, $destination);
			$i++;
		}else{
			$images .= Date('ymdhis').$_FILES['image']['name'][$i].',';
			echo $destination='../../images/product-img/'.Date('ymdhis').$_FILES['image']['name'][$i];
			echo "<br>";
			$source = $_FILES['image']['tmp_name'][$i];
			move_uploaded_file($source, $destination);
			$i++;
		}
 	}
	 $insert = "INSERT INTO products(category_id ,	product_name, price, description, images, quantity) values('$category','$name', '$price', '$description', '$images', $quantity)";
	mysqli_query($connect, $insert);
	header('Location:../addProducts.php?add=1');

 ?>