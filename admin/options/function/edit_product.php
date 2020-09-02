<?php 
	include "../../../configs/db.php";
	// проверяем существует ли название продукта и описание
	if(isset($_POST["title"]) && isset($_POST["description"]) &&
		
		$_POST["title"] != "" $$ $_POST["description"] != "") {

		$update_sql = "UPDATE products SET title = '" . $_POST["title"] . "', description = '" . $_POST["description"] . "' ";
		
		if (mysqli_query($connect, $update_sql)) {
			// При успешном применении перенаправить
			header("location: ../product/edit.php);
		} else {
			echo "0";
		}

	} else {
		echo "error";
	}
 ?>