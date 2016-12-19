<?php $__env->startSection('content'); ?>
<div class="main-container">
	    <div class="clearfix"></div>
        <div class="container">
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


<?php if(count($errors) > 0): ?>
	<div class="alert alert-danger">
        <ul>
        <?php foreach($errors->all() as $error): ?>
        	<li><?php echo e($error); ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<h3>Edit Job Ad.:</h3><br>
<div class="content col-lg-9 col-md-9 col-sm-12 animated panel panel-default">
<?php echo Form::open(["url"=>"jobs/$job->id", "files"=>true, "method"=>"patch", "class"=>"form-group", "id"=>"register"]); ?>

<?php echo Form::label('Arabic Title'); ?><br>
<?php echo Form::text('ar_title', $job->ar_title, ['class'=>'form-control']); ?><br>
<?php echo Form::label('English Title'); ?><br>
<?php echo Form::text('en_title', $job->en_title, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Person Name in Arabic- Not more than 15 characters'); ?><br>
<?php echo Form::text('ar_name', $job->ar_name, ['maxlength'=>'15', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Person Name in English- Not more than 15 characters'); ?><br>
<?php echo Form::text('en_name', $job->en_name, ['maxlength'=>'15', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Arabic Content'); ?><br>
<?php echo Form::textarea('ar_descrip', $job->ar_descrip, ['class'=>'form-control']); ?><br>
<?php echo Form::label('English Content'); ?><br>
<?php echo Form::textarea('en_descrip', $job->en_descrip, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Job Section'); ?><br>
<?php echo Form::select('categories[]', $cat_en, $selected, ['multiple' => 'multiple', 'class'=>'form-control']); ?><br>
<?php echo Form::label('البلد'); ?><br>
<?php echo Form::select('Country', $country_en, $job->country_id, ['class'=>'form-control']); ?><br>
<?php echo Form::label('نوع المتقدم'); ?><br>
<?php echo Form::select('Gender', ['Male', 'Female', 'Both'], $job->gender, ['class'=>'form-control']); ?><br>


<?php echo Form::label('Salary With Numbers'); ?><br>
<?php echo Form::text('salary', $job->salary, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Currency In Arabic'); ?><br>
<?php echo Form::text('ar_currency', $job->ar_currency, ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Currency In English'); ?><br>
<?php echo Form::text('en_currency', $job->en_currency, ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Yesrs Of Experience'); ?><br>
<?php echo Form::select('experience', [0=> 'Less than 1 year', 1=>'1 year', 2=>'2 years', 3=>'3 years', 4=>'4 yesrs', 5=>'5 yesrs', 6=>'More than 6 years' ], $job->experience, ['class'=>'form-control']); ?><br>


<h4><b>Contact Details</b></h4>
<?php echo Form::label('Tel.'); ?><br>
<?php echo Form::text('phone', $job->phone, ['class'=>'form-control']); ?><br>
<?php echo Form::label('الجوال'); ?><br>
<?php echo Form::text('mobile', $job->mobile, ['class'=>'form-control']); ?><br>
<?php echo Form::label('E-mail'); ?><br>
<?php echo Form::text('email', $job->email, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Map Location'); ?><br>
<?php echo Form::text('map', $job->map, ['class'=>'form-control']); ?><br>

<?php echo Form::label('Update Image'); ?><br>
<?php echo Form::file('image'); ?><br>


<?php echo Form::submit('Update', ['class'=>'btn']); ?>

<?php echo Form::close(); ?>

</div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>