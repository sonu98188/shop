<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Drive - Signup Login</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<div class="container">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow rounded mt-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">c4u shop</a>

      <button class="btn btn-primary ms-auto login_btn">
        Login
      </button>
    </div>
  </nav>


  <div class="row justify-content-center mt-5">

    <!-- Signup Form -->
    <div class="col-md-4 border rounded shadow p-4 signup-div ">

        
            <center><h4>Signup</h4></center>
           
       
        <form method="post" id="signupfrom">
            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="full_name"  id="full_name"class="form-control" placeholder="Enter Full Name">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email"  id="email"class="form-control" placeholder="Enter Email">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" name="phone"id="phone" class="form-control" placeholder="Enter Mobile Number">
                </div>

             

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" id="address"class="form-control" rows="3" placeholder="Enter Address"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"id="password" name="password" class="form-control" placeholder="Create Password">
                </div>

                <div class="mb-3">
                    <label class="form-label d-none">Confirm Password</label>
                    <input type="password"id="confirm_password" name="confirm_password" class="form-control d-none" placeholder="Confirm Password">
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100" id="next_btn">
          NEXT
        </button>
            </div>
        </form>


    </div>


    <!-- OTP Form -->
    <div class="col-md-4 border rounded shadow p-4 otp-div d-none">

      <form id="signupotp_frm">

        <center>
          <h3 class="mb-4">OTP Verification</h3>
        </center>

        <div class="mb-3">
          <input type="number" id="verify_otp" class="form-control" placeholder="Enter OTP">
        </div>

        <button type="submit" class="btn btn-danger w-100" id="submit_btn">
          Verify
        </button>

      </form>

    </div>

  </div>

</div>


<script>


 $(document).ready(function(){
  $("#signupfrom").submit(function(e)
  {
    e.preventDefault();
    $.ajax({
       type : "POST",
            url : "../frontend/php/signup.php",
           data : new FormData(this),
            processData : false,
            contentType : false,

            success:function(response){
            
               if (response.trim() == "Email already exists")
               { 

                       Swal.fire({

          title:'Error',
          text:'email exists',
          icon:'error'

        });
                      $("#next_btn").attr("disabled","");
                   
               }
               else{
                Swal.fire({
                    

                    icon : "success",
                    title : "success",
                    text : "otp send check your email"

                });
                $(".signup-div").addClass("d-none");
                   $(".otp-div").removeClass("d-none");



               }
            }
    })

  })
  
    $("#submit_btn").click(function(e){

    e.preventDefault();

    var otp = $("#verify_otp").val();
    var email = $("#email").val();

    $.ajax({
        type: "POST",
        url: "../frontend/php/verify_otp.php",
        data: {
            otp: otp,
            email: email
        },

        success: function(response){

            if(response.trim() == "success")
            {
                Swal.fire({
                    icon: "success",
                    title: "Verified",
                    text: "OTP Verified Successfully"
                });
                  window.location.replace("./index.php");
            }
            else
            {
                Swal.fire({
                    icon: "error",
                    title: "Invalid OTP",
                    text: "Please enter correct OTP"
                });
            }

        }
    });

});
    $(".login_btn").on('click',function(){
    
    const myModal = new bootstrap.Modal(document.getElementById('login_modal'))
    myModal.show();
    
});


  $("#login_form").submit(function(e){
    e.preventDefault();

    var login_email = $("#login_email").val();
    var login_password = $("#login_password").val();
    $.ajax({
      type : "POST",
      url : "php/login.php",
      data : {email: login_email, password: login_password},

      success:function(response)
      {
          if (response.trim() == "success") 
          {
            Swal.fire({
                    icon: "success",
                    title: "Verified",
                    text: "OTP Verified Successfully"
                });
                 window.location.replace("./index.php");
          }
          else
            {
                Swal.fire({
                    icon: "error",
                    title: "error",
                    text: "Please check your   email and password"
                });
            }
      }
    })
  })



})
   


     
  

 
</script>



<div class="modal login_form" tabindex="-1" id="login_modal">
  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <form id="login_form">

          <!-- Email -->
          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" id="login_email" placeholder="Enter email">
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" id="login_password" placeholder="Enter password">
          </div>

          <!-- Login Button -->
          <button type="submit" class="btn btn-primary w-100">
            Login
          </button>

        </form>

      </div>

    </div>

  </div>
</div>

</body>
</html>