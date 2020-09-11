<?php 
	include "configs/db.php";
	include "parts/header.php";
	// Делаем запрос в базу данных для вывода категорий товара
	$sql = "SELECT * FROM categories WHERE id =" . $_GET["id"];
	$category = mysqli_fetch_assoc($connect->query($sql));

 ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $category["title"] ?></li>
  </ol>
</nav>

<div class="row">
	<?php 
		// Выбираем товар с выбранной категорией
		$sql = "SELECT * FROM products WHERE category_id =" . $_GET["id"];
		$result = $connect->query($sql);
		// Цыкл для вывода продуктов в магазине
		while ($row = mysqli_fetch_assoc($result)) {
			include "parts/product_card.php";
		}
	?>
</div><!-- /.row -->

<?php 
	include "parts/footer.php";
 ?>
