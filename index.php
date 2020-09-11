<?php 
	// Подключаем базу данных
	include "configs/db.php";
	// Подключаем хедер
	include "parts/header.php"
 ?>
<div class="row" id="products">
	<?php 
		// Указывает сколько товаров показывать на главной странице
		$count = 12;
		// Проверка существования гет запроса Пагинация
		if (isset($_GET["page"])) {
				// Переменая с гет запросом
				$page = $_GET["page"];
				// Количество показанных товаров
				$offset = $page * 12;
				// Запрос к базе данных добавлять по 12 товаров 
				$sql = "SELECT * FROM products LIMIT 12 OFFSET " . $offset;
				$result = $connect->query($sql);
				// Цыкл показа товаров
				while ($row = mysqli_fetch_assoc($result)) {
					// Подключаем файл карточки товара
					include "parts/product_card.php";
				}
			// Если не существует гет запроса 
			} else {
				// Запрос к базе данных без Пагинации
				$sql = "SELECT * FROM products LIMIT " . $count;
				$result = $connect->query($sql);
				// Цыкл вывода товаров
				while ($row = mysqli_fetch_assoc($result)) {
					include "parts/product_card.php";
				}
			}
		/******************
			Пагинация
		*******************/
		// Количество товаров в базе данных
		$sql = "SELECT * FROM products";
		$result = $connect->query($sql);
		$num_rows = mysqli_num_rows($result);

		// Количество страниц (считает из количества товаров) 
		$len = floor( $num_rows / $count);
		
	?>
</div><!-- /.row -->

<div class="row">
	<div class="col-4 offset-4">
		<input type="hidden" value="1" id="current-page">
		<button class="btn btn-primary btn-lg" id="show-more">Показать ещё</button>
		<hr/>
		<!-- Пагинация -->
		<nav aria-label="Page navigation example">
		  <ul class="pagination">
		    <?php 
		    	// Цыкл для вывода номеров страниц
		    	for($i = 0; $i <= $len; $i++) { ?>
		    		<li class="page-item">
		    			<a class="page-link" id="page-link" href="?page=<?php echo $i ?>">
		    				<?php echo $i + 1  ?>
		    			</a>
		    		</li>
		    	<?php }
		     ?>
		  </ul>
		</nav>
	</div>
</div><!-- /.row -->	

<?php 
	// Подключаем футер 
	include "parts/footer.php";
 ?>
