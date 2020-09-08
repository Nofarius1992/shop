<?php 
	include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";

	$sql = "SELECT * FROM products LIMIT 6 OFFSET 10";
	$result = $connect->query($sql);

	while ($row = mysqli_fetch_assoc($result)) {
		include  $_SERVER['DOCUMENT_ROOT'] ."/parts/product_card.php";
	}
 ?>