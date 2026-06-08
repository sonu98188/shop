<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>coach 4 u shop</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
body{
    background:#f5f6fa;
}

/* Carousel */
.carousel img{
    border-radius:10px;
    object-fit:cover;
}

/* Product Card */
.card{
    border:none;
    border-radius:15px;
    overflow:hidden;
    transition:0.3s;
    box-shadow:0 4px 15px rgba(0,0,0,0.08);
    background:#fff;
}

.card:hover{
    transform:translateY(-8px);
    box-shadow:0 8px 25px rgba(0,0,0,0.15);
}

.card-img-top{
    height:250px;
    object-fit:cover;
}

.card-body{
    text-align:center;
}

.card h5{
    font-size:18px;
    font-weight:600;
    color:#333;
    height:50px;
}

.card p{
    font-size:22px;
    font-weight:bold;
    color:#28a745;
}

.buy-btn{
    width:100%;
    border-radius:30px;
    padding:10px;
    font-weight:bold;
}

/* Modal */
.modal-content{
    border-radius:15px;
    border:none;
}

.modal-header{
    background:#0d6efd;
    color:white;
}

.modal-title{
    font-weight:bold;
}

.form-control{
    border-radius:10px;
}

.btn-success{
    border-radius:25px;
}

.btn-secondary{
    border-radius:25px;
}
</style>

</head>
<body>


    <div class="container-fluid">
        <div class="row">
            <?php  require("php/navbar.php");?>
        </div>
        <div class="row mt-2">
            <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://images-eu.ssl-images-amazon.com/images/G/31/INSLGW/pc_unrec_may25_refresh_1x._CB761742379_.jpg" class="d-block w-100" alt="..." height="350px">
    </div>
    <div class="carousel-item">
      <img src="https://images-eu.ssl-images-amazon.com/images/G/31/2025/GW/UNREC/PC/78269._CB785061629_.jpg" class="d-block w-100" alt="..." height="350px">
    </div>
    <div class="carousel-item">
      <img src="https://images-eu.ssl-images-amazon.com/images/G/31/Img26/Sports/February/GW/BAU/Legacy/Unrec/5298_Sports_-_BAU_PC_creatives_3000X1200_02._CB787728092_.jpg" class="d-block w-100" alt="..." height="350px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        </div>



    </div>


    <div class="row mt-3">

             <?php

          require("php/database.php");


          $get_cat = $db->query("SELECT * FROM addproduct");

          while($aa = $get_cat->fetch_assoc()){

echo '
<div class="col-lg-3 col-md-4 col-sm-6 mb-4">
    <div class="card h-100">
        <img src="../backend/managment/upload/'.$aa['product_image'].'" class="card-img-top">

        <div class="card-body">
            <h5>'.$aa['product_name'].'</h5>

            <p>₹'.$aa['amount'].'</p>

            <a href="./frontend/buy.php?id='.$aa['id'].'">
                <button class="btn btn-primary buy-btn">
                    Buy Now
                </button>
            </a>
        </div>
    </div>
</div>';

           
            
          }

          ?>

     </div>




<script>
  $(document).ready(function(){
       $("#signup_btn").click(function(e){
        e.preventDefault();
        window.location.replace("./signuplogin.php");
       })
    });
   


</script>



</body>
</html>