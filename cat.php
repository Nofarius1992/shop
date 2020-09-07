<?php 
	include "configs/db.php";
	include "parts/header.php"
 ?>


<div class="row">
	<?php 
		$sql = "SELECT * FROM products WHERE category_id =" . $_GET["id"];
		$result = $connect->query($sql);
		while ($row = mysqli_fetch_assoc($result)) {
			?>

			<div class="col-4">
		<div class="card m-2">
			<div class="card-body">
				<h5 class="card-title"><?php echo $row["title"] ?></h5>
				<p class="card-text"><?php echo $row["description"] ?></p>
				<a href="#" class="btn btn-primary">В корзину</a>
			</div>
		</div>
	</div><!-- /.col-4 -->
			<?php
		}
	?>
</div><!-- /.row -->


<?php 
	include "parts/footer.php";
 ?>
