<?php 
	include "../../../configs/db.php";


	$delete_sql = "DELETE FROM `products` WHERE `products`.`id` = " . $_GET["id"];
		
	if (mysqli_query($connect, $delete_sql)) {
		// При успешном применении перенаправить
		header("location: ../../products.php");
	} else {
		echo "0";
	}

 ?>