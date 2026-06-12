<?php

require("../php/database.php");
session_start();

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($password != $confirm_password)
{
    echo "password not match";
    exit();
}

$check_table = $db->query("SHOW TABLES LIKE 'users'");

if($check_table->num_rows == 0)
{
    $db->query("
    CREATE TABLE users(
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone VARCHAR(100) NOT NULL,
        otp VARCHAR(100) NOT NULL,
        address TEXT,
        password VARCHAR(255) NOT NULL,
        create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )
    ");
}

$check_email = $db->query("SELECT * FROM users WHERE email='$email'");

if($check_email->num_rows > 0)
{
    echo "Email already exists";
    exit();
}

    $pattern = "1234567890";
        $length = strlen($pattern);
        $otp = [];


        for($i=0;$i<6;$i++)
        {
            $otp_index = rand(0,$length - 1);
            $otp[] = $pattern[$otp_index];
        }

        $otp_f = implode($otp);


$subject = "OTP Verification";

$message = "
<html>
<head>
<title>OTP Verification</title>
</head>
<body style='font-family:Arial,sans-serif;background:#f5f5f5;padding:20px;'>
    <div style='max-width:500px;margin:auto;background:#fff;padding:20px;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,0.1);'>
        
        <h2 style='color:#0d6efd;text-align:center;'>Email Verification</h2>
        
        <p>Hello <b>$full_name</b>,</p>
        
        <p>Your OTP for account verification is:</p>
        
        <h1 style='text-align:center;color:#dc3545;'>$otp_f</h1>
        
        <p>This OTP is valid for a short time only.</p>
        
        <hr>
        
        <p style='text-align:center;color:#777;'>
            Coach4U Shop
        </p>
    </div>
</body>
</html>
";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type:text/html;charset=UTF-8\r\n";
$headers .= "From:deepakharisharma0000@gmail.com\r\n";

$sent_otp = mail($email,$subject,$message,$headers);

if(!$sent_otp)
{
    echo "OTP send failed";
    exit();
}
else{
$insert = $db->query("
INSERT INTO users
(full_name,email,phone,otp,address,password)
VALUES
(
    '$full_name',
    '$email',
    '$phone',
    '$otp_f',
    '$address',
    '$password'
)
");

if($insert)
{
    $_SESSION['user_email'] = $email;
    echo "success";
}
else
{
    echo "Insert Failed : ".$db->error;
}
}
?>