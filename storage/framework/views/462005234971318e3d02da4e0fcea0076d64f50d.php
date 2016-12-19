<?php $__env->startSection('content'); ?>
<div class="main-container">
	    <div class="clearfix"></div>
        <div class="container">
            <aside class="col-lg-3 col-md-3 col-sm-3 col-XS-12">
                <div class="row">
                    <div class="banner-ad"> <a href='<?php echo URL::to( "http://$banner_up->link"); ?>' target="_blank"><img src='<?php echo asset("$banner_up->ar_image"); ?>' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="categories">
                        <div class="title">لوحة التحكم</div>
                        <ul class="cats">
                            <li><a href='<?php echo URL::to("jobs-edit"); ?>'>إعلاناتي</a></li>
                            <li><a href='<?php echo URL::to("jobs/create"); ?>'>إعلان جديد</a></li>
                            <li><a href='<?php echo URL::to("adds-pay"); ?>'>دفع الإعلانات</a></li>
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


<?php if(count($errors) > 0): ?>
	<div class="alert alert-danger">
        <ul>
        <?php foreach($errors->all() as $error): ?>
        	<li><?php echo e($error); ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<h3>تعديل إعلان الوظيفة:</h3><br>
<div class="content col-lg-9 col-md-9 col-sm-12 animated">
<?php echo Form::open(["url"=>"jobs/$job->id", "files"=>true, "method"=>"patch", "class"=>"form-group", "id"=>"register"]); ?>

<?php echo Form::label('عنوان الإعلان'); ?><br>
<?php echo Form::text('ar_title', $job->ar_title, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Add Title'); ?><br>
<?php echo Form::text('en_title', $job->en_title, ['class'=>'form-control']); ?><br>
<?php echo Form::label('محتوى الإعلان'); ?><br>
<?php echo Form::textarea('ar_descrip', $job->ar_descrip, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Add Content'); ?><br>
<?php echo Form::textarea('en_descrip', $job->en_descrip, ['class'=>'form-control']); ?><br>
<?php echo Form::label('تصنيف الإعلان'); ?><br>
<?php echo Form::select('categories[]', $cat_ar, $selected, ['multiple' => 'multiple', 'class'=>'form-control']); ?><br>
<?php echo Form::label('البلد'); ?><br>
<?php echo Form::select('country', $country_ar, $job->country_id, ['class'=>'form-control']); ?><br>
<?php echo Form::label('نوع المتقدم'); ?><br>
<?php echo Form::select('gender', ['ذكر', 'أنثى', 'الجميع'], $job->gender, ['class'=>'form-control']); ?><br>


<?php echo Form::label('المرتب بالأرقام'); ?><br>
<?php echo Form::text('salary', $job->salary, ['class'=>'form-control']); ?><br>
<?php echo Form::label('العملة'); ?><br>
<?php echo Form::text('ar_currency', $job->ar_currency, ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('العملة بالإنجليزية'); ?><br>
<?php echo Form::text('en_currency', $job->en_currency, ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('سنوات الخبرة'); ?><br>
<?php echo Form::select('experience', [0=> 'أقل من سنة', 1=>'سنة واحدة', 2=>'سنتان', 3=>'3 سنوات', 4=>'4 سنوات', 5=>'5 سنوات', 6=>'أكثر من 6 سنوات' ], $job->experience, ['class'=>'form-control']); ?><br>


<h4><b>بيانات الإتصال</b></h4>
<?php echo Form::label('الهاتف'); ?><br>
<?php echo Form::text('phone', $job->phone, ['class'=>'form-control']); ?><br>
<?php echo Form::label('البريد الإلكتروني'); ?><br>
<?php echo Form::text('email', $job->email, ['class'=>'form-control']); ?><br>

<?php echo Form::label('تحديث الصورة'); ?><br>
<?php echo Form::file('image'); ?><br>


<?php echo Form::submit('تحديث', ['class'=>'btn']); ?>

<?php echo Form::close(); ?>

</div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>