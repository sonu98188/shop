<?php
 
    $db = new mysqli("localhost","root","","ecom");
   if($db->connect_error)
    {
    	echo "not";
    }
    
?>