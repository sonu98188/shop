<?php

     require("db.php");

     $delete_cat = $_POST['delet'];
  $delete = $db->query("DELETE FROM category WHERE id='$delete_cat'");

    if($delete)
    {
        echo "success";
    }
    else
    {
        echo "failed";
    }



?>