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

<div><h3>Create a new admin:</h3></div><br>

<?php echo Form::open(["url"=>"new-admin", "class"=>"form-group"]); ?>

<?php echo Form::label('name'); ?><br>
<?php echo Form::text('name', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('E-mail'); ?><br>
<?php echo Form::email('email', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('Password'); ?>&nbsp;
<?php echo Form::password('password', "", ['class'=>'form-control']); ?><br>
<?php echo Form::label('Re-Type Password'); ?>&nbsp;
<?php echo Form::password('password_confirmation', "", ['class'=>'form-control']); ?><br><br>
<?php echo Form::label('Admin Role'); ?>

<?php echo Form::select('role[]', $roles, null, ['class'=>'form-control']); ?><br>

<?php echo Form::submit('Create', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>