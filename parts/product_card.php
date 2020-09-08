<div class="col-4">
	<div class="card m-2">
		<div class="card-body">
			<h5 class="card-title">
				<a href="product.php?id=<?php echo $row["id"] ?>">
					<?php echo $row["title"] ?>
				</a>
			</h5>
			<p class="card-text"><?php echo $row["description"] ?></p>
			<a href="#" class="btn btn-primary">В корзину</a>
		</div>
	</div>
</div><!-- /.col-4 -->