<?php
   
   require("db.php");

    $category = $_POST['add_category'];

   $url = strtolower(str_replace(" ","-", $category));

    $create_table = $db->query("CREATE TABLE IF NOT EXISTS category(id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
       category_name VARCHAR(255) NOT NULL,
       category_url VARCHAR(255) NOT NULL
)");

    if($create_table)
    {
    	$insert = $db->query("INSERT INTO category
    		(category_name, category_url)
    		VALUES('$category','$url')");
    	if($insert){
    		echo "data insert";
    	}
    	else
    	{
    		echo "insert failed";
    	}
    }
    else
    {
    	echo "table create failed";
    }
?>



