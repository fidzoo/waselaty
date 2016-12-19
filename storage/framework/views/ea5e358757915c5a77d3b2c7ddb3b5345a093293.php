<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name='keywords' content='توظيف, خدم, سائقين, قطر, خدمات, موقع'>
    <meta name='description' content='موقع وظائف وخدمات عامة ومنزلية، خدم، سائقين، طباخين، في قطر والخليج'>
    <meta name='subject' content='أول موقع لتقديم الخدمات في قطر'>
    <meta name='copyright' content='بواسطة شركة YISWEB'>
    <meta name='language' content='ar'>
    <meta name='robots' content='index,follow'>
    <meta name='Classification' content='Business'>
    <meta name='author' content='YISWeb, info@yisweb.com'>
    <meta name='designer' content='Kerlos Eskander'>
    <meta name='url' content='http://www.websiteaddrress.com'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <title>وسيلتي سر راحتي</title>
    <!-- CSS & Fonts -->
    <link rel="stylesheet" href='<?php echo asset("assets/css/bootstrap.min.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("assets/css/bootstrap-theme.min.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("assets/css/swiper.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("assets/css/jquery-ui.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("assets/css/style.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("assets/css/responsive.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("assets/css/animate.css"); ?>'>
    <link href='<?php echo asset("https://fonts.googleapis.com/css?family=Changa:400,700&subset=arabic"); ?>' rel="stylesheet">
    <!-- Scripts -->
    <script src='<?php echo asset("assets/js/jquery.js"); ?>'></script>
    <script src='<?php echo asset("assets/js/jquery-ui.js"); ?>'></script>
    <script src='<?php echo asset("assets/js/bootstrap.min.js"); ?>'></script>
    <script src='<?php echo asset("assets/js/wow.js"); ?>'></script>
    <script src='<?php echo asset("assets/js/scripts.js"); ?>'></script>
</head>

<body>
    <header>
        <div class="top-bar"></div>
        <nav>
            <div class="logo"><img src='<?php echo asset("assets/images/logo.jpg"); ?>' alt="Logo"></div>
            <div class="all-left">
                <div class="show-menu"> <a href="#"><h2><i class="fa fa-reorder"></i> إظهر القائمة</h2></a> </div>
                <div class="drop-nav">
                    <ul class="center-nav">
                        <li><a href="/">الرئيسية</a></li>
                        <li><a href="#">من نحن</a></li>
                        <li><a href="#">الخدمات</a></li>
                        <li><a href="#">إتصل بنا</a></li>
                    </ul>
                    <ul class="left-nav">
                        <li><a href='<?php echo URL::to("person-reg"); ?>'>تسجيل الأفراد</a></li>
                        <li><a href='<?php echo URL::to("register"); ?>'>تسجيل الشركات</a></li>
                        <li class="account"><a href='<?php echo URL::to("dash"); ?>'><i class="fa fa-user"></i>حسابي</a></li>
                        <li>
                            <select onchange="location = this.value ">
                                <option value="arabic" id="arabic" selected>العربية</option>
                                <option value="english" id="english">English</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="clearfix"></div>
        <div class="search-header">
            <form action="" method="">
                <select name="category" id="category">
                    <option value="-1" selected disabled>الأقسام</option>
                    <option value="all">الكل</option>
                    <?php foreach($mcat_ar as $id=>$mcat): ?>
                    <option value="<?php echo $id; ?>"><?php echo $mcat; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="job" id="job">
                    <option value="-1" selected disabled>الوظيفة</option>
                    <option value="all">الكل</option>
                    <?php foreach($cat_ar as $id=>$cat): ?>
                    <option value="<?php echo $id; ?>"><?php echo $cat; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="sex" id="sex">
                    <option value="-1" selected disabled>الجنس</option>
                    <option value="2">الكل</option>
                    <option value="0">ذكر</option>
                    <option value="1">أنثى</option>
                </select>
                <select name="country" id="country">
                    <option value="-1" selected disabled>البلد</option>
                    <option value="all">الكل</option>
                     <?php foreach($country_ar as $id=>$country): ?>
                    <option value="<?php echo $id; ?>"><?php echo $country; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="experience" id="experience">
                    <option value="-1" selected disabled>سنوات الخبرة</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6+</option>
                </select>
                <button value="Submit" id="">بحث متقدم <i class="fa fa-search"></i></button>
            </form>
        </div>
    </header>

        <?php echo $__env->yieldContent('content'); ?>

    <footer>
        <section id="social-media">
            <div class="container">
                <div class="row wow fadeIn" data-wow-delay=".4s" data-wow-duration="2s">
                    <h1>تواصل معنا على مواقع التواصل الإجتماعي</h1>
                    <div class="clearfix"></div>
                    <ul class="social-icons">
                        <a href="#" target="_blank">
                            <li class="wow bounceIn" data-wow-duration="1s" data-wow-iteration="100000"><i class="fa fa-facebook"></i></li>
                        </a>
                        <a href="#" target="_blank">
                            <li class="wow bounceIn" data-wow-duration="1s" data-wow-iteration="100000"><i class="fa fa-twitter"></i></li>
                        </a>
                        <a href="#" target="_blank">
                            <li class="wow bounceIn" data-wow-duration="1s" data-wow-iteration="100000"><i class="fa fa-youtube"></i></li>
                        </a>
                    </ul>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <h4>جميع الحقوق محفوظة  © 2016</h4> </div>
        </div>
    </footer>
</body>

</html>