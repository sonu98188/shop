<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Add Product</title>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#eef2f7;
}

/* MAIN */

.main-box{
    padding:25px;
}

/* CARD */

.custom-card{
    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 4px 20px rgba(0,0,0,0.08);
    border:1px solid #e2e8f0;
}

/* TITLE */

.page-title{
    font-size:24px;
    font-weight:600;
    color:#0f172a;
    margin-bottom:20px;
}

.page-title i{
    color:#2563eb;
    margin-right:8px;
}

/* INPUT */

.form-control{
    height:50px;
    border-radius:12px;
    border:1px solid #cbd5e1;
    box-shadow:none !important;
}

.form-control:focus{
    border-color:#2563eb;
}

textarea.form-control{
    height:auto;
}

/* LABEL */

label{
    font-weight:500;
    color:#334155;
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
    transform:translateY(-2px);
}

/* TABLE */

.table-box{
    overflow-x:auto;
}

table{
    width:100%;
}

table thead{
    background:#eff6ff;
}

table th{
    padding:15px !important;
    border:none !important;
    color:#1e293b;
}

table td{
    padding:15px !important;
    vertical-align:middle;
}

/* BUTTONS */

.edit-btn{
    width:38px;
    height:38px;
    border:none;
    border-radius:10px;
    background:#2563eb;
    color:white;
    transition:0.3s;
}

.edit-btn:hover{
    background:#1d4ed8;
}

.delete-btn{
    width:38px;
    height:38px;
    border:none;
    border-radius:10px;
    background:#ef4444;
    color:white;
    transition:0.3s;
}

.delete-btn:hover{
    background:#dc2626;
}

/* SCROLL */

