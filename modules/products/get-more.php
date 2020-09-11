<?php 
	include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";
	// Номер страницы
	$page = $_GET["page"];


	// Количество показанных товаров
	$offset = $page * 12;

	// Обращаемся к таблице в базе данных и берём от туда по 12 позиций
	$sql = "SELECT * FROM products LIMIT 12 OFFSET " . $offset;
	$result = $connect->query($sql);

	// Цыкл вывода карточек с продуктом
	while ($row = mysqli_fetch_assoc($result)) {
		include  $_SERVER['DOCUMENT_ROOT'] ."/parts/product_card.php";
	}
 ?>