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

			<h3>الإعلانات:</h3><br>
			<div class="panel panel-default">
			    <div class="panel-heading">
			        الإعلانات
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
			        <div class="table-responsive table-bordered">
			            <table class="table">
			                <thead>
			                    <tr>
			                        <th>الإعلان</th>
			                        <th>الإعلان</th>
			                        <th>موافقة الإدارة</th>
			                        <th>نوع الإعلان</th>
			                        <th>تم الدفع</th>
			                    </tr>
			                </thead>
			                <tbody>
			                    <?php foreach($jobs as $job): ?>
			                    <tr>
			                        <td><?php echo $job->ar_title; ?></td>
			                        <td><?php echo $job->en_title; ?></td>
			                        <td><?php if($job->approved == 1): ?>
                        			<center><?php echo HTML::image("assets/images/checkmark.ico"); ?></center>
                        			<?php elseif($job->approved == 2): ?> <center><?php echo HTML::image("assets/images/x-mark.ico"); ?></center>
                        			<?php else: ?> <center><?php echo HTML::image("assets/images/warning.ico"); ?></center>
                        			<?php endif; ?></td>
			                        <td><?php if($job->add_rank == 0): ?>غير مميز
                        				<?php elseif($job->add_rank == 1): ?>إعلان مميز
                        				<?php endif; ?></td>
			                        <td><?php if($job->payment == 1): ?>
			                        <center><?php echo HTML::image("assets/images/banknotes-24.ico"); ?></center>
			                        <?php elseif($job->payment == 2): ?> <center><?php echo HTML::image("assets/images/paypal-3-32.ico"); ?></center>
			                        <?php else: ?> <center><?php echo HTML::image("assets/images/warning.ico"); ?></center>
			                        <?php endif; ?></td>
			                        <?php if($job->payment == 0): ?>
			                        <td><form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="payment@waselti.com">
									<input type="hidden" name="lc" value="QA">
									<?php if($job->add_rank == 0): ?>
									<input type="hidden" name="item_name" value="<?php echo $prices[0]->en_item; ?>">
									<input type="hidden" name="item_number" value="1">
									<input type="hidden" name="amount" value="<?php echo $prices[0]->paypal_price; ?>">
									<input type="hidden" name="currency_code" value="<?php echo $prices[0]->paypal_currency; ?>">
									<?php elseif($job->add_rank == 1): ?>
									<input type="hidden" name="item_name" value="<?php echo $prices[1]->en_item; ?>">
									<input type="hidden" name="item_number" value="1">
									<input type="hidden" name="amount" value="<?php echo $prices[1]->paypal_price; ?>">
									<input type="hidden" name="currency_code" value="<?php echo $prices[1]->paypal_currency; ?>">		
									<?php endif; ?>
									<input type="hidden" name="button_subtype" value="services">
									<input type="hidden" name="no_note" value="0">
									<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_SM.gif:NonHostedGuest">
									<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
									<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
									</form>
									</td>
									<?php endif; ?>
			                    </tr>
			                    <?php endforeach; ?>
			                </tbody>
			            </table>
			        </div>
			    </div>
			</div> 
			           	
    	</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>