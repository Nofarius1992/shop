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
	// Проверяем был ли отправлен пост запрос
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		$sql = "SELECT * FROM products WHERE id=" . $_POST["id"];

		$result = $connect->query($sql);

		$product = mysqli_fetch_assoc($result);

		
		// добавление в корзину
		if(isset($_COOKIE["basket"])) { // если в корзине уже что-то есть
			// Переводим в массив php
			$basket = json_decode($_COOKIE["basket"], true);


			/*
				1. Пройтись по всему массиву корзины - done
				2. Проверить есть ли совпадения по id
				3. Если совпадения есть: увеличить количество товара
			*/

			$issetProduct = 0;
			for($i = 0; $i < count($basket["basket"]); $i++) {
				if( $basket["basket"][$i]["product_id"] == $product["id"] ) {
					$basket["basket"][$i]["count"]++;
					$basket["basket"][$i]["cost"] = $product["cost"] * $basket["basket"][$i]["count"];
					$issetProduct = 1;
				}
			}

			if($issetProduct != 1) {
				$basket["basket"][] = [
				"product_id" => $product["id"],
				"count" => 1,
				"cost" => $product["cost"]
				];
			}
			

			/*
				product_id: 1;
				coutn: 3
			*/

		} else { // если корзина пустая
			$basket = [ "basket" => [
				["product_id" => $product["id"],
				"count" => 1,
				"cost" => $product["cost"]]
			] ];
		}

		// Преобразование массива в JSON формат
		$jsonProduct = json_encode($basket);

		// Очистить куки
		setcookie("basket", "", 0, "/");

		// Добавляем куки
		setcookie("basket", $jsonProduct, time() + 60*60, "/");

		echo $jsonProduct;
	}

	
 ?>