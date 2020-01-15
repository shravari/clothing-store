<?php 
session_start();

require_once('header.php');
require_once('admin_crud/config.php');
  // if (isset($_SESSION['user_id']) &&  $_SESSION['user_id']!=null) {
      $select = "SELECT products.*,category.id as category_id, category.category_name as category_name FROM products JOIN category on products.category_id=category.id ";

$query = mysqli_query($connect, $select);
$select1 = "SELECT * FROM category";
$query1 = mysqli_query($connect, $select1);
 ?>
 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Product Table</li>
        </ol>

  <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i = 1;
                      $x =1;

                   while ($res = mysqli_fetch_assoc($query)) {
                   $image = strstr($res['images'], ',', true); ?>
                  <tr>
                    <td><?php echo $i++;  ?></td>
                    <td><?php echo $res['product_name']; ?></td>
                    <td><?php echo $res['price']; ?></td>
                    <td><?php echo $res['category_name'];
                    ?></td>
                    <td><?php echo $res['description']; ?></td>
                    <td><img src="../images/product-img/<?php echo $image; ?>" width="150px" height="150px" data-toggle="modal" data-target="#viewImageModal" onclick="view_details(<?php echo $res['id']; ?>);"></td>

                    <td>
                      <button type="button" class="btn btn-warning m-1" onclick="edit_product(<?php echo $res['id']; ?>);" data-toggle="modal" data-target="#exampleModal" >Edit</button>
                      <a href=""  class="btn btn-danger m-1" onclick="del_product(<?php echo $res['id']; ?>);">Delete</a>
                      </td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->

    <!-- /.content-wrapper -->
    <!-- Modal for editing the product -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <form action="admin_crud/update_product.php" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
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
                <div class="col-md-3">
                  <label>Select Category:</label>
                </div>
                <div class="col-md-9">
                  <select class="form-control" id="category" name="category">
                    <option selected="true" disabled="disabled">Available Categories</option>
                   <?php while ($res1 = mysqli_fetch_assoc($query1)) { ?>
                        <option value="<?php echo $res1['id']; ?>"><?php echo $res1['category_name']; ?></option>"
                    <?php } ?> 
                  </select>
                </div>
               </div>
               <div class="form-row mt-2">
                <div class="col-md-12">
                  <a href="addCategory.php" class="float-right">Add New Category</a>
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
                  <input type="file" placeholder="Choose a file" class="form-control" name="image">
                </div>
               </div>
               <input type="hidden" name="id" value="">
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="reset" name="" class="btn btn-primary" value="CLEAR">
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        <form>
      </div>
    </div>

    <!-- Modal to view the images -->
        <div class="modal fade" id="viewImageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-10">
              <img class="mainImage" src="" width="550px" height="500px">
            </div>
            <div id="imageDiv" class="col-md-2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>


 <?php 
// }
// else{
//   // header('Location:login_form.php');
//   echo "Please <a href='login.html'>Login</a> to access this page";
// }
require_once('footer.php');

 ?> 

<script type="text/javascript">
  var currentUrl = $(location).attr('href');  
      if (currentUrl.match(/edit=1/g)) {
         alert("Product updated successfully!");
          window.history.pushState({}, "Hide", "http://localhost/shravari/essence/admin/viewProducts.php");
      }
  
</script>