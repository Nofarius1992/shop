<?php 
	include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";

	/*
	1. Есть ли в базе данных пользователь с номером телефона что ввел пользователь
	2. Если нет, то регистрируем нового пользователя
	3. Добавляем заказ в базу данных с привязкой к пользователю
	*/

	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		$sql = "SELECT * FROM users WHERE phone LIKE '" . $_POST['phone'] . "'";
		$result = mysqli_fetch_assoc($connect->query($sql));
		$user_id = 0;
		if($result) {
			$user_id = $result['id'];
		} else {
			$sql = "INSERT INTO users (login, phone) VALUES ('" . $_POST['username'] . "', '" . $_POST['phone'] . "')";
			if($connect->query($sql)) {
				echo "User added!";
				$user_id = $connect->insert_id;
			} else {
				echo "error user";
			}
		}

		$sql = "INSERT INTO `orders` ( `user_id`, `products`, `address`, `status`) VALUES ('" . $user_id . "', '" . $_COOKIE['basket'] . "', '" . $_POST['address'] ."', 'Новый')";

		if($connect->query($sql)) {
			// Очистить куки
			setcookie("basket", "", 0, "/");
			echo "Заказ оформлен<br/>
			<a href='/'>На главную<a/>
			";

		} else {
			echo "error order";
		}
	}


 ?>