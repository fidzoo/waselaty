<?php $__env->startSection('content'); ?>
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
                    <h3>Recent Added Jobs</h3>
                    <form class="pull-right" action='<?php echo URL::to("ser-sort"); ?>' method="GET">
                    <?php echo Form::hidden('mcategory', $mcategory); ?>

                    <?php echo Form::hidden('category', $category); ?>

                    <?php echo Form::hidden('gender', $gender); ?>

                    <?php echo Form::hidden('country', $country); ?>

                    <?php echo Form::hidden('experience', $experience); ?>

                    <select class="pull-right" name="order" id="order" onchange="this.form.submit();">
                        <option value="-1" disabled selected>Sort Jobs By:</option>
                        <option value="recent" id="recent">Recent Jobs</option>
                        <option value="old" id="old">Oldest Jobs</option>
                        <option value="most-exp" id="most-exp">Most Experience</option>
                        <option value="low-exp" id="low-exp">Less Experience</option>
                    </select>
                    </form>
                </div>
                <div class="clearfix"></div>
                <?php if(count($rank_search) == 0 && count($search) == 0): ?>
                <h2>Sorry, There Is No Results!</h2>
                <?php endif; ?>
                                <style type="text/css">
                                    .free p
                                    {
                                        position: absolute;
                                        z-index: 999999;
                                        bottom: 0;
                                        display: block;
                                        font-size: 20px;
                                        width: 48%;
                                        margin: 0px auto;
                                        right: 0;
                                    }
                                    .free p span {
                                        display: block;
                                        font-size: 9px;
                                        margin: 0;
                                        text-align: left;
                                        padding-right: 10px;
                                        font-weight: bold;
                                    }
                                </style>
                <ul class="jobs">
                <?php foreach($rank_search as $r_job): ?>
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img  src='<?php echo asset("$r_job->image"); ?>' alt="<?php echo $r_job->ar_title; ?>">
                        <div class="free hidden-sm  hidden-xs">
                            <a href='<?php echo URL::to("jobs/$r_job->id"); ?>'>
                                <img  src='<?php echo asset("$r_job->image"); ?>' data-zoom-image='<?php echo asset("$r_job->image"); ?>' alt="<?php echo $r_job->ar_title; ?>">
                                <p>
                                    <span><?php echo $r_job->en_name; ?></span>
                                    <span><?php echo $r_job->en_title; ?></span>
                                    <span>Experince: <?php if($r_job->experience == 6): ?> +  <?php endif; ?> <?php echo $r_job->experience; ?></span>
                                    <?php if($r_job->user->user_group == 'company'): ?>
                                    <span><?php echo $r_job->user->company->en_company; ?></span>
                                    <?php else: ?>
                                    <span>Add. Owner: <?php echo $r_job->user->name; ?></span>
                                    <?php endif; ?>
                                </p>

                            </a>
                        </div>
                            <div class="paid-strip">Premium</div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='<?php echo URL::to("jobs/$r_job->id"); ?>'>
                                <h2><?php echo $r_job->en_title; ?></h2>
                                <p><?php echo substr($r_job->en_descrip, 0, 250); ?>..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>Created at: <?php echo date("d/m",strtotime($r_job->created_at)); ?></li>
                                <li>Salary: <?php echo $r_job->salary; ?>&nbsp;<?php echo $r_job->en_currency; ?></li>
                                <li>Country: <?php echo $r_job->country->en_name; ?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                <?php endforeach; ?>
                <?php foreach($search as $job): ?>
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='<?php echo asset("$job->image"); ?>' alt="<?php echo $job->ar_title; ?>">

                        <div class="free hidden-sm  hidden-xs">
                            <a href='<?php echo URL::to("jobs/$job->id"); ?>'>
                                <img  src='<?php echo asset("$job->image"); ?>' data-zoom-image='<?php echo asset("$job->image"); ?>' alt="<?php echo $job->ar_title; ?>">
                                <p>
                                    <span><?php echo $job->en_name; ?></span>
                                    <span><?php echo $job->en_title; ?></span>
                                    <span>Experince: <?php if($job->experience == 6): ?> + <?php endif; ?> <?php echo $job->experience; ?></span>
                                    <?php if($job->user->user_group == 'company'): ?>
                                    <span><?php echo $job->user->company->en_company; ?></span>
                                    <?php else: ?>
                                    <span>Add. Owner: <?php echo $job->user->name; ?></span>
                                    <?php endif; ?>
                                </p>

                            </a>
                        </div>

                        </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='<?php echo URL::to("jobs/$job->id"); ?>'>
                                <h2><?php echo $job->en_title; ?></h2>
                                <p><?php echo substr($job->en_descrip, 0, 250); ?>..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>Created at: <?php echo date("d/m",strtotime($job->created_at)); ?></li>
                                <li>Salary: <?php echo $job->salary; ?>&nbsp;<?php echo $job->en_currency; ?></li>
                                <li>Country: <?php echo $job->country->en_name; ?></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                <?php endforeach; ?>
                </ul>
                <div class="col-lg-12">
                   <div class="contain-pager">
                    <ul class="pagination">
                        <?php echo $search->appends(Request::only(['mcategory', 'category', 'gender', 'country', 'experience', 'order']))->links(); ?>

                    </ul></div>
                    </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>