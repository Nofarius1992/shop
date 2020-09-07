<?php 

    include $_SERVER['DOCUMENT_ROOT'] ."/configs/db.php";
    $page = "products";

    include $_SERVER['DOCUMENT_ROOT'] ."/admin/parts/header.php";

    if (isset($_POST["submit"])) {
        $sql =  "INSERT INTO `categories` (`title`) VALUES ('" . $_POST["title"] . "')";
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
                <h4 class="card-title">Add Category</h4>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Name Category</label>
                                <input name="title" type="text" class="form-control" placeholder="Title">
                            </div>
                        </div>
                    </div>
                     <button name="submit" value="1" type="submit" class="btn btn-successs btn-fill pull-right">Save</button>
                    <!-- <div class="clearfix"></div> -->
                </form>
            </div>
        </div>
    </div>
</div>