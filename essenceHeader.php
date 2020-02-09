<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Blog</title>
	<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway:500&display=swap" rel="stylesheet">
</head>
<body>
	<!-- Navbar  -->
		<nav class="navbar navbar-expand-lg px-5">
  <a class=" nav_brand" href="index.html"><img src="images/core-img/logo.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon text-light"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto pt-2 pl-3">
      <li class="nav-item">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.html">Blog</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact</a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0 pt-2">
      <button class="btn bg-transparent"><i class="fa fa-search" aria-hidden="true"></i></button><input class="mr-sm-2" type="search" placeholder="Type to search" aria-label="Search">
    </form>
    <ul class="navbar-nav">
    	<li class="nav-item">
        <a class="nav-link nav_fa px-3" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link nav_fa px-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user-o" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">User Name</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Orders</a>
          <a class="dropdown-item" href="#">Wishlist</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Edit Profile</a>
          <a class="dropdown-item" href="#">LogOut</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link nav_fa px-3" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"><sup class="badge badge-light"> <?php if (array_key_exists('cart',$_SESSION)) { echo count($_SESSION['cart']); } ?> </sup></i></a>
      </li>
    </ul>
  </div>
</nav>
	<!-- Navbar  -->