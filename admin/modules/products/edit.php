<?php 

    include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";
    $page = "products";

    include $_SERVER['DOCUMENT_ROOT'] ."/admin/parts/header.php";

    if (isset($_POST["submit"])) {
        $sql =  "UPDATE `products` SET `title` = '" . $_POST["title"] . "', `description` =  WHERE `products`.`id` =" . $_GET["id"];
        if($connect->query($sql)) {
            header("Location: /admin/products.php");    
        } else {
            echo "Ошибка";
        }
    }
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
                                <input name="title" type="text" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" type="text" class="form-control" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-12">
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" type="text" class="form-control" placeholder="Content"></textarea>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-12">
                        <div class="form-group">
                            <label>Category</label>
                           <select class="form-control" name="cat_id">
                                <option value="0">Не выбрано</option>
                                <?php 
                                    $sql = "SELECT * FROM categories";
                                    $result = $connect->query($sql);
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
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