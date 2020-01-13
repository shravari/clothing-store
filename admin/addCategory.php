<?php 

	require_once('header.php');

 ?>
<div id="content-wrapper">

      <div class="container-fluid">
 <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Categories</li>
        </ol>

        <div class="container mt-5">
            <div class="card card-login mx-auto mt-5">
            	<div class="card-header">
            		Add Category
            	</div>
              <div class="card-body">
                <!-- <form> -->
                  <div class="form-group">
                      <input type="text" id="input" class="form-control" placeholder="Enter a category name" required="required" autofocus="autofocus" name="category_name">
                      <p id="erroru"></p>
                  </div>
                 <div class="text-center mt-4">
                  <button class="btn btn-primary px-5 mr-3" onclick="addCategory_ajax();" >ADD</button>
                  <button class="btn btn-primary px-5" onclick="clearInput();">CLEAR</button>
                 </div>
                <!-- </form> -->
              </div>
            </div>
          </div>
  </div>
</div>

<?php 

	require_once('footer.php');

?>