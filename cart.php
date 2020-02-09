<?php 
	require_once('essenceHeader.php');
	$product_id = '';
	$i = 0;
	$len = count($_SESSION['cart']);
	while ($i<$len) {
		if ($len == $i+1) {
			$product_id .= $_SESSION['cart'][$i];	
		}else{
			$product_id .= $_SESSION['cart'][$i].',';
		}
		$i++;
	}
	require_once('admin/admin_crud/config.php');
	$select = "SELECT * FROM products where id in ($product_id)";
	$query = mysqli_query($connect,$select);
 ?>
 <div class="card mb-3">
          <div class="card-header">
            <!-- <i class="fas fa-table"></i> -->
            Your bag</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Price</th>
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
                    <td class="price"><?php echo $res['price']; ?></td>
                    <td><img src="images/product-img/<?php echo $image; ?>" width="80px" height="80px" data-toggle="modal" data-target="#viewImageModal" onclick="view_details(<?php echo $res['id']; ?>);"></td>

                    <td class="display-inline">
                      <button class="badge badge-info mt-2">-</button><span class="mt-2 m-2">1</span><button class="badge badge-info mt-2">+</button>
                      <a class="float-right" onclick="remove_from_list(this)"><i class="fa fa-times" aria-hidden="true"></i></a>
                      </td>
                  </tr>
                 <?php } ?>
                 <tr>
                 	<td colspan="2" class="text-center">Total</td>
                 	<td></td>
                 	<td colspan="2"><button class="btn btn-primary form-control">Place an Order</button></td>
                 </tr>
                </tbody>
              </table>
            </div>
          </div>
          
        </div>

      </div> 
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <script type="text/javascript">
      	function remove_from_list(id){
      		var tr = $(id).closest('tr');
      		tr.remove();
      	}


      	console.log($('.price'));
      </script>