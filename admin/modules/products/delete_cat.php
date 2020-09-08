<?php 
	include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";


	$delete_sql = "DELETE FROM `categories` WHERE `categories`.`id` = " . $_GET["id"];
		
	if (mysqli_query($connect, $delete_sql)) {
		header("location: /admin/categories.php");
	} else {
		echo "0";
	}

 ?>