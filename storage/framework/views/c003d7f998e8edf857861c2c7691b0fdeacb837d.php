<?php $__env->startSection('content'); ?>
    <div class="main-container">
        <div class="clearfix"></div>
        <div class="container">
            <aside class="col-lg-3 col-md-3 col-sm-3">
                <div class="row">
                    <div class="banner-ad"> <a href='<?php echo URL::to( "http://$banner_up->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_up->ar_image"); ?>' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="categories">
                        <div class="title">الأقسام</div>
                        <ul class="cats">
                        <?php foreach($mcat_ar as $id=>$mcat): ?>
                            <li><a href='<?php echo URL::to("mcategory/$id"); ?>'><?php echo $mcat; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="banner-ad"> <a href='<?php echo URL::to( "http://$banner_mid->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_mid->ar_image"); ?>' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="jobs">
                        <div class="title">الوظائف</div>
                        <ul class="cats">
                        <?php foreach($cat_ar as $id=>$cat): ?>
                            <li><a href='<?php echo URL::to("categories/$id"); ?>'><?php echo $cat; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="banner-ad"> <a href='<?php echo URL::to( "http://$banner_down->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_down->ar_image"); ?>' alt=""> </a></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </aside>
            <div class="content col-lg-9 col-md-9 col-sm-9">
                <div class="latest-order-bar">
                    <h3>أحدث الوظائف المٌضافة</h3>
                    <select class="pull-right" name="order" id="order">
                        <option value="-1" selected disabled>رتب الوظائف حسب</option>
                        <option value="1">أحدث الوظائف</option>
                        <option value="2">أقدم الوظائف</option>
                        <option value="3">الأكثر خبرة</option>
                        <option value="4">الأقل خبرة</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <ul class="jobs">
                <?php foreach($rank_jobs as $r_job): ?>
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='<?php echo asset("$r_job->image"); ?>' alt="<?php echo $r_job->ar_title; ?>">
                            <div class="paid-strip">إعلان مميز</div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='<?php echo URL::to("jobs/$r_job->id"); ?>'>
                                <h2><?php echo $r_job->ar_title; ?></h2>
                                <p><?php echo substr($r_job->ar_descrip, 0, 250); ?>..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>تاريخ الإضافة: <?php echo date("d/m",strtotime($r_job->created_at)); ?></li>
                                <li>الراتب: <?php echo $r_job->salary; ?>&nbsp;<?php echo $r_job->ar_currency; ?></li>
                                <li>الدولة: <?php echo $r_job->country->ar_name; ?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                <?php endforeach; ?>
                <?php foreach($jobs as $job): ?>
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='<?php echo asset("$job->image"); ?>' alt="<?php echo $job->ar_title; ?>">
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='<?php echo URL::to("jobs/$job->id"); ?>'>
                                <h2><?php echo $job->ar_title; ?></h2>
                                <p><?php echo substr($job->ar_descrip, 0, 250); ?>..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>تاريخ الإضافة: <?php echo date("d/m",strtotime($job->created_at)); ?></li>
                                <li>الراتب: <?php echo $job->salary; ?>&nbsp;<?php echo $job->ar_currency; ?></li>
                                <li>الدولة: <?php echo $job->country->ar_name; ?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                <?php endforeach; ?>
                </ul>
                <div class="col-lg-12">
                   <div class="contain-pager">
                    <ul class="pagination">
                        <?php echo $jobs->links(); ?>

                    </ul></div>
                    </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>