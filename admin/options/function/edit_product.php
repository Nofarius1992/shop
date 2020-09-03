<?php 
	include "../../../configs/db.php";
	// проверяем существует ли название продукта и описание
	if(isset($_POST["title"]) && isset($_POST["description"]) &&
		
		$_POST["title"] != "" && $_POST["description"] != "") {

		$update_sql = "UPDATE products SET title = '" . $_POST["title"] . "', description = '" . $_POST["description"] . "' WHERE id = " . $_GET["id"];
		
		if (mysqli_query($connect, $update_sql)) {
			// При успешном применении перенаправить
			header("location: ../../products.php");
		} else {
			echo "0";
		}

	} else {
		echo "error";
	}
 ?>