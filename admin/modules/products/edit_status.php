<?php 
	 include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";
	  if (isset($_POST["status"])) {
        $sql =  "UPDATE `orders` SET `status` = '" . $_POST['status'] . "' WHERE `orders` . `id` = " . $_POST['orderId'];
        if($connect->query($sql)) {
            header("Location: /admin/orders.php");    
        } else {
            echo "Ошибка";
        }
    }
    
 ?>