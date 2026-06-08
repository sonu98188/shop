<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

   <!-- jQuery -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"/>

   <!-- SweetAlert -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   <!-- Google Font -->
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   <title>Modern Admin</title>

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

/* SIDEBAR */

.sidebar{
   height:100vh;
   background:linear-gradient(180deg,#0f172a,#1e293b);
   padding:20px;
   position:fixed;
   width:260px;
   color:white;
}

.logo{
   text-align:center;
   margin-bottom:35px;
}

.logo h2{
   font-size:30px;
   font-weight:700;
   color:#38bdf8;
}

.logo p{
   color:#94a3b8;
   font-size:14px;
}

.li_menu{
   list-style:none;
   padding:0;
}

.li_menu li{
   padding:15px;
   margin-top:12px;
   border-radius:14px;
   cursor:pointer;
   transition:0.3s;
   display:flex;
   align-items:center;
   gap:12px;
   font-size:16px;
}

.li_menu li:hover{
   background:#334155;
   transform:translateX(5px);
}

.active_menu{
   background:linear-gradient(90deg,#2563eb,#0ea5e9);
}

/* MAIN */

.main{
   margin-left:260px;
   padding:25px;
}

/* TOPBAR */

.topbar{
   background:white;
   padding:18px 25px;
   border-radius:18px;
   box-shadow:0 4px 15px rgba(0,0,0,0.08);
   display:flex;
   justify-content:space-between;
   align-items:center;
}

.search-box{
   position:relative;
   width:300px;
}

.search-box input{
   width:100%;
   border:none;
   outline:none;
   background:#f1f5f9;
   padding:12px 15px 12px 45px;
   border-radius:12px;
}

.search-box i{
   position:absolute;
   top:14px;
   left:15px;
   color:gray;
}

/* CARDS */

.cards{
   margin-top:25px;
}

.card-box{
   background:white;
   padding:25px;
   border-radius:20px;
   box-shadow:0 4px 15px rgba(0,0,0,0.08);
   transition:0.3s;
}

.card-box:hover{
   transform:translateY(-6px);
}

.card-icon{
   width:60px;
   height:60px;
   border-radius:15px;
   display:flex;
   justify-content:center;
   align-items:center;
   color:white;
   font-size:24px;
}

.bg1{
   background:#3b82f6;
}

.bg2{
   background:#10b981;
}

.bg3{
   background:#f59e0b;
}

/* CONTENT */

.contant{
   margin-top:25px;
   background:white;
   border-radius:20px;
   padding:30px;
   min-height:350px;
   box-shadow:0 4px 15px rgba(0,0,0,0.08);
}

/* TABLE */

table{
   width:100%;
   margin-top:20px;
}

table tr{
   border-bottom:1px solid #e2e8f0;
}

table th{
   padding:15px;
   color:#64748b;
}

table td{
   padding:15px;
}

/* MOBILE */

@media(max-width:768px){

   .sidebar{
      width:100%;
      height:auto;
      position:relative;
   }

   .main{
      margin-left:0;
   }

   .topbar{
      flex-direction:column;
      gap:15px;
   }

   .search-box{
      width:100%;
   }

}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

   <div class="logo">
      <h2>ADMIN</h2>
      <p>Dashboard Panel</p>
   </div>

   <ul class="li_menu">

      <li class="my_admin active_menu" p_link="Category">
         <i class="fa-solid fa-layer-group"></i>
         Category
      </li>

      <li class="my_admin" p_link="add_product">
         <i class="fa-solid fa-plus"></i>
         Add Product
      </li>

      <li class="my_admin" p_link="all_product">
         <i class="fa-solid fa-box"></i>
         All Product
      </li>

   </ul>

</div>

<!-- MAIN -->

<div class="main">

   <!-- TOPBAR -->

   <div class="topbar">

      <div>
         <h3>Dashboard</h3>
         <small class="text-muted">
            Welcome Back Admin 👋
         </small>
      </div>

 
   </div>

  

   <div class="contant">

      <h3>FOUR ADMIN</h3>
      
    
     

   </div>

</div>

<script>

$(document).ready(function () {

   $(".my_admin").on('click',function(){

      $(".my_admin").removeClass("active_menu");

      $(this).addClass("active_menu");

      var y = $(this).attr("p_link");

      $.ajax({

         type: "POST",

         url: "./managment/pages/" + y + ".php",

         beforeSend:function(){

            $(".contant").html(`

               <div class="text-center p-5">

                  <div class="spinner-border text-primary"></div>

                  <p class="mt-3">
                     Loading...
                  </p>

               </div>

            `);

         },

         success:function(response){

            $(".contant").html(response);

         },

         error:function(){

            swal({
               title:"Error!",
               text:"Page Not Found",
               icon:"error"
            });

         }

      });

   });

});

</script>

</body>
</html>