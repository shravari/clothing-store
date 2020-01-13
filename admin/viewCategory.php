<?php 
session_start();
  // if (isset($_SESSION['user_id']) &&  $_SESSION['user_id']!=null) {
    require_once('header.php');
    require_once('admin_crud/config.php');
        // $user_id = $_SESSION['user_id'];
    $select = "SELECT * FROM category";
    $query = mysqli_query($connect, $select);

 ?>
 

 <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">View all categories</li>
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
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $i = 1;
                   while ($res = mysqli_fetch_assoc($query)) { ?>
                  <tr>
                    <td><?php echo $i++;  ?></td>
                    <td><?php echo $res['category_name']; ?></td>
                    <td><button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" onclick="edit_category(<?php echo $res['id']; ?>);">Edit</button> / <button class="btn btn-danger" onclick="delete_category(<?php echo $res['id']; ?>);">Delete</button></td>
                  </tr>
                 <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    <!-- /.content-wrapper -->
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
     <form method="post" action="admin_crud/update_category.php">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <div class="form-group row">
                  <!-- <div class="col-sm-6 mb-3 mb-sm-0"> -->
                    <input type="text" class="form-control mx-5" placeholder="Enter a category name" required="required" autofocus="autofocus" name="cat_name">
                    <input type="hidden" name="cat_id">
                  </div>
                <!-- </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Edit Category Name</button>
      </div>
    </div>
        </form>

  </div>
</div>


 <?php 
  require_once('footer.php');
 ?>


  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap4.min.js"></script>
  <script src="js/datatables-demo.js"></script>
<script type="text/javascript">
  var currentUrl = $(location).attr('href');  
    if (currentUrl.match(/edit=1/g)) {
       alert("Category name edited successfully!");
        window.location.assign('viewCategory.php');

    }
</script>



 <?php 
//   }
// else{
//   header('Location:index.html');

// }

  ?>
