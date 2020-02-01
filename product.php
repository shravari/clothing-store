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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pages
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
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
      <li class="nav-item">
        <a class="nav-link nav_fa px-3" href="#"><i class="fa fa-user-o" aria-hidden="true"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav_fa px-3" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"><sup class="badge badge-light">4</sup></i></a>
      </li>
    </ul>
  </div>
</nav>
	<!-- Navbar  -->
 <?php 
 require_once('admin/admin_crud/config.php');
 $id = $_GET['id'];
 $select = "SELECT * FROM products where id='$id'";
  $query = mysqli_query($connect, $select);
  $res = mysqli_fetch_assoc($query);
  // print_r($res['images']);
  $images = explode(",", $res['images']);
  ?>

  <!-- Product -->
  <div class="container product_page">
    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-10">
            <img class="mainImage" src="images/product-img/<?php echo$images[0]; ?>" width="100%" height="500px">
          </div>
          
            <div id="imageDiv" class="col-md-2">
                <?php for ($i=0; $i < count($images) ; $i++) { 
                  // print_r($images[$i]);
                  echo '<div class="mt-2"><img src="images/product-img/'.$images[$i].'" width="40px" height="40px" onclick="view_image(this);"></div> ';
            } ?>   
            </div>
        </div>
      </div>

      <div class="col-md-6">
          <h1><?php echo $res['product_name']; ?></h1>
          <h3>Rs. <?php echo $res['price']; ?>.00</h3>
          <button onclick="add_to_cart(<?php echo $res['id']; ?>);">ADD TO CART</button> 
          <p><?php echo $res['description']; ?></p>
      </div>
    </div>
  </div>
  <!-- Product -->


  <!-- Footer -->
  <footer>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ">
            <div class="d-inline">
                <a class="float-left m-2" href="#"><img src="images/core-img/logo2.png" alt=""></a>
              <ul class="float-left">
                <li class="float-left m-2">Shop</li>
                <li class="float-left m-2">Blog</li>
                <li class="float-left m-2">Contact</li>
              </ul>
            </div>
          </div>
          <div class="col-md-3 social_media">
            <ul>
              <li>Order Status</li>
              <li>Shipping and Delivery</li>
              <li>Privacy Policy</li>
            </ul>

            <div class="icons">
              <i class="fa fa-facebook" aria-hidden="true"></i>
              <i class="fa fa-twitter" aria-hidden="true"></i>
              <i class="fa fa-instagram" aria-hidden="true"></i>
              <i class="fa fa-youtube-play" aria-hidden="true"></i>
              <i class="fa fa-pinterest" aria-hidden="true"></i>
            </div>
          </div>
          <div class="col-md-3 social_media">
            <ul>
              <li>Payment Options</li>
              <li>Guides</li>
              <li>Terms of Use</li>
            </ul>
          </div>
        </div>
        <div class="text-center mt-5 text-secondary">
          <p>Copyright &copy;2020 All rights reserved | This template is made with  by Shravari Patil</p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer -->



  <script type="text/javascript" src="js/jquery.min.js"></script> 
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/page_essence.js"></script>
<!--   <script type="text/javascript" src="admin/js/essence.js"></script> -->



</body>
</html>