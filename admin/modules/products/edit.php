<?php 

    include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";
    $page = "products";

    include $_SERVER['DOCUMENT_ROOT'] ."/admin/parts/header.php";

    if (isset($_POST["submit"])) {
        $sql =  "UPDATE `products` SET `title` = '" . $_POST["title"] . "', `description` = '" . $_POST["description"] . "', content = '" . $_POST["content"] . "', category_id = '" . $_POST["cat_id"] . "' WHERE `products`.`id` =" . $_GET["id"];
        if($connect->query($sql)) {
            header("Location: /admin/products.php");    
        } else {
            echo "Ошибка";
        }
    }

    // Подключаем базу данных товаров
    $sql = "SELECT * FROM products WHERE id =" . $_GET["id"];
    $result = $connect->query($sql);
    $row = mysqli_fetch_assoc($result);
 ?>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Product</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input name="title" type="text" class="form-control" value="<?php echo $row["title"] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" type="text" class="form-control"><?php echo $row["description"] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" type="text" class="form-control"><?php echo $row["content"] ?></textarea>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-12">
                        <div class="form-group">
                            <label>Category</label>
                           <select class="form-control" name="cat_id">
                                
                                    <?php 
                                         /*Подключаем таблицу базы данных "Категории товара"*/
                                        $sql2 = "SELECT `title` FROM `categories` WHERE id = " . $row["category_id"];
                                        $result2 = $connect->query($sql2);
                                        /*Массив с категориями товаров*/
                                        $row2 = mysqli_fetch_assoc($result2);
                                        echo "<option value='" . $row2["id"] . "'>  " . $row2["title"] . " </option>";

                                        $sql3 = "SELECT * FROM categories";
                                        $result3 = $connect->query($sql3);
                                        while($row3 = mysqli_fetch_assoc($result3)) {
                                        echo "<option value='" . $row3["id"] . "'>". $row3["title"] . "</option>";
                                    }
                                 ?>
                           </select>
                        </div>
                    </div>
                     
                    <button name="submit" value="1" type="submit" class="btn btn-successs btn-fill pull-right">Save</button>
                    <!-- <div class="clearfix"></div> -->
                </form>
            </div>
        </div>
    </div>
</div>