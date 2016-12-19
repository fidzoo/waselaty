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

<div><h3>تعيين أدمن جديد:</h3></div><br>

<?php echo Form::open(["url"=>"new-admin", "class"=>"form-group"]); ?>

<?php echo Form::label('الاسم'); ?><br>
<?php echo Form::text('name', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('البريد الإلكتروني'); ?><br>
<?php echo Form::email('email', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('كلمة المرور'); ?>&nbsp;
<?php echo Form::password('password', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('تأكيد كلمة المرور'); ?>&nbsp;
<?php echo Form::password('password_confirmation', "", ['class'=>'form-control']); ?><br><br>
<?php echo Form::label('نوع الأدمن'); ?>

<?php echo Form::select('role[]', $roles, null, ['class'=>'form-control']); ?><br>

<?php echo Form::submit('إضافة', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>