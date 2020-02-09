<?php 
	require_once('essenceHeader.php');
 ?>

<!-- blog banner -->
<div class="shop_blog_banner">
	<div>
		<h3>DRESSES</h3>	
	</div>
</div>
<!-- blog banner -->
<?php 
	require_once('admin/admin_crud/config.php');
	$select_products = "SELECT * from products";
	$query = mysqli_query($connect, $select_products);
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<h6>Categories</h6>

		</div>
		<div class="col-md-9">
			<div class="container product">
				<div class="row">
				<?php 
					while ($res= mysqli_fetch_assoc($query)) {
						$image = substr($res['images'], 0,strpos($res['images'],','));
				 ?>
					<div class="col-md-4 shop mt-3">
						<div class="like_products">
							<button onclick="like(this);"><i class="fa fa-heart" aria-hidden="true"></i></button>
						</div>
						<a href="product.php?id=<?php echo $res['id'];?>"><img src="images/product-img/<?php echo $image; ?>"></a>
						<p>TOPSHOP</p>
						<a href="product.php?id=<?php echo $res['id'];?>"><h6><?php echo $res['product_name']; ?></h6></a>
						<p>$<?php echo $res['price']; ?>.00</p>
							<button class="cart" onclick="add_to_cart(<?php echo $res['id']; ?>);">ADD TO CART</button>
					</div>
				
				<?php 
					}
				 ?>
				 </div>
			</div>
		</div>
	</div>
</div>


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

<script type="text/javascript">
	function like(e){
		e.css('color','#FC3550');
	}
	// $('button').click(function(){
	// 	$('i').css('color','#FC3550');
	// });
</script>

</body>
</html>