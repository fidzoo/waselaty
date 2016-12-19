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

<div><h3>إضافة سعر جديد:</h3></div><br>

<?php echo Form::open(["url"=>"prices", "class"=>"form-group"]); ?>

<?php echo Form::label('نوع الإعلان'); ?><br>
<?php echo Form::text('item', "", ['class'=>'form-control']); ?><br>

<?php echo Form::label('سعر الإعلان الكاش'); ?><br>
<?php echo Form::text('price', "", ['class'=>'form-control']); ?><br>

<?php echo Form::label('العملة'); ?><br>
<?php echo Form::text('currency', "",['class'=>'form-control']); ?><br><br>

<?php echo Form::label('سعر الإعلان البايبال'); ?><br>
<?php echo Form::text('p_price', "", ['class'=>'form-control']); ?><br>

<?php echo Form::label('العملة'); ?><br>
<?php echo Form::select('p_currency', ['USD'=>'دولار أمريكي', 'EUR'=>'يورو'], ['class'=>'form-control']); ?><br><br>

<?php echo Form::submit('إضافة', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>