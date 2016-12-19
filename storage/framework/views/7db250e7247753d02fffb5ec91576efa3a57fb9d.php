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
                    <h1 class="center-text">Register in the website</h1>
                </div>
                <ul class="jobs">
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="job-details">
                         <h3>Registration Terms</h3>
                         <p>Registration terms in the website Registration terms in the website Registration terms in the website Registration terms in the website Registration terms in the website Registration terms in the website
</p>
                         <hr>
                         <h3>Kindly fill the following fields to complete the registration</h3>
                         <div class="col-lg-12">
                         <form action="<?php echo e(url('/register')); ?>" method="POST" id="register">
                         <?php echo e(csrf_field()); ?>

                         <?php if(Session::has('reg_group')): ?>
                         <input type="hidden" name="user_group" value="person">
                         <?php else: ?>
                         <input type="hidden" name="user_group" value="company">
                         <?php endif; ?>
                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                             <input type="text" id="name" name="name" placeholder="User name">
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>   
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">                          
                             <input type="email" id="email" name="email" placeholder="E-mail" required>
                             <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <?php if(Session::has('reg_group')): ?>
                        <?php else: ?>
                             <input type="text" id="ar_company" name="ar_company" placeholder="Arabic Company Name" required>
                             <input type="text" id="en_company" name="en_company" placeholder="English Company Name" required>
                        <?php endif; ?>
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        
                             <input type="password" id="password" name="password" placeholder="Password" required>
                             <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                             <input id="password-confirm" type="password" name="password_confirmation" placeholder="Password Confirmation">
                             <?php if($errors->has('password_confirmation')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <div class="form-group<?php echo e($errors->has('mobile') ? ' has-error' : ''); ?>">

                             <div class="row">
                                 <div class="col-md-2 col-xs-2">
                                    <input type="text" name="mobile" placeholder="code" style="width: 100%;">
                                 </div>

                                 <div class="col-md-10 col-xs-10">
                                    <input id="mobile" type="text" name="mobile" placeholder="Enter Your Mobile">
                                 </div>
                             </div>

                             
                             <?php if($errors->has('mobile')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('mobile')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </div>
                        <?php if(Session::has('reg_group')): ?>
                        <?php else: ?>
                             <textarea name="ar_info" id="ar_info" placeholder="Arabic information about the company"></textarea>
                             <textarea name="en_info" id="en_info" placeholder="English information about the company"></textarea>
                        <?php endif; ?> 
                <button type="submit" value="Submit" id="reg">Register</button>
                </form>
                         </div>
                        </div>
                    </li>
                </ul>               
                <div class="clearfix"></div>
                
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('en.layouts.en-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>