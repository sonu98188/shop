<?php

require("db.php");

$product_n = $_POST['product_name'];
$category = $_POST['category'];
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$amount = $_POST['amount'];

$product_image = $_FILES['product_image']['name'];
$tmp_name = $_FILES['product_image']['tmp_name'];

$product_pic = "../upload/" . $product_image;

if(file_exists($product_pic))
{
    echo "Image already exists";
}
else
{
    if(move_uploaded_file($tmp_name, $product_pic))
    {

        // check table exists
        $check_table = $db->query("SHOW TABLES LIKE 'addproduct'");

        // if table not exists
        if($check_table->num_rows == 0)
        {
            $create_table = $db->query("
                CREATE TABLE addproduct(
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    category_name VARCHAR(255),
                    product_image VARCHAR(255),
                    product_name VARCHAR(255),
                    product_description TEXT,
                    quantity INT,
                    amount INT,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )
            ");

            if(!$create_table)
            {
                echo "Table create failed";
                exit;
            }
        }

        // insert data
        $insert = $db->query("
            INSERT INTO addproduct
            (category_name, product_image, product_name, product_description, quantity, amount)
            VALUES
            ('$category', '$product_image', '$product_n', '$description', '$quantity', '$amount')
        ");

        if($insert)
        {
            echo "Success";
        }
        else
        {
            echo "Insert Failed";
        }

    }
    else
    {
        echo "Image Upload Failed";
    }
}

?>