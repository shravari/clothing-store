

function clearInput() {
    $('input[name=category_name').val("");
    $('#erroru').css('display','none');
  }

 function addCategory_ajax(){
    var name = $("input[name='category_name']").val();
    $.ajax({
      'url' :'./admin_crud/insert_category.php',
      'data' :'name='+name.toUpperCase(),
      'method' :'post',
      'success':function(response){
        if (response == 'exists') {
          $('#erroru').html('Category already exists,<br>Try something else');
          $('#erroru').css('color','red');
          $('#erroru').css('display','block');

        }else{
          alert("Category added successfully!");
           $('input[name=category_name').val("");
          $('#erroru').css('display','none');
        }
      }
    });
  }


    function edit_category(id){
      $.ajax({
        url : 'admin_crud/edit_category.php',
        data: 'id='+id,
        method:'get',
        dataType :'json',
        success:function(res){
          $('input[name="cat_name"]').val(res.category_name);
          $('input[name="cat_id"]').val(res.id);

        }
      });
    }



  function delete_category(id){
    var check = confirm("Sure, You want to delete?");
    if (check == true) {
      $.ajax({
        'url' : 'admin_crud/delete_category.php',
        'data' : 'id='+id,
        'method' : 'post',
        'success' : function(response){
            alert(response);
            window.location.assign('viewCategory.php');
        }
      });
    } 
  }

  function del_product(id){
    var check = confirm("Sure, You want to delete?");
    if (check == true) {

      $.ajax({
        'url' : 'admin_crud/delete_product.php',
        'data' : 'id='+id,
        'method' : 'post',
          success: function(response){
            alert(response);
        }
      });
            window.location.href('viewProducts.php');            

    } 
  }

    function view_details(id){
      $.ajax({
        url : 'admin_crud/edit_product.php',
        data: 'id='+id,
        method:'get',
        dataType :'json',
        success:function(res){
          $('h5').text(res.product_name);
          var image = res.images;
          var arr = image.split(',');
          var x = $('.mainImage');
          if (x[0].src != 'http://localhost/shravari/essence/images/product-img/'+arr[0]) {
            $('#imageDiv').empty(); //emptied the div because the previous product images(i.e the small images on the right) 
            //where also displayed and the new product images were getting appended due to append method
             for (var i =0 ; i < arr.length; i++) {
            if (i==0) {
              $('.mainImage').attr('src',"../images/product-img/"+arr[i]); 
            }
            $('#imageDiv').append('<div class="mt-2"><img src="../images/product-img/'+arr[i]+'" width="40px" height="40px" onclick="view_image(this);"></div>'); 
          }
          }
        }
      });
    }

    function view_image(name){
      var image_name = name.src;
      var index = image_name.search('images');
      $('.mainImage').attr('src','../'+image_name.slice(index));
    } 

    function edit_product(id){
      // alert(id);
      $.ajax({
        url : 'admin_crud/edit_product.php',
        data: 'id='+id,
        method:'get',
        dataType :'json',
        success:function(res){
          $('input[name="name"]').val(res['product_name']);
          $('input[name="price"]').val(res['price']);
          $('input[name="id"]').val(res['id']);
          $('textarea[name="description"]').val(res['description']);
          var x = res['category_id'];
          $('option[value='+x+']').attr('selected', true);

        }
      });
    }