<?php
require_once 'connectDB/config.php';
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
<br>
<br>
<br>
<br>
<!-- Page Content -->
<form action="" method="post">
    <div class="row container">
        <div class="col-md-5" style="margin-left: auto;margin-right: 40%">
            <div class="panel panel-success">
                <div class="panel-heading">فرم ورود به سایت</div>
                <div class="panel-body">
                    <?php
                    //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if(isset($_POST['login'])){
                        $username = $_POST['username'];
                        $password = $_POST['password'];
                        $query = mysqli_query($connection, "Select * From users where username='$username' and password='$password' and usertype='کاربر'");
                        if (mysqli_num_rows($query) >0) {
                            $_SESSION['admin']=$username;
                            header('Location:index.php');
                        } else {
                            echo '<div class="alert alert-danger">';
                            echo 'نام کاربری یا رمز عبور اشتباه می باشد';
                            echo '</div>';
                        }

                    }
                    ?>
                    <br>
                    <input type="text" name="username" class="form-control" placeholder="نام کاربری را وارد کنید">
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="رمز عبور را وارد کنید">
                    <br>
                    <input type="submit" name="login" value="ورود" class="btn btn-success" style="width: 100%">
                </div>
            </div>
        </div>
    </div>

</form>
<!-- /.container -->
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<?php include('./layout/footer.php') ?>