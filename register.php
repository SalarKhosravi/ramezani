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
<form method="post" action="">
    <div class="row container">
        <div class="col-md-5" style="margin-left: auto;margin-right: 40%">
            <div class="panel panel-success">
                <div class="panel-heading">عضویت در سایت</div>
                <div class="panel-body">
                    <?php
                    //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nameErr = $emailErr = $passErr = $repassErr= $telErr= $addressErr = "";
                    $name = $email = $pass = $repass= $tel= $address =$gender= "";

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["username"])) {
                            $nameErr = "نام کاربری را وارد کنید";
                        } else {
                            $username = test_input($_POST["username"]);
                        }

                        if (empty($_POST["password"])) {
                            $passErr = "رمز عبور را وارد کنید";
                        } else {
                            $password = test_input($_POST["password"]);
                        }

                        if (($_POST["password"]) != ($_POST["repassword"])) {
                            $repassErr = "رمز عبور با تکرار رمز عبور برابر نیست";
                        } else {
                            $password = test_input($_POST["password"]);
                        }

                        if (empty($_POST["tel"])) {
                            $telErr = "تلفن را وارد کنید";
                        } else {
                            $tel = test_input($_POST["tel"]);
                        }

                        if (empty($_POST["address"])) {
                            $addressErr = "آدرس را وارد کنید";
                        } else {
                            $address = test_input($_POST["address"]);
                        }

                        $gender=$_POST["gender"];

                        if (empty($_POST["email"])) {
                            $emailErr = "ایمیل را وارد کنید";
                        } else {
                            $email = test_input($_POST["email"]);

                            // check if e-mail address is well-formed
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $emailErr = "فرمت ایمیل صحیح نمی باشد";
                            }
                        }
                        if ((!empty($_POST["username"])) and (!empty($_POST["password"])) and (!empty($_POST["email"])) and (!empty($_POST["tel"])) and (!empty($_POST["address"])) and (filter_var($email, FILTER_VALIDATE_EMAIL))) {
                            $query = mysqli_query($connection, "Insert Into users(username,password,email,usertype,gender,tel,address) Values('$username','$password','$email','کاربر','$gender','$tel','$address')");
                            echo '<div class="alert alert-success">';
                            echo 'عضویت در سایت با موفقیت انجام شد';
                            echo '</div>';
                        }
                    }

                    function test_input($data)
                    {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    ?>
                    <br>
                    <input type="text" name="username" class="form-control" placeholder="نام کاربری را وارد کنید">
                    <span class="error">* <?php echo $nameErr; ?></span>
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="رمز عبور را وارد کنید">
                    <span class="error">* <?php echo $passErr; ?></span>
                    <br>
                    <input type="password" name="repassword" class="form-control"
                           placeholder="تکرار رمز عبور را وارد کنید">
                    <span class="error">* <?php echo $repassErr; ?></span>
                    <br>
                    <input type="text" name="email" class="form-control" placeholder="ایمیل را وارد کنید">
                    <span class="error">* <?php echo $emailErr; ?></span>
                    <br>
                    <select name="gender" class="form-control">
                        <option>جنسیت را انتخاب کنید</option>
                        <option>مرد</option>
                        <option>زن</option>
                    </select>
                        <br>
                        <input type="text" name="tel" class="form-control" placeholder="تلفن را وارد کنید">
                        <span class="error">* <?php echo $telErr; ?></span>
                        <br>
                        <input type="text" name="address" class="form-control" placeholder="آدرس را وارد کنید">
                        <span class="error">* <?php echo $addressErr; ?></span>
                        <br>
                        <input type="submit" name="submit" value="عضویت" class="btn btn-success" style="width: 100%">
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