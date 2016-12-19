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

<h3>Update Site Policy (Location: Main Page):</h3><br>

<?php echo Form::open(["url"=>"site-content", "class"=>"form-group"]); ?>

<?php echo Form::hidden('item', 'policy'); ?>

<?php echo Form::label('Arabic Version'); ?>

<?php echo Form::textarea('ar_content', $site_policy->ar_content, ['class'=>'form-control']); ?><br>
<?php echo Form::label('English Version'); ?>

<?php echo Form::textarea('en_content', $site_policy->en_content, ['class'=>'form-control']); ?><br>
<?php echo Form::submit('Update', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>

<br>
---------------------------------
<br>

<h3>Update Companies Registration Policy (Companies Registration page):</h3><br>

<?php echo Form::open(["url"=>"site-content", "class"=>"form-group"]); ?>

<?php echo Form::hidden('item', 'company_reg'); ?>

<?php echo Form::label('Arabic Version'); ?>

<?php echo Form::textarea('ar_content', $company_reg->ar_content, ['class'=>'form-control']); ?><br>
<?php echo Form::label('English Version'); ?>

<?php echo Form::textarea('en_content', $company_reg->en_content, ['class'=>'form-control']); ?><br>
<?php echo Form::submit('Update', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>

<br>
---------------------------------
<br>

<h3>Update Persons Registration Policy (Persons Registration page):</h3><br>

<?php echo Form::open(["url"=>"site-content", "class"=>"form-group"]); ?>

<?php echo Form::hidden('item', 'person_reg'); ?>

<?php echo Form::label('Arabic Version'); ?>

<?php echo Form::textarea('ar_content', $person_reg->ar_content, ['class'=>'form-control']); ?><br>
<?php echo Form::label('English Version'); ?>

<?php echo Form::textarea('en_content', $person_reg->en_content, ['class'=>'form-control']); ?><br>
<?php echo Form::submit('Update', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>