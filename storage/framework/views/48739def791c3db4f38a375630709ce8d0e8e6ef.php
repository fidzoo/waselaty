<?php $__env->startSection('content'); ?>

<style type="text/css">
    
    li.mapp iframe
    {
        width: 516px !important;
        height: 300px !important;
    }
</style>

    <div class="main-container">
        <div class="clearfix"></div>
        <div class="container">
            <aside class="col-lg-3 col-md-3 col-sm-3">
                <div class="row">
                    <div class="banner-ad"> <a href='<?php echo URL::to( "http://$banner_up->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_up->en_image"); ?>' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="categories">
                        <div class="title">Sections</div>
                        <ul class="cats">
                        <?php foreach($mcat_en as $id=>$mcat): ?>
                            <li><a href='<?php echo URL::to("mcategory/$id"); ?>'><?php echo $mcat; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="banner-ad"> <a href='<?php echo URL::to( "http://$banner_mid->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_mid->en_image"); ?>' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="jobs">
                        <div class="title">Jobs</div>
                        <ul class="cats">
                        <?php foreach($cat_en as $id=>$cat): ?>
                            <li><a href='<?php echo URL::to("categories/$id"); ?>'><?php echo $cat; ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="banner-ad"> <a href='<?php echo URL::to( "http://$banner_down->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_down->en_image"); ?>' alt=""> </a></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </aside>
            <div class="content col-lg-9 col-md-9 col-sm-9">
                <div class="latest-order-bar">
                    <h1 class="center-text"><?php echo $job->en_title; ?></h1>
                </div>
                <ul class="jobs">
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-4 col-md-4">
                        <img id="zoom_01"  src='<?php echo asset("$job->image"); ?>' data-zoom-image='<?php echo asset("$job->image"); ?>' alt="job-image">
                         </div>
                        <div class="col-lg-8 last col-md-8">
                            <ul class="details">
                                <li>Created at: <?php echo $job->created_at; ?></li>
                                <li>Salary: <?php echo $job->salary; ?>&nbsp;<?php echo $job->en_currency; ?></li>
                                <li>Country: <?php echo $job->country->en_name; ?></li>
                            </ul>
                            <ul class="details">
                                <li>Job Title : <?php echo $job->categories[0]->en_title; ?></li>
                                <li>Experience years : <?php if($job->experience == 6): ?> More than <?php endif; ?> <?php echo $job->experience; ?></li>
                                <li>Gender : <?php echo $gender; ?></li>
                                <?php if($job_owner->user_group == 'company'): ?>
                                <li>Company : <?php echo $job_owner->company->en_company; ?></li>
                                <?php endif; ?>
                                <li>Tel. : <?php echo $job->phone; ?></li>
                                <li class="mapp">Location : <?php echo $job->map; ?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="job-details">
                         <h3>Job Details</h3>
                         <p><?php echo $job->en_descrip; ?> 
</p>
                         <hr>
                         <h3>Other Contacts</h3>
                         <h4>Mobile : <?php echo $job->mobile; ?></h4>
                         <h4>E-mail : <?php echo $job->email; ?></h4>
                        </div>
                    </li>
                </ul>               
                <div class="latest-order-bar comments">
                    <h3 class="center-text">Comments</h3>
                    <h2>Previous Comments</h2>
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
                    <h2>Send Comment</h2>
                    <?php echo Form::open(["url"=>"comments/$job->id"]); ?>

                    <input type="test" name="title" placeholder="Comment Title">
                    <textarea name="comment" id="comment" placeholder="Add your comment here"></textarea>
                    <button value="submit" id="">Send your comment</button>
                    <?php echo Form::close(); ?>

                </div>
                <div class="clearfix"></div>
                <?php if(count($relate_jobs) !== 1): ?>
                <div class="latest-order-bar">
                    <h3 class="center-text">Related Jobs</h3>
                </div>
                <div class="clearfix"></div>
                <ul class="jobs">
                    <?php foreach($relate_jobs as $re_job): ?>
                    	<?php if($re_job->id == $job->id): ?>
                            <?php continue; ?>
                        <?php endif; ?>
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2">
                        <a href='<?php echo URL::to("jobs/$re_job->id"); ?>'>
                        <img class='zoom_01' src='<?php echo asset("$re_job->image"); ?>' data-zoom-image='<?php echo asset("$re_job->image"); ?>' alt="<?php echo $re_job->ar_title; ?>"> </a></div>
                        <div class="col-lg-8 col-md-8">
                            <a href='<?php echo URL::to("jobs/$re_job->id"); ?>'>
                                <h2><?php echo $re_job->en_title; ?></h2>
                                <p><?php echo substr($re_job->en_descrip, 0, 250); ?>..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>Created at: <?php echo date("d/m",strtotime($re_job->created_at)); ?></li>
                                <li>Salary: <?php echo $re_job->salary; ?>&nbsp;<?php echo $re_job->en_currency; ?></li>
                                <li>Country: <?php echo $re_job->country->en_name; ?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php echo $relate_jobs->links(); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>