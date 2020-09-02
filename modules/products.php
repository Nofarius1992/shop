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

		<div class="col-4">
			<div class="card m-2">
				<img src="..." class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><?php echo $product["title"] ?></h5>
					<p class="card-text"><?php echo $product["description"] ?></p>
					<a href="#" class="btn btn-primary">Go somewhere</a>
				</div>
			</div>
		</div><!-- /.col-4 -->



		<?php

		// добавляем +1 для подсчета количества цыклов
		$i = $i + 1;
	}
 ?>
