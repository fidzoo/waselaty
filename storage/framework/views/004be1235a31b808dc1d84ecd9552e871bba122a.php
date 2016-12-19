<?php $__env->startSection('content'); ?>

<?php if(count($errors) > 0): ?>
	<div class="alert alert-danger">
        <ul>
        <?php foreach($errors->all() as $error): ?>
        	<li><?php echo e($error); ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div><h3>إنشاء إعلان وظيفة جديد:</h3></div><br>

<?php echo Form::open(["url"=>"jobs", "files"=>true, "class"=>"form-group"]); ?>

<?php echo Form::label('عنوان الوظيفة'); ?><br>
<?php echo Form::text('ar_title', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('Job Title'); ?><br>
<?php echo Form::text('en_title', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('وصف الوظيفة'); ?><br>
<?php echo Form::textarea('ar_descrip', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('Job description'); ?><br>
<?php echo Form::textarea('en_descrip', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('تصنيف الوظيفة'); ?>

<?php echo Form::select('categories[]', $ar_categories, null, ['multiple' => 'multiple', 'class'=>'form-control']); ?><br>
<?php echo Form::label('البلد'); ?>

<?php echo Form::select('country', $ar_countries, null, ['class'=>'form-control']); ?><br>
<?php echo Form::label('نوع المتقدم'); ?>

<?php echo Form::select('gender', ['ذكر', 'أنثى', 'الجميع'], null, ['class'=>'form-control']); ?><br>

<?php if(Session::get('group') == 'company'): ?>
<?php echo Form::label('المرتب بالأرقام'); ?><br>
<?php echo Form::text('salary', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('العملة'); ?><br>
<?php echo Form::text('currency', "", ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('سنوات الخبرة المطلوبة'); ?><br>
<?php echo Form::text('experience', "", ['size'=>'5']); ?>&nbsp &nbsp<b>سنة/سنوات</b><br>
<?php endif; ?>

<h4><b>بيانات الإتصال</b></h4>
<?php echo Form::label('الهاتف'); ?><br>
<?php echo Form::text('phone', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('البريد الإلكتروني'); ?><br>
<?php echo Form::text('email', "", ['class'=>'form-control']); ?><br>

<?php echo Form::label('صورة للوظيفة'); ?><br>
<?php echo Form::file('image'); ?><br>
<?php echo Form::submit('إضافة', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>