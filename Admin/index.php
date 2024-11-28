<?php
require_once '../connectDB/config.php';
if(!isset($_SESSION['admin']))
    header('Location:../admin/login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل مدیریت فروشگاه</title>
    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>


</head>
<body>
<nav class="nav top-bar">
    <h3 class="text-center" style="margin-right: 32px;margin-top: 15px;">پنل مدیریت فروشگاه</h3>
</nav>

<div class="container-fluid">
    <div class="row admin-panel ">
        <div class="col-2">
            <div class="list-item float-right">
                <a href="index.php"><i class="glyphicon glyphicon-dashboard"></i> پیشخوان</a>
                <a href="../"><i class="glyphicon glyphicon-shopping-cart"></i> مشاهده فروشگاه</a>
                <a href="index.php?add-new-product"><i class="glyphicon glyphicon-plus"></i> محصول جدید</a>
                <a href="index.php?orders"><i class="glyphicon glyphicon-pencil"></i> سفارشات</a>
                <a href="index.php?cats"><i class="glyphicon glyphicon-list"></i> دسته بندی ها</a>
                <a href="logout.php"><i class="glyphicon glyphicon-remove"></i> خروج</a>
            </div>
        </div>
        <div class="col-10 text-right">
            <?php
            if (isset($_GET['cats'])) {
                require_once 'cats.php';
            } elseif (isset($_GET['add-new-product'])) {
                require_once 'add-new-product.php';
            } elseif (isset($_GET['orders'])) {
                require_once 'orders.php';
            } elseif (isset($_GET['orderDT?trackCode'])) {
                require_once 'orderDT.php';
            } else {
                require_once 'index.php';
                ?>
                <div class="card mb-3">
                    <div class="card-header text-right">
                        لیست محصولات
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table float-right" style="direction: rtl">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>تصویر</th>
                                    <th>نام محصول</th>
                                    <th>دسته بندی</th>
                                    <th>قیمت-تومان</th>
                                    <th>مشاهده</th>
                                    <th>حذف</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                $product_query = mysqli_query($connection, "Select * From products");
                                while ($product_row = mysqli_fetch_array($product_query)):
                                    $cat_id = $product_row['cat_id'];
                                    $cat_query = mysqli_query($connection, "Select * From category where id='$cat_id'");
                                    $cat_row = mysqli_fetch_array($cat_query);
                                    ?>
                                    <tr>
                                        <td><?php echo $num++ ?></td>
                                        <td><img src="../uploads/<?php echo $product_row['image'] ?>" width="80px"></td>
                                        <td><?php echo $product_row['title'] ?></td>
                                        <td><?php echo $cat_row['cat_name'] ?></td>
                                        <td><?php echo number_format($product_row['price']) ?></td>
                                        <td><a href="../single.php?id=<?php echo $product_row['id'] ?>"
                                               class="btn btn-primary">مشاهده</a></td>
                                        <td>
                                            <a href="actions.php?delete-product=<?php echo $product_row['id'] ?>"
                                               class="btn btn-danger">حذف</a>
                                        </td>
                                    </tr>
                                <?php
                                endwhile;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- table list -->
            <?php } ?>

        </div>
    </div>
</div>

</body>
</html>