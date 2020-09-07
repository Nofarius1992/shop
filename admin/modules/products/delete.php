<?php 
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";


	$delete_sql = "DELETE FROM `products` WHERE `products`.`id` = " . $_GET["id"];
		
	if (mysqli_query($connect, $delete_sql)) {
		header("location: /admin/products.php");
	} else {
		echo "0";
	}

 ?>