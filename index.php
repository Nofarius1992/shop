<?php 
	include "configs/db.php";
	include "parts/header.php"
 ?>
<div class="row" id="prosucts">
	<?php 
		$sql = "SELECT * FROM products LIMIT 6";
		$result = $connect->query($sql);
		while ($row = mysqli_fetch_assoc($result)) {
			include "parts/product_card.php";
		}
	?>
</div><!-- /.row -->

<?php 
/*
1. Выводить на странице только 6 записей - done
2. Сделать клик по кнопке - domxml_new_doc(version)
3. Сделать запрос к базе данных на получение следующих 6 записей
4. Получить следующие записи
5. Вывести записи на экран
*/
 ?>

<div class="row">
	<div class="col-4 offset-4">
		<button class="btn btn-primary btn-lg" id="show-more">Показать ещё</button>
	</div>
</div><!-- /.row -->

<?php 
	include "parts/footer.php";
 ?>
