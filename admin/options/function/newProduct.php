<?php 
	include "../../../configs/db.php";

	var_dump($_POST["title"]);

	$newProduct_sql = "INSERT INTO `products` (`title`, `description`, `content`, `category_id`) VALUES ('" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["category"] . "')";
		
	if (mysqli_query($connect, $newProduct_sql)) {
		// При успешном применении перенаправить
		header("location: ../../products.php");
	} else {
		echo "0";
	}

 ?>