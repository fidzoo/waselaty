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

<h3>إنشاء إعلان جديد:</h3>
<br>
<div class="content col-lg-9 col-md-9 col-sm-12 animated panel panel-default">
<?php echo Form::open(["url"=>"jobs", "files"=>true, "class"=>"form-group", "id"=>"register"]); ?>

<?php echo Form::label('عنوان الإعلان'); ?><br>
<?php echo Form::text('ar_title', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('Add Title'); ?><br>
<?php echo Form::text('en_title', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('اسم الشخص بالعربية- لا يزيد عن 15 حرف'); ?><br>
<?php echo Form::text('ar_name', "", ['maxlength'=>'15', 'class'=>'form-control']); ?><br>
<?php echo Form::label('اسم الشخص بالإنجليزية- لا يزيد عن 15 حرف'); ?><br>
<?php echo Form::text('en_name', "", ['maxlength'=>'15', 'class'=>'form-control']); ?><br>
<?php echo Form::label('محتوى الإعلان'); ?><br>
<?php echo Form::textarea('ar_descrip', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('Add Content'); ?><br>
<?php echo Form::textarea('en_descrip', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('تصنيف الإعلان'); ?><br>
<?php echo Form::select('categories[]', $cat_ar, null, ['multiple' => 'multiple', 'class'=>'form-control']); ?><br>
<?php echo Form::label('البلد'); ?><br>
<?php echo Form::select('country', $country_ar, null, ['class'=>'form-control']); ?><br>
<?php echo Form::label('نوع المتقدم'); ?><br>
<?php echo Form::select('gender', ['ذكر', 'أنثى', 'الجميع'], null, ['class'=>'form-control']); ?><br>


<?php echo Form::label('المرتب بالأرقام'); ?><br>
<?php echo Form::text('salary', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('العملة'); ?><br>
<?php echo Form::text('ar_currency', "", ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('العملة بالإنجليزية'); ?><br>
<?php echo Form::text('en_currency', "", ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('سنوات الخبرة'); ?><br>
<?php echo Form::select('experience', [0=> 'أقل من سنة', 1=>'سنة واحدة', 2=>'سنتان', 3=>'3 سنوات', 4=>'4 سنوات', 5=>'5 سنوات', 6=>'أكثر من 6 سنوات' ], null, ['class'=>'form-control']); ?></b><br>


<h4><b>بيانات الإتصال</b></h4>
<?php echo Form::label('الهاتف'); ?><br>
<?php echo Form::text('phone', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('الجوال'); ?><br>
<?php echo Form::text('mobile', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('البريد الإلكتروني'); ?><br>
<?php echo Form::text('email', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('موقع الخريطة'); ?><br>
<?php echo Form::text('map', "", ['class'=>'form-control']); ?><br>

<?php echo Form::label('صورة'); ?><br>
<?php echo Form::file('image'); ?><br>
<?php echo Form::label('مدة الإعلان'); ?><br>
<?php echo Form::select('duration', $duration, null, ['class'=>'form-control']); ?><br>
<?php echo Form::select('add_rank', [1=>'إعلان مميز', 0=>'إعلان غير مميز'], null, ['class'=>'form-control']); ?><br>

<?php echo Form::submit('إضافة', ['class'=>'', 'id'=>'reg']); ?>

<?php echo Form::close(); ?>

</div>
		</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>