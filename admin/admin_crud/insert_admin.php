<?php 

	//Making a connection with database
	require_once('config.php');

	//Storing the data from global array post to individual variable
	$fname = strtoupper($_POST['f_name']);
	$lname = strtoupper($_POST['l_name']);
	$email = $_POST['email'];
	$password = $_POST['password'];

	//cheking if the user with this email already exists or not
	$select = "SELECT email FROM exp_mng_users where email='$email'";
	$query = mysqli_query($connect,$select);

	if (mysqli_num_rows($query) > 0) {
		//redirect to login page as the user already exists
		header('Location:../register.html?error=1');
	}else {
			$insert = "INSERT INTO exp_mng_users(first_name, last_name, email, password, profile_pic) values('$fname', '$lname', '$email', '$password', '$file')";
		
		//Executing the query using database variable $connect
		mysqli_query($connect , $insert);

		//Redirect to login page
		header('Location:../login.html');
	}
	
 ?>