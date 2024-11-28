<?php
require_once '../connectDB/config.php';
if (isset($_GET['add-new-cat'])) {
    $catname = $_POST['catName'];
    $catSave = mysqli_query($connection, "Insert Into category(cat_name) values('$catname')");
    header('Location:Index.php?cats');
} else
    if (isset($_GET['delete-cat'])) {
        $cat_id = $_GET['delete-cat'];
        $catDelete = mysqli_query($connection, "Delete From category where id='$cat_id'");
        header('Location:Index.php?cats');
    } else
        if (isset($_GET['delete-product'])) {
            $product_id = $_GET['delete-product'];
            $productDelete = mysqli_query($connection, "Delete From products where id='$product_id'");
            header('Location:Index.php');
        } else
            if (isset($_GET['add-new-product'])) {
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $price = $_POST['price'];
                $cat = $_POST['cat'];
                $image = $_FILES['image']['name'];
                $upload='../uploads/' .basename($image);
                $title = $_POST['title'];
                $query = mysqli_query($connection, "Insert Into products(title,image,description,cat_id,price) values('$title','$image','$desc','$cat','$price')");
                move_uploaded_file($_FILES['image']['tmp_name'],$upload);
                header('Location:Index.php');
            }
?>

