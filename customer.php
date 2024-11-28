<?php
require_once 'connectDB/config.php';
?>
<?php include('./layout/header.php') ?>

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
                                   placeholder="متن جستجو را وارد کنید ...">
                            <button name="btnSearch" class="btn btn-primary btn-sm">جستجو</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
<br>
<div class="row">
    <div class="col-md-6 col-lg-offset-6" style="margin-right: auto;margin-left: auto">
        <div class="panel panel-info">
            <div class="panel-heading">فرم مشخصات مشتری</div>
            <div class="panel-body">
                <?php
                $code = rand(10000000, 99999999);
                if(isset($_POST['saveOrder']))
                {
                    echo '<div class="alert alert-success">';
                    echo 'ثبت سفارشات شما با موفقیت انجام شد';
                    echo ' - ';
                    echo 'کد رهگیری شما : ';
                    echo $code;
                    echo '</div>';
                }
                ?>
                <form action="" method="post">
                <input type="text" name="customer" class="form-control" placeholder="نام و نام خانوادگی را وارد کنید" style="margin-bottom:8px;">
                <input type="text" name="tel" class="form-control" placeholder="تلفن تماس را وارد کنید" style="margin-bottom:8px;">
                <input type="text" name="address" class="form-control" placeholder="آدرس پستی را وارد کنید" style="margin-bottom:8px;">

                    <input type="submit" name="saveOrder" class="btn btn-success" value="تایید نهایی سفارش" style="width: 100%;height: 40px;">
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$num = 1;
$sumprice=0;
$session = $_SESSION;
$cart = [];
foreach ($session as $keySession => $value) {
    if (substr($keySession, 0, 5) == 'cart_') {
        $cart[$keySession] = $value;
    }
}

foreach ($cart as $item => $values):
    $sumprice+=$values['price'];
endforeach;

if (isset($_POST['saveOrder'])) {

    $customer=$_POST['customer'];
    $tel=$_POST['tel'];
    $address=$_POST['address'];

    $query = mysqli_query($connection, "Insert Into orders(customer,tel,address,priceCol,dateOrder,status,trackCode) values('$customer','$tel','$address','$sumprice','1400/08/30','پرداخت شده','$code')");
    foreach ($cart as $item => $values):
        {
            $productDT = $values['name'];
            $quantityDT = $values['quantity'];
            $priceDT = $values['price']/ $values['quantity'];
            $totalDT = $values['price'] ;
            $trackCodeDT = $code;
            $image = $values['image'];
            $queryDT = mysqli_query($connection, "Insert Into orderdetails(nameProduct,quantity,price,total,trackCode,image) values('$productDT','$quantityDT','$priceDT','$totalDT','$trackCodeDT','$image')");
        }
    endforeach;

}
?>



<div class="row">
    <div class="col-md-6 col-lg-offset-6" style="margin-right: auto;margin-left: auto">

        <table class="table">
            <tr>
                <td><h3 style="color: orangered">جمع کل سفارش : </h3></td>
                <td style="color: dodgerblue"><?php echo number_format($sumprice); ?> تومان</td>

            </tr>
        </table>

    </div>
</div>


<?php include('./layout/footer.php') ?>
