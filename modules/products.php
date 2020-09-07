<?php 
	// подключился к базе данных
	include "configs/db.php";

	// запрос на выбор всего из таблицы products в базе данных
	$query = "SELECT * FROM products";
	// переменая в которую возвращается наш заврос на выбор всего из базы данных
	$res = mysqli_query($connect, $query);
	// узнаём какое количество продуктов есть в базе данных
	$col_products = mysqli_num_rows($res);
 ?>

<?php 
	$i = 0;
	while($i < $col_products) {

		$product = mysqli_fetch_assoc($res);
		?>

		



		<?php

		// добавляем +1 для подсчета количества цыклов
		$i = $i + 1;
	}
 ?>
