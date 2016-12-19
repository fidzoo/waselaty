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

<div><h3>إنشاء إعلان وظيفية جديد:</h3></div><br>

<?php echo Form::open(["url"=>"jobs", "files"=>true, "class"=>"form-group"]); ?>

<?php echo Form::label('عنوان الوظيفة'); ?><br>
<?php echo Form::text('ar_title', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('Job Title'); ?><br>
<?php echo Form::text('en_title', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('وصف الوظيفة'); ?><br>
<?php echo Form::text('ar_descrip', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('Job description'); ?><br>
<?php echo Form::text('en_descrip', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('تصنيف الوظيفة'); ?>

<?php echo Form::select('ar_categories[]', $ar_category, null, ['multiple' => 'multiple', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Job category'); ?>

<?php echo Form::select('en_categories[]', $en_category, null, ['multiple' => 'multiple', 'class'=>'form-control']); ?><br>
<?php echo Form::label('نوع المتقدم'); ?>

<?php echo Form::select('gender', ['ذكر', 'أنثى', 'الجميع'], null, ['class'=>'form-control']); ?><br>
<?php echo Form::label('المرتب'); ?><br>
<?php echo Form::text('salary', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('الخبرة المطلوبة'); ?><br>
<?php echo Form::text('experince', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('صورة للوظيفة'); ?><br>
<?php echo Form::file('image'); ?><br>
<?php echo Form::submit('إضافة', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.yisweb-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>