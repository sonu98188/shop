<?php

  require("db.php");

  $edit_update = $_POST['edit_update'];

  $cat_id = $_POST['cat_id'];
  $update = $db->query("UPDATE category SET category_name = '$edit_update' WHERE id='$cat_id'");
  if($update){
  	echo "success";
  }
  else{
   echo "falied";

  	}

?>
