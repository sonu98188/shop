<?php

require("db.php");
$edit_id = $_POST['edit_id'];
$edit_category = $_POST['edit_category'];
$edit_name = $_POST['edit_name'];
$edit_quantity = $_POST['edit_quantity'];
$edit_amount = $_POST['edit_amount'];

$update = $db->query("UPDATE addproduct SET

category_name = '$edit_category',
product_name = '$edit_name',
quantity = '$edit_quantity',
amount = '$edit_amount'


WHERE id = '$edit_id'");

if($update)
{
    echo "success";
}
else
{
    echo "failed";
}


?>