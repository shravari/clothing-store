
 <?php 
 // session_start();
 require_once('essenceHeader.php');
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