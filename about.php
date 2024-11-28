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
                        فکر اولیه راه اندازی فروشگاه اینترنتی به سالهای 1390 بر می گردد و از سال ۹۰ مطالعات کارشناسی و تحلیل بازار فروش اینترنتی کشور انجام و نهایتا در سال 92 اولین گام اجرایی در مسیر راه اندازی فروشگاه اینترنتی برداشته شد. از مهمترین نقاط قوت این مجموعه در کنار هم قرار گرفتن تیمی با تجربه، شناخته شده و خبره در حوزه IT و تیمی برجسته در حوزه اقتصادی و مارکتینگ بود. این تیم پس از راه اندازی شرکت و در یک بازه زمانی تقریبا دو ساله وب سایت فروشگاه اینترنتی را در خرداد سال ۹۲ راه اندازی نمود.
                        </p>
                        <p>
                        استراتژی مدیران این فروشگاه از همان ابتدا خلق بیشترین مزیت برای مشتریان و تامین رضایت حداکثری آنها بود. آنها موفقیت خود را صرفا در گرو رضایت مشتریان خود می دانستند، زیرا آگاه بودند که در دنیای کنونی و با وسایل ارتباطی پیشرفته و گسترش شبکه های اجتماعی، رضایت مشتریان تنها برگ برنده آنها خواهد بود و لذا سعی نمودند بجای صرف بودجه های کلان برای تبلیغات، تمرکز و بودجه خود را صرف تامین حداکثر رضایت مشتریان کنند.
                        </p>
                        <p>
                        عرضه محصولات با کمترین قیمت و با کمترین حاشیه سود، عرضه محصولات مختلف با تنوع بالا در برندها، عرضه محصولات برندهای معتبر و شناخته شده با گارانتی های اصلی، ارسال سریع حتی در مورد کالاهای حجیم (نظیر یخچال های ساید بای ساید)، راه اندازی یک وب سایت با امکانات فنی کامل و کاربرپسند برای سهولت استفاده توسط مشتریان، روشهای ارسال متعدد برای انتخاب توسط مشتریان، سیستم هوشمند پیگیری سفارشات در کنار سایر امکانات منحصر به فردی که برای تامین رضایت مشتریان به مرور زمان توسط این فروشگاه ارائه خواهد شد، نشان دهنده رویکرد جدیدی در بین فروشگاه های اینترنتی می باشد.
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
<?php include('./layout/footer.php') ?>