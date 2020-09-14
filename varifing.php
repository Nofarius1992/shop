<?php 
	include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";

	// проверка на переход по ссылке верификации
	if(isset($_GET['u_code'])) {
		$sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "'";

		$result = $connect->query($sql);

		// Если находим ссылку для верификации
		if($result->num_rows > 0) {
			$user = mysqli_fetch_assoc($result); 
			$sql = "UPDATE `users` SET `verifided` = '1', `confirm_mail` = '' WHERE `id` =" . $user['id'];

			if($connect->query($sql)) {
				echo "Пользователь верефицирован, можете авторизоваться!";
			}
		}
	}
	// Проверка существует ли пост запрос
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		// Находим пользователя в базе данных с введённым email
		$sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'";
		$result = $connect->query($sql);
		$user = mysqli_fetch_assoc($result);
		if($user['verifided'] == '1') {
			echo "Вы уже подтвердили свой email";
		} else {
			$u_code = generateRandomString(20);
			// Отправка ссылки для подтверждения почты
			$sql = "UPDATE `users` SET `confirm_mail` = '" . $u_code ."' WHERE `email` ='" . $_POST['email'] . "'";

			if($connect->query($sql)) {
				echo "Ссылка для подтверждения отправлена, пожалуйста подтвердите свой Email!";

				$link = "<a href='http:shop-master.local/register.php?u_code=$u_code'>Confirm code</a>"; 
				mail($_POST['email'], 'Register', $link);
			} else {
				echo "Не верный email!";
			}
		}
	}


	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Верификация</title>
 </head>
 <body>
 	
 	<form method="POST">
 		<p>Email<br/>
 		<input type="text" name="email">
 		</p>
 		<button type="submit">Отправить</button>
 	</form>
 	<a href="/authorization.php">Авторизация</a>
 	<a href="/register.php">Регистрация</a>

 </body>
 </html>