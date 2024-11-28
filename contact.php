<?php
require_once 'connectDB/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ارتباط با ما</title>

    <link href="css/bootstrap-rtl.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#" style="font-size: 17px;color: yellow">فروشگاه آنلاین آنلاین شاپ
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
                <li>
                    <form action="index.php" method="get">
                        <div class="input-group" style="margin-top: 11px">
                            <input type="text" name="search" class="form-control"
                                   placeholder="کالای خود را جستجو کن ...">
                            <button name="btnSearch" class="btn btn-primary btn-sm">جستجو</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<!-- Page Content -->
<div class="container">
    <br>
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
            <div class="row">
                <div class="card">
                    <div class="card-header alert-warning">درباره ما</div>
                    <div class="card-body">
                        <p>
                        دفتر مرکزی : تهران ، بزرگراه همت ، رسالت ، بلوار شهید مطهری ، خیابان عتیق ، ساختمان نسیم ، طبقه 3 ، واحد 5
                        </p>
                        <p>
                        تلفن : 02188663625
                        </p>
                        <p>
                        فکس : 02188663626
                        </p>
                        <p>
                        همراه : 09121234567
                        </p>
                        <p>
                        پست الکترونیک : onlineshop@yahoo.com
                        </p>
                        <p>
                        وب سایت : www.onlineshop.ir
                        </p>




                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
<br>
<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">تمامی حقوی مادی و معنوی این سایت در اختیار فروشگاه آنلاین می باشد
            &nbsp;&nbsp;&nbsp;
            <a href="https://instagram.com/onlineshop_golestan?utm_medium=copy_link" target="_blank"><img src="images/instagram.png"></a>
            &nbsp;&nbsp;
            <a href="https://api.whatsapp.com/send?phone=989905122127&text=%D8%B3%D9%84%D8%A7%D9%85" target="_blank"><img src="images/whatsapp.png"></a>
        </p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
