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

<h3>إضافة تصنيف جديد:</h3><br>

<?php echo Form::open(["url"=>"categories", "class"=>"form-group"]); ?>

<?php echo Form::label('نوع التصنيف'); ?>

<?php echo Form::select('mcategory', $mcategory, null, ['class'=>'form-control']); ?><br>
<?php echo Form::label('عنوان التصنيف'); ?>

<?php echo Form::text('ar_title', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('Category Title'); ?>

<?php echo Form::text('en_title', "", ['class'=>'form-control']); ?><br>
<?php echo Form::submit('إضافة', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>