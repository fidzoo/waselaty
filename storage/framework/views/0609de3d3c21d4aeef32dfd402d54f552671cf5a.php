<?php $__env->startSection('content'); ?>
    <div class="main-container">
        <div class="clearfix"></div>
        <section id="slider">
            <!--Slider OLD 
    <div class="swiper-container" dir="rtl">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="images/main-slider.jpg" alt="main-slider-one"></div>
            <div class="swiper-slide"><img src="images/main-slider.jpg" alt="main-slider-one"></div>
        </div>
        <div style="display:none" class="swiper-pagination"></div>
        <div style="display:none" class="swiper-button-prev"></div>
        <div style="display:none" class="swiper-button-next"></div>
    </div>
    -->
            <div class="slider-content">
                <div class="container">
                    <h1 class="wow fadeInDown" data-wow-delay=".2s" data-wow-duration="2s">أول موقع لتقديم الخدمات في قطر والخليج</h1>
                    <h4 class="wow fadeInUp" data-wow-delay=".4s" data-wow-duration="2s">ساعدنا أكثر من  <span><?php echo $jobs_count; ?></span>  شخص في الحصول على وظيفة العمر</h4>
                    <div class="clearfix"></div>
                    <a href='<?php echo URL::to( "http://$banner_up->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_up->ar_image"); ?>' alt="advertise-here"></a>
                    <div class="clearfix"></div>
                    <div class="cats-ads">
                        <div class="services-jobs">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 wow fadeIn" data-wow-delay=".6s" data-wow-duration="2s">
                                    <div class="cat"> <img src='<?php echo asset("assets/images/services.png"); ?>' alt="وظائف خدمية"> </div> <a href='<?php echo URL::to("mcategory/1"); ?>'><h2>وظائف خدمية</h2></a> </div>
                                <div class="col-sm-4 col-xs-12 wow fadeIn" data-wow-delay=".6s" data-wow-duration="2s">
                                    <div class="ad">
                                        <a href='<?php echo URL::to( "http://$banner_mid->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_mid->ar_image"); ?>' alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 wow fadeIn" data-wow-delay=".6s" data-wow-duration="2s">
                                    <div class="cat"> <img src='<?php echo asset("assets/images/services.png"); ?>' alt="Services Jobs"> </div>
                                    <a href='<?php echo URL::to("mcategory/1"); ?>'>
                                        <h2>Services Jobs</h2> </a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="profession-jobs">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12 wow fadeIn" data-wow-delay=".2s" data-wow-duration="2s">
                                    <div class="cat"> <img src='<?php echo asset("assets/images/profession.png"); ?>' alt="وظائف مهنية"> </div> <a href='<?php echo URL::to("mcategory/2"); ?>'><h2>وظائف مهنية</h2></a> </div>
                                <div class="col-sm-4 col-xs-12 wow fadeIn" data-wow-delay=".2s" data-wow-duration="2s">
                                    <div class="ad">
                                        <a href='<?php echo URL::to( "http://$banner_down->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_down->ar_image"); ?>' alt=""></a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12 wow fadeIn" data-wow-delay=".2s" data-wow-duration="2s">
                                    <div class="cat"> <img src='<?php echo asset("assets/images/profession.png"); ?>' alt="Profession Jobs"> </div>
                                    <a href='<?php echo URL::to("mcategory/2"); ?>'>
                                        <h2>Profession Jobs</h2></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <section id="no-responsible">
            <div class="container">
                <div class="row wow zoomIn" data-wow-delay=".2s" data-wow-duration="2s">
                    <h1>الموقع غير متحمل لاى مسؤلية قانونية</h1>
                    <h3>الموقع لا يتحمل أي مسؤولية قانونية في التعامل مع الأشخاص وتوظيفهم في أي وقت ومن حيث نخلي
مسؤوليتنا عن تعرض أي شخص لأي حالة نصب أو التعامل مع شخص قد يكون له سجل إجرامي أو ما شابه</h3> </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
    </div>


<style type="text/css">
        section#slider.class1 {
  background-image: url(assets/images/main-slider2.jpg); }

section#slider.class2 {
  background-image: url(assets/images/main-slider.jpg); }

section#slider.class3 {
  background-image: url(assets/images/main-slider2.jpg); }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>