<?php 
    include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";
    $page = "products";

    include $_SERVER['DOCUMENT_ROOT'] ."/admin/parts/header.php";
 ?>
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">
                Products
                <a href="modules/products/add.php" type="button" class="btn btn-secondary">New Ad</a>
                <a href="modules/products/add_category.php" type="button" class="btn btn-secondary">New Category</a>
            </h4>
            </div> <!-- /.card-header -->
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                        <?php 
                            /*Подключаем таблицу базы данных "Товары товара"*/
                            $sql = "SELECT * FROM products";
                            $result = $connect->query($sql);
                            while($row = mysqli_fetch_assoc($result)) {
                                /*Подключаем таблицу базы данных "Категории товара"*/
                                $sql2 = "SELECT `title` FROM `categories` WHERE id = " . $row["category_id"];
                                $result2 = $connect->query($sql2);
                                /*Массив с категориями товаров*/
                                $row2 = mysqli_fetch_assoc($result2);
                                ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["title"]; ?></td>
                                        <td><?php echo $row["description"]; ?></td>
                                        <td><?php echo $row2["title"]; ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="modules/products/edit.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Edit</a>
                                              <a href="modules/products/delete.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Delete</a>
                                            </div>
                                        </td>
                                    </tr> 
                                <?php
                             }
                         ?>                                    
                    </tbody>
                </table> <!-- /.table table-hover table-striped -->
            </div> <!-- /.card-body table-full-width table-responsive -->
        </div> <!-- /.card strpied-tabled-with-hover -->
    </div> <!-- /.col-md-12 -->
</div> <!-- /.row -->

<?php 
    include "parts/footer.php";
 ?>
            