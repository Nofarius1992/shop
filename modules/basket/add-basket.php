<?php 
	include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";

	/*
		1. Получить товар по которому кликнул пользователь - done
		2. Добавить в массив товаров - done
		3. Добавить массив в куки

		4. Перебрать прошлый массив - done
			4.1 Преобразовать JSON с куки в массив
			4.2 Добавить новый элемент в массив
			4.3 Преобразовать массив в правильный JSON
			4.4 Добавить в куки

	*/

	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		$sql = "SELECT * FROM products WHERE id=" . $_POST["id"];

		$result = $connect->query($sql);

		$product = mysqli_fetch_assoc($result);

		
		// Проверка на существование куки (товар добавленный в корзину)
		if(isset($_COOKIE["basket"])) {
			// Переводим в массив php
			$basket = json_decode($_COOKIE["basket"], true);
			$basket["basket"][] = $product["id"];
		} else {
			$basket = ["basket" => [$product["id"]]];
		}

		// Преобразование массива в JSON формат
		$jsonProduct = json_encode($basket);

		// Добавляем куки
		setcookie("basket", $jsonProduct, time() + 60*60, "/");

		echo json_encode([
			"count" => count($basket["basket"])
		]);
	}

	
 ?>