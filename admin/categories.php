<?php 
    include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";
    $page = "categories";

    include $_SERVER['DOCUMENT_ROOT'] ."/admin/parts/header.php";
 ?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categories</li>
  </ol>
</nav>

<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title">
                Categories
                <a href="modules/products/add_category.php" type="button" class="btn btn-secondary">New Category</a>
            </h4>
            </div> <!-- /.card-header -->
            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Options</th>
                    </thead>
                    <tbody>
                        <?php 
                            /*Подключаем таблицу базы данных "Товары товара"*/
                            $sql = "SELECT * FROM categories";
                            $result = $connect->query($sql);
                            while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["title"]; ?></td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                              <a href="modules/products/edit_cat.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Edit</a>
                                              <a href="modules/products/delete_cat.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Delete</a>
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
            