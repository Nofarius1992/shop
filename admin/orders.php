<?php 
    include "../configs/db.php";
    $page = "orders";

    include "parts/header.php";

    /*
	1. Создать страницу с заказами в админке - done
	2. Вывести список заказов из базы данных
		2.1 ID заказа
		2.2 Список названия товаров
		2.3 Кто заказал товар
	3. Сделать два изменяемых статуса к заказу
		3.1 Новый заказ - при создании присваивается этот статус
		3.2 Отправле клиенту
	4. Сделать функционал для изменения статуса заказа в админке 
    */

    include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";
    
 ?>

 <div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">Список заказов</h4>
            </div>
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Name User</th>
                        <th>Products</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                    	<?php 
                    		// Подключаемся к таблице заказов
                    		$sql = "SELECT * FROM orders";
						    $result = $connect->query($sql);
						    // Цыкл вывода заказов
						    while($orders = mysqli_fetch_assoc($result)) {
						    	// Подключаемся к таблице пользователей
						    	$sqlUs = "SELECT * FROM users WHERE id=" . $orders["user_id"];
						    	$resultUs = $connect->query($sqlUs);
						    	$user = mysqli_fetch_assoc($resultUs);

						    	// Массив продуктов, которые заказал  пользователь
						    	$userProducts = json_decode($orders['products'], true);
						    	$userProductsCount = count($userProducts['basket']);
						    	?>
						    	<tr>
		                            <td><?php echo $orders["id"]; ?></td>
		                            <td><?php echo $user['login']; ?></td>
		                            <td>
		                            	<?php 
				                            for($i = 0; $i < $userProductsCount; $i++) {
									    		// Подключаемся к таблице продуктов 
										    	$sqlProducts = "SELECT * FROM products WHERE id=" . $userProducts['basket'][$i]['product_id'];
										    	$resultUserProducts = $connect->query($sqlProducts);
										    	$userProductId = mysqli_fetch_assoc($resultUserProducts);
										    	echo "<br/>";
										    	echo $userProductId['title'];
										    	echo " ";
										    	echo $userProducts['basket'][$i]['count'];
										    	echo "шт ";
										    	echo $userProducts['basket'][$i]['cost'];
										    	echo " ";
										    	echo "<span>грн</span>";
									    	} 
			                            ?> 
		                        	</td>
		                            <td><?php echo $orders['address']; ?></td>
		                            <td><?php echo $user['phone']; ?></td>
		                            <td>
		                            	<?php 
		                            		if($orders['status'] == 'Новый') {
		                            			?>
		                            			<form action="modules/products/edit_status.php" method="post">
				                            	<select class="form-control" name="status">
												  <option><?php echo $orders['status'] ?></option>
												  <option>Отправлен клиенту</option>
												</select>
												<input name="orderId" type="hidden" value="<?php echo $orders["id"]; ?>">
												<button type="submit" class="btn btn-primary">Изменить</button>
											</form>
											<?php
		                            		} else {
		                            			echo "Отправлен клиенту";
		                            		}
		                            	 ?>
		                            	

									</td>
		                        </tr>
						    	<?php
						    }
						    

                    	 ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> <!-- /.row -->



 <?php 
    include "parts/footer.php";
?>