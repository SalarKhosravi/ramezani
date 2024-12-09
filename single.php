<?php require_once 'connectDB/config.php';
$id = $_GET['id'];
$productQuery = mysqli_query($connection, "Select * From products where id='$id'");
$productRow = mysqli_fetch_array($productQuery);
/*echo '<pre>';
print_r($productRow);*/
?>

<?php include('./layout/header.php') ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#" style="font-size: 17px;color: yellow">فروشگاه آنلاین شاپ
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Admin/index.php">پنل مدیریت</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">فروشگاه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">مشاهده سبد خرید</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="myOrders.php">سفارشات من</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">عضویت</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">ارتباط با ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">درباره ما</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <div class="card alert-success"><h1 class="my-4 text-center"> دسته بندی محصولات</h1></div>
            <div class="list-group">
                <?php
                $catQuery = mysqli_query($connection, "Select * From category");
                while ($catRow = mysqli_fetch_array($catQuery)):
                    ?><a href="index.php?cat=<?php echo $catRow['id'] ?>"
                         class="list-group-item"><?php echo $catRow['cat_name'] ?></a>
                <?php endwhile; ?>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">
                <img class="card-img-top img-fluid" src="uploads/<?php echo $productRow['image'] ?>" alt=""
                     style="display: block;width: 40%;margin-right: auto;margin-left: auto;margin-top: 10px;">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $productRow['title'] ?></h3>
                    <br>
                    <h3><?php echo number_format($productRow['price']) ?> تومان</h3>
                    <br>
                    <p class="card-text">
                        <?php echo $productRow['description'] ?>
                    </p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-lg">افزودن به سبد خرید</a>
                    </a>
                </div>
            </div>
            <!-- /.card -->

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    توضیحات محصول
                </div>
                <div class="card-body">
                </div>
            </div>
            <!-- /.card -->

            <div class="comments">
                <form>
                    <div class="form-group">
                        <label for="name">نام و نام خانوادگی :</label>
                        <input class="form-control" type="text" placeholder="نام و نام خانوادگی را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label for="email">ایمیل :</label>
                        <input class="form-control" type="text" placeholder="ایمیل را وارد کنید">
                    </div>


                    <div class="form-group">
                        <label for="commentarea">دیدگاه :</label>
                        <textarea class="form-control" name="comment"></textarea>

                    </div>


                    <input class="btn btn-primary btn-lg" type="Submit" name="submit" value="ارسال نظرات">
                    <br>
                    <br>

                </form>
            </div>
        </div>
        <!-- /.col-lg-9 -->

    </div>

</div>
<!-- /.container -->

<?php include('./layout/footer.php') ?>
