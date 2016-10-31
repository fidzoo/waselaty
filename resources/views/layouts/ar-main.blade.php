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
    <link rel="icon" type="image/png" sizes="96x53" href="assets/images/favicon-96x96.png">
    <title>وسيلتي</title>
    <!-- CSS & Fonts -->
    <link rel="stylesheet" href='{!! asset("assets/css/bootstrap.min.css") !!}'>
    <link rel="stylesheet" href='{!! asset("assets/css/bootstrap-theme.min.css") !!}'>
    <link rel="stylesheet" href='{!! asset("assets/css/swiper.css") !!}'>
    <link rel="stylesheet" href='{!! asset("assets/css/jquery-ui.css") !!}'>
    <link rel="stylesheet" href='{!! asset("assets/css/style.css") !!}'>
    <link rel="stylesheet" href='{!! asset("assets/css/responsive.css") !!}'>
    <link rel="stylesheet" href='{!! asset("assets/css/animate.css") !!}'>
    <link href='{!! asset("https://fonts.googleapis.com/css?family=Changa:400,700&subset=arabic") !!}' rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amiri" rel="stylesheet">


    <!-- Scripts -->
    <script src='{!! asset("assets/js/jquery.js") !!}'></script>
    <script src='{!! asset("assets/js/jquery-ui.js") !!}'></script>
    <script src='{!! asset("assets/js/bootstrap.min.js") !!}'></script>
    <script src='{!! asset("assets/js/wow.js") !!}'></script>
    <script src='{!! asset("assets/js/scripts.js") !!}'></script>
</head>

<body>
    <header>
    
        <div class="top-bar"></div>
        
        <nav>
            <div class="logo"><img src='{!! asset("assets/images/logo.jpg") !!}' alt="Logo"></div>
            <div class="all-left">
                <div class="show-menu"> <a href="#"><h2><i class="fa fa-reorder"></i> إظهر القائمة</h2></a> </div>
                <div class="drop-nav">
                    <ul class="center-nav">
                        <li><a href="/">الرئيسية</a></li>
                        <!-- <li><a href="#">من نحن</a></li>-->
                        <li><a href="#">الخدمات</a></li>
                       <li><a href="#">إتصل بنا</a></li>
                    </ul>
                    <ul class="left-nav">
                    @if (Auth::guest())
                        <li><a href='{!! URL::to("person-reg") !!}'>تسجيل الأفراد</a></li>
                        <li><a href='{!! URL::to("register") !!}'>تسجيل الشركات</a></li>
                        <li class="account"><a href='{!! URL::to("dash") !!}'><i class="fa fa-user"></i>حسابي</a></li>
                    @else
                    <li class="account"><a href='{!! URL::to("jobs-edit") !!}'><i class="fa fa-user"></i>حسابي</a></li>
                    <li class="account"><a href='{!! URL::to("logout") !!}'><i class="fa fa-user"></i>تسجيل الخروج</a></li>
                    @endif
                        <li>
                            <select onchange="location = this.value ">
                                <option value="/../arabic" id="arabic" selected>العربية</option>
                                <option value="/../english" id="english">English</option>
                            </select>
                        </li>
                        <li><div id="google_translate_element"></div></li>

                    </ul>
                </div>
            </div>
        </nav>
        <div class="clearfix"></div>
        <div class="no-select search-header">
            {!! Form::open(["url"=>"search", "method"=>"get"]) !!}
                <select name="mcategory" id="mcategory" required>
                    <option value="-1" selected disabled>الأقسام</option>
                    @foreach($mcat_ar as $id=>$mcat)
                    <option value="{!!$id!!}">{!!$mcat!!}</option>
                    @endforeach
                </select>
                <select name="category" id="category" required>
                    <option value="-1" selected disabled>الوظيفة</option>
                    <option value="all">الكل</option>
                </select>
                <select name="gender" id="gender" required>
                    <option value="-1" selected disabled>الجنس</option>
                    <option value="all">الكل</option>
                    <option value="0">ذكر</option>
                    <option value="1">أنثى</option>
                </select>
                <select name="country" id="country" required>
                    <option value="-1" selected disabled>البلد</option>
                    <option value="all">الكل</option>
                     @foreach($country_ar as $id=>$country)
                    <option value="{!!$id!!}">{!!$country!!}</option>
                    @endforeach
                </select>
                <select name="experience" id="experience" required>
                    <option value="-1" selected disabled>سنوات الخبرة</option>
                    <option value="all">غير محددة</option>
                    <option value="0">أقل من سنة</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6+</option>
                </select>
                <button value="Submit" id="">بحث<i class="fa fa-search"></i></button>
            {!! Form::close() !!}
        </div>
    </header>
            
            @if (Session::has('message'))
            <div id="message" class='alert alert-success'>
                <p><h1> {!! Session::get('message') !!} </h1></p> 
             </div>
             @endif

        @yield('content')

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

                    $('#category').append('<option value="'+subcatObj.id+'">'+subcatObj.ar_title+'</option>');
                });
            });
        });
    </script>
    <!--Alert Messages Scripts -->
    @if (Session::has('reg_success'))
    <script>
        alert("تم التسجيل بنجاح!");
    </script>
    @elseif (Session::has('pass-rest'))
    <script>
        alert("تمت إعادة التعيين بنجاح!");
    </script>
    @endif

    <!--Google translation scripts-->
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'hy', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<!--End of Google translation scripts-->
</body>

</html>