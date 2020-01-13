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
