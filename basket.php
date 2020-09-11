<?php 
	// Подключаем базу данных
	include "configs/db.php";
	// Подключаем хедер
	include "parts/header.php";

 ?>

<div class="row" id="products">
		<table class="table table-dark">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Title</th>
	      <th scope="col">Coutn</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php 
	  		// Проверка на наличие куки (выбранный товар для покупки)
	  		if(isset($_COOKIE["basket"])) {
	  			// Если существет куки то переобразовать куки в обычный массив php
	  			$basket = json_decode($_COOKIE["basket"], true);
	  			// Цыкл вывода добавленных товаров в корзину
	  			for($i = 0; $i < count($basket["basket"]); $i++) {
	  				// Выбираем продукты с выбранным id
	  				$sql = "SELECT * FROM products WHERE id=" . $basket["basket"][$i];
	  				$result = $connect->query($sql);
	  				$product = mysqli_fetch_assoc($result);
	  				?>
	  					 <tr>
					      <th scope="row"><?php echo $product["id"] ?></th>
					      <td><?php echo $product["title"] ?></td>
					      <td>1</td>
					    </tr>
	  				<?php 
	  			}
	  		}	
	  	 ?>
	   
	  </tbody>
	</table>
</div><!-- /.row -->

<!-- Форма для добавления заказов -->
<div class="row" id="order">
	<form method="POST">
	  <div class="form-group">
	    <label for="exampleInputName">Name</label>
	    <input name="name" type="text" class="form-control" id="exampleInputName">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputAdress">Adress</label>
	    <input name="address" type="text" class="form-control" id="exampleInputAdress">
	  </div>
	  <div class="form-group">
	    <label for="exampleInputPhone">Phone</label>
	    <input name="phone" type="text" class="form-control" id="exampleInputPhone">
	  </div>
	  <button type="submit" name="submit" value="1" class="btn btn-primary">Order</button>
	</form>
</div>


<?php 
	// проверка на нажатие кнопки отправить форму 
	if (isset($_POST["submit"])) {
		// Добавляем в базу данных orders наш заказ
        $sql = "INSERT INTO orders (products, name, address, phone) VALUES ('" . $product["id"] . "', '" . $_POST["name"] . "', '" . $_POST["address"] . "', '" . $_POST["phone"] . "')";
        if($connect->query($sql)) {
            header("Location: /	");    
        } else {
            echo "Ошибка";
        }
    }
	// Подключаем футер 
	include "parts/footer.php";
 ?>
