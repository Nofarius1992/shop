<?php 
	include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";

	// Проверка существует ли пост запрос
	if (isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST") {
		$password = md5($_POST['pass']);
		// Авторизация
		$sql = "SELECT * FROM users WHERE email='" . $_POST['email'] . "' AND password='$password'";

		$result = $connect->query($sql);

		if($result->num_rows > 0) {
			$user = mysqli_fetch_assoc($result);
			if($user['verifided'] == 0) {
				echo "Подтвердите свой Email!";
			} else {
				echo "Вы вошли!";
			}
			
		} else {
			echo "Не верный email либо password!";
		}
	}
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Авторизация</title>
 </head>
 <body>
 	
 	<form method="POST">
 		<p>Email<br/>
 		<input type="text" name="email">
 		</p>
 		<p>Password<br/>
 		<input type="password" name="pass">
 		</p>
 		
 		<button type="submit">Войти</button>
 	</form>
 	<a class="btn" href="register.php">Регистрация</a>
 	<br/>
 	<a href="varifing.php">Выслать письмо для подтверждения почты</a>




 </body>
 </html>