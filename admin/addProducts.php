<?php 
	require_once('header.php');
  require_once('admin_crud/config.php');

    $select = "SELECT * FROM category"; 
    $query = mysqli_query($connect,$select);
 ?>

 <div id="content-wrapper">

      <div class="container-fluid">
 <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Add Product</li>
        </ol>
         <div class="container">
    <div class="card product_details mx-auto mt-5">
      <div class="card-header">Product Details</div>
      <div class="card-body">
        <form action="admin_crud/insert_product.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
           <div class="form-row">
              <div class="col-md-8">
                 <label>Product Name:</label>
              </div>
              <div class="col-md-4">
                <label>Price :</label>
              </div>
           </div>
           <div class="form-row">
            <div class="col-md-8">
              <input type="text" placeholder="Product Name" class="form-control" autofocus="autofocus" name="name">
            </div>
            <div class="col-md-4">
              <input type="number" class="form-control" placeholder="100.00" name="price">
            </div>
           </div>

            <div class="form-row mt-3">
              <div class="col-md-6">
                 <label>Select Category:</label>
              </div>
              <div class="col-md-6">
                <label>Quantity:</label>
              </div>
           </div>

           <div class="form-row">
            <div class="col-md-6">
              <select class="form-control" id="category" name="category">
                <option selected="true" disabled="disabled" value="Available Categories">Available Categories</option>
               <?php while ($res = mysqli_fetch_assoc($query)) { ?>
                    <option value="<?php echo $res['id']; ?>"><?php echo $res['category_name']; ?></option>"
                <?php } ?> 
              </select>
            </div>
            <div class="col-md-6">
                  <input type="number" class="form-control" placeholder="No. of items in inventory" name="quantity">
            </div>
           </div>
           <div class="form-row mt-2">
            <div class="col-md-6">
              <a href="addCategory.php" class="">Add New Category</a>
            </div>
           </div>
           <div class="form-row mt-3">
            <div class="col-md-3">
              <label>Description:</label>
            </div>
            <div class="col-md-9">
              <textarea rows="2" placeholder="Describe the product in 500 characters!" class="form-control" name="description"></textarea>
            </div>
           </div>
           <div class="form-row mt-3">
            <div class="col-md-3">
              <label>Upload Image:</label>
            </div>
            <div class="col-md-9">
              <input type="file" placeholder="Choose a file" class="form-control" name="image[]" multiple>
            </div>
           </div>

          </div>
          <input type="submit" name="" class="btn btn-primary px-5 mr-3" value="ADD">
          <input type="reset" name="" class="btn btn-primary px-5" value="CLEAR">

 <?php 
	require_once('footer.php');
  ?>
  <script type="text/javascript">
      var currentUrl = $(location).attr('href');  
      if (currentUrl.match(/add=1/g)) {
         alert("Product added successfully!");
          window.history.pushState({}, "Hide", "http://localhost/shravari/essence/admin/addProduct.php");

      }
  </script>