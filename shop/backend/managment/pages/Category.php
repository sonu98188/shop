<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Category Management</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

  <!-- SweetAlert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:'Poppins',sans-serif;
}

body{
  background:#f1f5f9;
}

/* MAIN BOX */

.main-box{
  padding:25px;
}

/* CARD DESIGN */

.custom-card{
  background:white;
  border-radius:20px;
  padding:25px;
  box-shadow:0 4px 20px rgba(0,0,0,0.06);
  border:1px solid #e2e8f0;
}

/* TITLE */

.page-title{
  font-size:22px;
  font-weight:600;
  margin-bottom:20px;
  color:#0f172a;
}

.page-title i{
  color:#2563eb;
  margin-right:8px;
}

/* INPUT */

.form-control{
  height:50px;
  border-radius:12px;
  border:1px solid #dbeafe;
  box-shadow:none !important;
}

.form-control:focus{
  border-color:#2563eb;
}

/* BUTTON */

.btn-custom{
  width:100%;
  height:50px;
  border:none;
  border-radius:12px;
  background:linear-gradient(90deg,#2563eb,#0ea5e9);
  color:white;
  font-weight:600;
  transition:0.3s;
}

.btn-custom:hover{
  transform:translateY(-3px);
}

/* TABLE */

.table-box{
  overflow-x:auto;
}

table{
  width:100%;
  margin-top:10px;
}

table thead{
  background:#eff6ff;
}

table th{
  padding:16px !important;
  color:#1e293b;
  font-weight:600;
  border:none !important;
}

table td{
  padding:16px !important;
  vertical-align:middle;
  border-bottom:1px solid #e2e8f0;
}

/* STATUS */

.badge-custom{
  background:#dcfce7;
  color:#15803d;
  padding:8px 14px;
  border-radius:20px;
  font-size:12px;
}

/* BUTTONS */

.edit-btn{
  background:#2563eb;
  color:white;
  border:none;
  width:38px;
  height:38px;
  border-radius:10px;
  transition:0.3s;
}

.edit-btn:hover{
  background:#1d4ed8;
  transform:scale(1.05);
}

.delete-btn{
  background:#ef4444;
  color:white;
  border:none;
  width:38px;
  height:38px;
  border-radius:10px;
  transition:0.3s;
}

.delete-btn:hover{
  background:#dc2626;
  transform:scale(1.05);
}

/* SCROLL */

.right-box{
  max-height:550px;
  overflow-y:auto;
}

/* MOBILE */

@media(max-width:768px){

  .custom-card{
    margin-top:15px;
  }

}

</style>

</head>

<body>

<div class="container-fluid main-box">

  <div class="row g-4">

    <!-- LEFT SIDE -->

    <div class="col-lg-4">

      <div class="custom-card">

        <h4 class="page-title">
          <i class="fa-solid fa-layer-group"></i>
          Add Category
        </h4>

        <label class="mb-2">
          Category Name
        </label>

        <input type="text"
               class="form-control mb-4"
               id="add_category"
               placeholder="Enter Category Name">

        <button class="btn-custom sub_btn">

          <i class="fa-solid fa-plus"></i>
          Add Category

        </button>

      </div>

    </div>

    <!-- RIGHT SIDE -->

    <div class="col-lg-8">

      <div class="custom-card right-box">

        <div class="d-flex justify-content-between align-items-center mb-3">

          <h4 class="page-title m-0">
            <i class="fa-solid fa-list"></i>
            Category List
          </h4>

          <span class="badge bg-primary">
            Total Categories
          </span>

        </div>

        <div class="table-box">

          <table class="table align-middle">

            <thead>

              <tr class="text-center">

                <th>ID</th>
                <th>Category Name</th>
               
                <th>Edit</th>
                <th>Delete</th>

              </tr>

            </thead>

            <tbody>

<?php

require("../php/db.php");

$get_cat = $db->query("SELECT * FROM category");

while($aa = $get_cat->fetch_assoc()) {

echo "

<tr class='text-center'>

<td>".$aa['id']."</td>

<td>".$aa['category_name']."</td>



<td>

<button class='edit-btn' id='".$aa['id']."'>

<i class='fa-solid fa-pen' ></i>

</button>

</td>

<td>

<button class='delete-btn' id='".$aa['id']."'>

<i class='fa-solid fa-trash'></i>

</button>

</td>

</tr>

";

}

?>

            </tbody>

          </table>

        </div>

      </div>

    </div>

  </div>

</div>

<script>

$(document).ready(function(){

  $(".sub_btn").on('click', function(e){

    e.preventDefault();

    var add_category = $("#add_category").val();

    if(add_category == "")
    {

      Swal.fire({
        icon:'warning',
        title:'Empty Field',
        text:'Please Enter Category Name'
      });

      return;

    }

    $.ajax({

      type:"POST",

      url:"managment/php/category_php.php",

      data:{
        add_category:add_category
      },

      beforeSend:function(){

        Swal.fire({

          title:'Loading...',
          text:'Please Wait',

          allowOutsideClick:false,

          didOpen: () => {
            Swal.showLoading();
          }

        });

      },

      success:function(response){

        Swal.close();

        if(response.trim() == "data insert")
        {

          Swal.fire({

            title:'Success',
            text:'Category Added Successfully',
            icon:'success'

          });

          $("#add_category").val("");

          setTimeout(() => {

            location.reload();

          },1000);

        }

      },

      error:function(){

        Swal.fire({

          title:'Error',
          text:'Something Went Wrong',
          icon:'error'

        });

      }

    });

  });
$(".edit-btn").click(function(){
  var edit_cat = $(this).attr("id");
  $.ajax({
    type: "POST",
    url :"managment/php/edit_cat.php",
    data : {edit_cat:edit_cat},
    success:function(response){
     var edit_data = JSON.parse(response);
                const myModal = new bootstrap.Modal(document.getElementById('edit_cat_modal'));
                myModal.show();

                $("#edit_input").val(edit_data['category_name']);
                $("#cat_id").val(edit_data['id']);

    }
  })
})


$(".edit_btn").click(function(){

  var edit_update = $("#edit_input").val();
  var cat_id = $("#cat_id").val();

  $.ajax({

    type : "POST",

    url : "managment/php/update_cat.php",

    data : {
      edit_update : edit_update,
      cat_id : cat_id
    },

    success:function(response){

      Swal.close();

      if(response.trim() == "success")
      {

        Swal.fire({

          icon : "success",
          title : "Updated",
          text : "Category Updated Successfully"

        });

        setTimeout(() => {

          location.reload();

        },1000);

      }
      else
      {

        Swal.fire({

          icon : "error",
          title : "Error",
          text : response

        });

      }

    },

    error:function(){

      Swal.fire({

        icon : "error",
        title : "Server Error",
        text : "Something Went Wrong"

      });

    }

  });

});

  $(".delete-btn").click(function(){
      var delet = $(this).attr("id");

     $.ajax({

        type : "POST",
        url :"./managment/php/delete_cat.php",
        data : {delet: delet},
  success:function(response)
        {

            if(response.trim() == "success")
            {

                Swal.fire({

                    icon : "success",
                    title : "Deleted",
                    text : "Category Deleted Successfully"

                });

                setTimeout(() => {

                    location.reload();

                },1000);

            }
           

        }

  })
   })
});

</script>



<div class="msg d-none">
  
  <div class="loading_box">
    <i class="fa fa-spinner fa-spin fs-1"></i>
  </div>
</div>


<div class="modal" tabindex="-1" id="edit_cat_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
              <input type="text" id="edit_input" class="form-control">
              <input type="hidden" id="cat_id">

        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary edit_btn">Save changes</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>