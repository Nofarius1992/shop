<?php 
	// Количество одного товара
	$count = $_POST["count"];
	// ID товара
	$id = $_POST["id"];

	include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";
	$sql = "SELECT * FROM products WHERE id =" . $id;
	$result = $connect->query($sql);
	$product = mysqli_fetch_assoc($result);


	// Преобразуем куки в массив для php
	$basket = json_decode($_COOKIE["basket"], true);

	for($i = 0; $i < count($basket["basket"]); $i++) {
		if($basket["basket"][$i]["product_id"] == $id) {
			$basket["basket"][$i]["count"] = $count;
			if($count !== "") {
				$costPluse = $basket["basket"][$i]["count"] * $product["cost"];
				echo $basket["basket"][$i]["cost"] = $costPluse; 
			} else {
				echo "";
			}
		}
	}

	
	
	


	// Преобразование массива в JSON формат
	$jsonCount = json_encode($basket);

	

	// Очистить куки
	setcookie("basket", "", 0, "/");

	// Добавляем куки
	setcookie("basket", $jsonCount, time() + 60*60, "/");

 ?>