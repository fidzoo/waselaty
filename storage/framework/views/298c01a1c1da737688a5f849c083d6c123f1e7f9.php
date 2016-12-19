 <?php $__env->startSection('content'); ?>
<div class="main-container">
    <div class="clearfix"></div>
    <div class="container">
        <div class="row">
            <aside class="col-lg-3 col-md-3 col-sm-3 col-XS-12">
                <div class="row">
                    <div class="banner-ad"> <a href='<?php echo URL::to( "http://$banner_up->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_up->en_image"); ?>' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="categories">
                        <div class="title">Dashboard</div>
                        <ul class="cats">
                            <li><a href='<?php echo URL::to("jobs-edit"); ?>'>My Jobs</a></li>
                            <li><a href='<?php echo URL::to("jobs/create"); ?>'>New Job</a></li>
                            <li><a href='<?php echo URL::to("adds-pay"); ?>'>Ads. Payment</a></li>
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


            <h3>Jobs Ads. List:</h3>
            <br>
            <div class="col-lg-9 col-md-9 col-sm-12 animated panel panel-default">

                <div class="panel-heading">
                    Ads.
                </div>
                <!-- /.panel-heading -->
                <div class="row">
                    <!-- /.panel-heading -->
                    <div class="panel-body col-md-12">
                        <div class="table-responsive table-bordered row">
                            <table class="table col-lg-12">
                                <!--
                <thead class="col-lg-12">
                    <tr>
                        <th>English Title</th>
                        <th>Arabic Title</th>
                    </tr>
                </thead>
-->
                                <tbody class="col-md-12 col-xs-12">
                                    <?php foreach($jobs as $job): ?>
                                    <tr style="display: block;width: 100%;border: 1px solid #dedede;overflow: hidden;">
                                        <td class="col-md-2 col-xs-12"><?php echo e($job->en_title); ?></td>
                                        <td class="col-md-2 col-xs-12"><?php echo e($job->ar_title); ?></td>
                                        <td class="col-md-2 col-xs-12"> <?php if($job->approved == 1): ?>Approved <?php elseif($job->approved == 2): ?> Rejected <?php else: ?> Pendeing <?php endif; ?>
                                        </td>
                                        <td class="col-md-2 col-xs-12"><?php echo $job->price->en_title; ?></td>
                                        <td class="col-md-2 col-xs-12"><?php if($job->expire_date > $current_time): ?> Still Valid 
                                        <?php elseif($job->expire_date == '0000-00-00 00:00:00'): ?> Pending
                                        <?php else: ?> Expired 
                                        <?php endif; ?>
                                        </td>
                                        <td class="col-md-1 col-xs-12"><?php echo Form::open(["url"=>"jobs/$job->id/edit", "method"=>"get"]); ?> <?php echo Form::submit('Edit', ['class'=>'btn']); ?> <?php echo Form::close(); ?></td>
                                        <td class="col-md-1 col-xs-12"><?php echo Form::open(["url"=>"jobs/$job->id", "method"=>"delete"]); ?> <?php echo Form::submit('Delete', ['class'=>'btn']); ?> <?php echo Form::close(); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>