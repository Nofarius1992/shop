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
		$password = md5($_POST['pass']);
		$u_code = generateRandomString(20);
		// Регистрация
		$sql = "INSERT INTO users (login, password, email, confirm_mail) VALUES ('" . $_POST['username'] . "', '" . $password . "', '" . $_POST['email'] . "', '" . $u_code . "')";

		if($connect->query($sql)) {
			echo "Пользователь зарегестрирован, пожалуйста подтвердите свой Email!";

			$link = "<a href='http:shop-master.local/register.php?u_code=$u_code'>Confirm code</a>"; 
			mail($_POST['email'], 'Register', $link);
		}

		// Авторизаци
		// $sql = "SELECT * FROM users WHERE login='" . $_POST['username'] . "' AND password='$password'";

		// $result = $connect->query($sql);

		// if($result->num_rows > 0) {
		// 	echo "Пользователь найден!";
		// } else {
		// 	echo "error";
		// }
	}
	/*
	1. Сделать форму регистрации - done
	2. Сделать отправку формы - done
	3. Сделать отправку письма со ссылкой на подтверждение регистрации
	4. Сделать страницу с подтверждением регистрации

	*/
	// Функция для рандомного слова
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
 	<title>Регистрация</title>
 </head>
 <body>
 	
 	<form method="POST">
 		<p>Username <br/>
 		<input type="text" name="username">
 		</p>
 		<p>Email<br/>
 		<input type="text" name="email">
 		</p>
 		<p>Password<br/>
 		<input type="password" name="pass">
 		</p>
 		
 		<button type="submit">Register</button>
 	</form>
 	<a href="/authorization.php">Авторизация</a>
 	<br/>
 	<a href="varifing.php">Выслать письмо для подтверждения почты</a>

 </body>
 </html>