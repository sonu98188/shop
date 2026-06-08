<?php

  require("db.php"); 

  $edit_cat = $_POST['edit_cat'];
  $update_cat = $db->query("SELECT * FROM addproduct WHERE id= '$edit_cat'");
  $get_data_cat = $update_cat->fetch_assoc();
  echo json_encode($get_data_cat);


?>