.right-box{
    max-height:90vh;
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
<i class="fa-solid fa-box"></i>
Add Product
</h4>

<form id="category_data" method="POST" enctype="multipart/form-data">

<?php

require("../php/db.php");

$sel_cat = $db->query("SELECT * FROM category");

?>

<!-- CATEGORY -->

<label class="mb-2">
Select Category
</label>

<select class="form-control mb-3" id="category" name="category">
<option value="">
Select Category
</option>

<?php

while($aa = $sel_cat->fetch_assoc()){

?>

<option value="<?php echo $aa['category_name']; ?>">

<?php echo $aa['category_name']; ?>

</option>

<?php

}

?>

</select>

<!-- PRODUCT NAME -->

<label class="mb-2">
Product Name
</label>

<input 
type="text"
class="form-control mb-3"
id="product_name"
name="product_name"

placeholder="Enter Product Name"
>

<!-- DESCRIPTION -->

<label class="mb-2">
Product Description
</label>

<textarea
class="form-control mb-3"
id="description"
name="description"
rows="4"
placeholder="Enter Product Description"
></textarea>
<!-- QUANTITY -->

<label class="mb-2">
Quantity
</label>

<input
type="number"
class="form-control mb-3"
id="quantity"
name="quantity"

placeholder="Enter Quantity"
>

<!-- AMOUNT -->

<label class="mb-2">
Amount
</label>

<input
type="number"
class="form-control mb-3"
id="amount"
name="amount"
placeholder="Enter Amount"
>

<!-- IMAGE -->

<label class="mb-2">
Product Image
</label>

<input
type="file"
class="form-control mb-4"
id="product_image"
name="product_image"
multiple
>

<!-- BUTTON -->

<button type="submit" class="btn-custom">

<i class="fa-solid fa-plus"></i>
Add Product

</button>

</form>

</div>

</div>

<!-- RIGHT SIDE -->

<div class="col-lg-8">

<div class="custom-card right-box">

<div class="d-flex justify-content-between align-items-center mb-3">

<h4 class="page-title m-0">

<i class="fa-solid fa-list"></i>
Product List

</h4>

<span class="badge bg-primary">
Total Products
</span>

</div>

<div class="table-box">

<table class="table align-middle">

<thead>

<tr class="text-center">

<th>ID</th>
<th>Image</th>
<th>Product Name</th>
<th>Category</th>
<th>Amount</th>
<th>quantity</th>
<th>Edit</th>

<th>Delete</th>

</tr>

</thead>
<?php

require("../php/db.php");

$get_cat = $db->query("SELECT * FROM addproduct");

while($aa = $get_cat->fetch_assoc()) {

echo "

<tr class='text-center'>

<td>".$aa['id']."</td>

<td>".$aa['product_image']."</td>
<td>".$aa['product_name']."</td>

<td>".$aa['category_name']."</td>

<td>".$aa['amount']."</td>
<td>".$aa['quantity']."</td>





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

</table>

</div>

</div>

</div>

</div>

</div>
<script>

$(document).ready(function(){

    $("#category_data").submit(function(e){
        e.preventDefault();
        $.ajax({

            type : "POST",
            url : "managment/php/add_product.php",
           data : new FormData(this),
            processData : false,
            contentType : false,

            success:function(response){
             if (response.trim() == "Success") 
             
                {

        Swal.fire({

          icon : "success",
          title : "product add",
          text :"product add  Successfully"

        });

        setTimeout(() => {

          location.reload();

        },1000);

      }
             

            }

        });

    });
    $(".delete-btn").click(function(){
      var delet = $(this).attr("id");

     $.ajax({

        type : "POST",
        url :"./managment/php/delete_product.php",
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
    $(".edit-btn").click(function(){
  var edit_cat = $(this).attr("id");
  $.ajax({
    type: "POST",
    url :"managment/php/edit_product.php",
    data : {edit_cat:edit_cat},
    success:function(response){
        // alert(response)
      
     var edit_pro = JSON.parse(response);
                const myModal = new bootstrap.Modal(document.getElementById('edit_product'));
                myModal.show();

             
                $("#edit_id").val(edit_pro['id']);
                $("#edit_category").val(edit_pro["category_name"]);
                $("#edit_name").val(edit_pro["product_name"]);
                $("#edit_amount").val(edit_pro["amount"]);
                $("#edit_quantity").val(edit_pro["quantity"]);
                 

    }
  })
})
   $("#update_btn").click(function(){
     var edit_id = $("#edit_id").val();
     var edit_category = $("#edit_category").val();
     var edit_name = $("#edit_name").val();
     var edit_amount= $("#edit_amount").val();
     var edit_quantity = $("#edit_quantity").val();
    

     $.ajax({
        type:"POST",
        url:"managment/php/update_product.php",
        data:{edit_id:edit_id ,edit_category:edit_category,edit_name:edit_name,edit_amount:edit_amount,edit_quantity:edit_quantity,},
        success:function(response){
           if (response.trim() == "success") 
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

        }

     })

   })

});

</script>
<!-- EDIT MODAL -->

<div class="modal fade" id="edit_product" tabindex="-1">

<div class="modal-dialog">

<div class="modal-content">

<div class="modal-header">

<h5 class="modal-title">
Edit Product
</h5>

<button type="button" class="btn-close" data-bs-dismiss="modal"></button>

</div>

<div class="modal-body">

<input type="hidden" id="edit_id">

<label class="mb-2">Category</label>

<input type="text" class="form-control mb-3" id="edit_category">

<label class="mb-2">Product Name</label>

<input type="text" class="form-control mb-3" id="edit_name">

<label class="mb-2">Description</label>

<textarea class="form-control mb-3" id="edit_description"></textarea>

<label class="mb-2">Quantity</label>

<input type="number" class="form-control mb-3" id="edit_quantity">

<label class="mb-2">Amount</label>

<input type="number" class="form-control mb-3" id="edit_amount">

</div>

<div class="modal-footer">

<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
Close
</button>

<button type="button" class="btn btn-primary" id="update_btn">
Update
</button>

</div>

</div>

</div>

</div>

</body>
</html>