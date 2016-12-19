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
                    <h1 class="center-text"><?php echo $job->ar_title; ?></h1>
                </div>
                <ul class="jobs">
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-4 col-md-4"><img src='<?php echo asset("$job->image"); ?>' alt="job-image"> </div>
                        <div class="col-lg-8 last col-md-8">
                            <ul class="details">
                                <li>تاريخ الإضافة: <?php echo $job->created_at; ?></li>
                                <li>الراتب: <?php echo $job->salary; ?>&nbsp;<?php echo $job->ar_currency; ?></li>
                                <li>الدولة: <?php echo $job->country->ar_name; ?></li>
                            </ul>
                            <ul class="details">
                                <li>نوع الوظيفة : <?php echo $job->categories[0]->ar_title; ?></li>
                                <li>سنوات الخبرة : <?php echo $job->experience; ?></li>
                                <li>الجنس : <?php echo $gender; ?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="job-details">
                         <h3>تفاصيل الوظيفة</h3>
                         <p><?php echo $job->ar_descrip; ?> 
</p>
                         <hr>
                         <h3>طرق التواصل</h3>
                         <h4>الهاتف : <?php echo $job->phone; ?></h4>
                         <h4>البريد الإلكتروني : <?php echo $job->email; ?></h4>
                        </div>
                    </li>
                </ul>               
                <div class="latest-order-bar comments">
                    <h3 class="center-text">التعليقات</h3>
                    <h2>التعليقات السابقة</h2>
                       <?php foreach($comments as $comment): ?>
                       <div class="acomment wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='<?php echo asset("assets/images/com_logo.png"); ?>' alt="comment"> </div>
                        <div class="col-lg-8 col-md-10">
                                <h2><?php echo $comment->ar_title; ?></h2>
                                <p><?php echo $comment->ar_body; ?></p>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        </div>
                        <?php endforeach; ?>
                    <h2>أضف تعليقك</h2>
                    <?php echo Form::open(["url"=>"comments/$job->id"]); ?>

                    <input type="test" name="title" placeholder="عنوان التعليق">
                    <textarea name="comment" id="comment" placeholder="أضف تعليقك هنا"></textarea>
                    <button value="submit" id="">إرسل تعليقك</button>
                    <?php echo Form::close(); ?>

                </div>
                <div class="clearfix"></div>
                <?php if(count($relate_jobs) !== 1): ?>
                <div class="latest-order-bar">
                    <h3 class="center-text">وظائف ذات صلة</h3>
                </div>
                <div class="clearfix"></div>
                <ul class="jobs">
                    <?php foreach($relate_jobs as $re_job): ?>
                    	<?php if($re_job->id == $job->id): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='<?php echo asset("$re_job->image"); ?>' alt="<?php echo $re_job->ar_title; ?>"> </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='<?php echo URL::to("jobs/$re_job->id"); ?>'>
                                <h2><?php echo $re_job->ar_title; ?></h2>
                                <p><?php echo substr($re_job->ar_descrip, 0, 250); ?>..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>تاريخ الإضافة: <?php echo date("d/m",strtotime($re_job->created_at)); ?></li>
                                <li>الراتب: <?php echo $re_job->salary; ?>&nbsp;<?php echo $re_job->ar_currency; ?></li>
                                <li>الدولة: <?php echo $re_job->country->ar_name; ?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>