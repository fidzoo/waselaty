<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta name='keywords' content='hiring, maids, drivers, qatar, services, website'>
    <meta name='description' content='website for hiring maids, drivers, chefs in qatar and gulf area'>
    <meta name='subject' content='first website to provide services in Qatar'>
    <meta name='copyright' content='Developed by YISWEB'>
    <meta name='language' content='ar'>
    <meta name='robots' content='index,follow'>
    <meta name='Classification' content='Business'>
    <meta name='author' content='YISWeb, info@yisweb.com'>
    <meta name='designer' content='Kerlos Eskander'>
    <meta name='url' content='http://www.websiteaddrress.com'>
    <meta name='identifier-URL' content='http://www.websiteaddress.com'>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="icon" type="image/png" sizes="96x53" href="assets/images/favicon-96x96.png">
    <title>Waselaty</title>
    <!-- CSS & Fonts -->
    <link rel="stylesheet" href='<?php echo asset("en-assets/css/bootstrap.min.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("en-assets/css/bootstrap-theme.min.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("en-assets/css/swiper.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("en-assets/css/jquery-ui.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("en-assets/css/style.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("en-assets/css/responsive.css"); ?>'>
    <link rel="stylesheet" href='<?php echo asset("en-assets/css/animate.css"); ?>'>
    <link href='<?php echo asset("https://fonts.googleapis.com/css?family=Changa:400,700&subset=arabic"); ?>' rel="stylesheet">
    <!-- Scripts -->
    <script src='<?php echo asset("en-assets/js/jquery.js"); ?>'></script>
    <script src='<?php echo asset("en-assets/js/jquery-ui.js"); ?>'></script>
    <script src='<?php echo asset("en-assets/js/bootstrap.min.js"); ?>'></script>
    <script src='<?php echo asset("en-assets/js/wow.js"); ?>'></script>
    <script src='<?php echo asset("en-assets/js/scripts.js"); ?>'></script>
</head>

<body>
    <header>
    
        <div class="top-bar"></div>
        
        <nav>
            <div class="logo" style="margin-right:0px;"><img src='<?php echo asset("assets/images/logo-en.jpg"); ?>' alt="Logo"></div>
            <div class="all-left">
                <div class="show-menu"> <a href="#"><h2><i class="fa fa-reorder"></i> Show menu</h2></a> </div>
                <div class="drop-nav">
                    <ul class="center-nav">
                        <li><a href="/">Home</a></li>
                        <!-- <li><a href="#">من نحن</a></li>-->
                        <li><a href="#">Services</a></li>
                       <li><a href="#">Contact us</a></li>
                    </ul>
                    <ul class="left-nav">
                    <?php if(Auth::guest()): ?>
                        <li><a href='<?php echo URL::to("person-reg"); ?>'>Person register</a></li>
                        <li><a href='<?php echo URL::to("register"); ?>'>Company register</a></li>
                        <li class="account"><a href='<?php echo URL::to("dash"); ?>'><i class="fa fa-user"></i>Login</a></li>
                    <?php else: ?>
                    <li class="account"><a href='<?php echo URL::to("jobs-edit"); ?>'><i class="fa fa-user"></i>My account</a></li>
                    <li class="account"><a href='<?php echo URL::to("logout"); ?>'><i class="fa fa-user"></i>Logout</a></li>
                    <?php endif; ?>
                        <li>
                            <select onchange="location = this.value ">
                                <option value="/../arabic" id="arabic">العربية</option>
                                <option value="/../english" id="english" selected>English</option>
                            </select>
                        </li>
                        <li><div id="google_translate_element"></div></li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="clearfix"></div>
        <div class="no-select search-header">
            <?php echo Form::open(["url"=>"search", "method"=>"get"]); ?>

                <select name="mcategory" id="mcategory" required>
                    <option value="-1" selected disabled>Sections</option>
                    <?php foreach($mcat_en as $id=>$mcat): ?>
                    <option value="<?php echo $id; ?>"><?php echo $mcat; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="category" id="category" required>
                    <option value="-1" selected disabled>Job</option>
                    <option value="all">All</option>
                </select>
                <select name="gender" id="gender" required>
                    <option value="-1" selected disabled>Gender</option>
                    <option value="all">Both</option>
                    <option value="0">Male</option>
                    <option value="1">Female</option>
                </select>
                <select name="country" id="country" required>
                    <option value="-1" selected disabled>Country</option>
                    <option value="all">All</option>
                     <?php foreach($country_en as $id=>$country): ?>
                    <option value="<?php echo $id; ?>"><?php echo $country; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="experience" id="experience" required>
                    <option value="-1" selected disabled>years of experience</option>
                    <option value="all">Undefined</option>
                    <option value="0">Less than 1 year</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6+</option>
                </select>
                <button value="Submit" id="">Search<i class="fa fa-search"></i></button>
            <?php echo Form::close(); ?>

        </div>
    </header>
            
            <?php if(Session::has('message')): ?>
            <div id="message" class='alert alert-success'>
                <p><h1> <?php echo Session::get('message'); ?> </h1></p> 
             </div>
             <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>

    <footer>
        <section id="social-media">
            <div class="container">
                <div class="row wow fadeIn" data-wow-delay=".4s" data-wow-duration="2s">
                    <h1>Join us on our social media pages</h1>
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
                        <a href="#" target="_blank">
                            <li class="wow bounceIn" data-wow-duration="1s" data-wow-iteration="100000"><i class="fa fa-instagram"></i></li>
                        </a>
                    </ul>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <!--Vistors counter code-->
                <h4><img src="http://hitwebcounter.com/counter/counter.php?page=6509660&style=0006&nbdigits=5&type=ip&initCount=0" title="Vistors Counter" Alt="Vistors Counter"   border="0" ></h4> 
            </div>
        </div>
    </footer>

    <!--script for the ajax menu-->
    <script type="text/javascript">
        $('#mcategory').on('change', function(e){
            //to print into browser console
            console.log(e);

            var cat_id= e.target.value;

            //ajax
            $.get('/ajax-subcat?cat_id=' + cat_id, function(data){
                //success data
                $('#category').empty();
                $.each(data, function(index, subcatObj){

                    $('#category').append('<option value="'+subcatObj.id+'">'+subcatObj.en_title+'</option>');
                });
            });
        });
    </script>
    <!--end of ajax script-->

    <!--Alert Messages Scripts -->
    <?php if(Session::has('reg_success')): ?>
    <script>
        alert("You registered successfully!");
    </script>
    <?php elseif(Session::has('pass-rest')): ?>
    <script>
        alert("Password reset done successfully!");
    </script>
    <?php endif; ?>

    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'hy', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>

</html>