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

<h3>Insert New Country:</h3><br>

<?php echo Form::open(["url"=>"countries", "class"=>"form-group"]); ?>

<?php echo Form::label('Arabic Country Name'); ?>

<?php echo Form::text('ar_name', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('English Country Name'); ?>

<?php echo Form::text('en_name', "", ['class'=>'form-control']); ?><br>
<?php echo Form::submit('Insert', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>