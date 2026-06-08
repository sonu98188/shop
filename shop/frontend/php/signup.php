<?php

require("../php/database.php"); // database connection
session_start();
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$address = $_POST['address'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($password == $confirm_password)
  {
     $check_table = $db->query("SHOW TABLES LIKE 'users'");

     if($check_table->num_rows == 0)
     {
       $create_table = $db->query("CREATE TABLE users(
        
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        phone VARCHAR(100) NOT NULL,
        otp VARCHAR(100) NOT NULL,
        adress TEXT,
        password VARCHAR(255) NOT NULL,
        create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

     )");
     }

  }


 $check_email = $db->query("SELECT * FROM users WHERE email = '$email'");

if($check_email->num_rows > 0)
{
    echo "Email already exists";
}
else
{
    $pattern = "1234567890";
        $length = strlen($pattern);
        $otp = [];


        for($i=0;$i<6;$i++)
        {
            $otp_index = rand(0,$length - 1);
            $otp[] = $pattern[$otp_index];
        }

        $otp_f = implode($otp);



        $sent_otp = mail($email,"OTP VERIFICATION",$otp_f,"FROM: deepakharisharma0000@gmail.com");
        if($sent_otp)
        {
             $insert = $db->query("
        INSERT INTO users
        (full_name, email, phone, otp, address, password)
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

    if ($insert) {
        echo "success";
        $_SESSION['user_email'] = $email;
    } else {
        echo "Insert Failed: " . $db->error;
    }

        }
        else
        {
            echo "failed";       
        }

}

?>