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

<div><h3>Review Job Ad.:</h3></div><br>

<?php echo Form::open(["url"=>"jobs/$job->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]); ?>

<?php echo Form::label('Arabic Job Title'); ?><br>
<?php echo Form::text('ar_title', $job->ar_title, ['class'=>'form-control']); ?><br>
<?php echo Form::label('English Job Title'); ?><br>
<?php echo Form::text('en_title', $job->en_title, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Person Name in Arabic- Not more than 15 charachter'); ?><br>
<?php echo Form::text('ar_name', $job->ar_name, ['maxlength'=>'15', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Person Name in English- Not more than 15 charachter'); ?><br>
<?php echo Form::text('en_name', $job->en_name, ['maxlength'=>'15', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Arabic Content'); ?><br>
<?php echo Form::textarea('ar_descrip', $job->ar_descrip, ['class'=>'form-control']); ?><br>
<?php echo Form::label('English Content'); ?><br>
<?php echo Form::textarea('en_descrip', $job->en_descrip, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Job Section'); ?>

<?php echo Form::select('categories[]', $cat_en, $selected, ['multiple' => 'multiple', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Country'); ?>

<?php echo Form::select('country', $country_en, $job->country_id, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Gender'); ?>

<?php echo Form::select('gender', ['Male', 'Female', 'Both'], $job->gender, ['class'=>'form-control']); ?><br>

<?php echo Form::label('Salary'); ?><br>
<?php echo Form::text('salary', $job->salary, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Currency in Arabic'); ?><br>
<?php echo Form::text('ar_currency', $job->ar_currency, ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Currency in English'); ?><br>
<?php echo Form::text('en_currency', $job->en_currency, ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('Required Experience'); ?><br>
<?php echo Form::select('experience', [0=> 'Less than 1 year', 1=>'1 year', 2=>'2 years', 3=>'3 years', 4=>'4 yesrs', 5=>'5 yesrs', 6=>'More than 6 years' ], $job->experience, ['class'=>'form-control']); ?>


<h4><b>بيانات الإتصال</b></h4>
<?php echo Form::label('Tel.'); ?><br>
<?php echo Form::text('phone', $job->phone, ['class'=>'form-control']); ?><br>
<?php echo Form::label('E-mail'); ?><br>
<?php echo Form::text('email', $job->email, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Map Location'); ?><br>
<?php echo Form::text('map', $job->map, ['class'=>'form-control']); ?><br>

<?php echo Form::label('Ad. Image'); ?><br>
<?php echo HTML::image($job->image, '',["width"=>"400"]); ?><br><br>
<?php echo Form::label('Update Image'); ?><br>
<?php echo Form::file('image'); ?><br>
<?php echo Form::label('Ad. Rank'); ?><br>
<?php echo Form::select('add_rank', ['Normal Ad.', 'Premium'], $job->add_rank, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Ad. Duration'); ?><br>
<?php echo Form::select('duration', $duration, $job->price_id, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Payment Method'); ?><br>
<?php echo Form::select('payment', ['Unpaid yet', 'Cash', 'Paypal'], $job->payment, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Approve Ad.?'); ?><br>
<?php echo Form::submit('Approve', ['name'=>'review', 'class'=>'btn btn-success']); ?>

<?php echo Form::submit('Reject', ['name'=>'review', 'class'=>'btn btn-danger']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>