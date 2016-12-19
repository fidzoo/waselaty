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

<div><h3>مراجعة إعلان الوظيفة:</h3></div><br>

<?php echo Form::open(["url"=>"jobs/$job->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]); ?>

<?php echo Form::label('عنوان الوظيفة'); ?><br>
<?php echo Form::text('ar_title', $job->ar_title, ['class'=>'form-control', 'disabled']); ?><br>
<?php echo Form::label('Job Title'); ?><br>
<?php echo Form::text('en_title', $job->en_title, ['class'=>'form-control', 'disabled']); ?><br>
<?php echo Form::label('وصف الوظيفة'); ?><br>
<?php echo Form::textarea('ar_descrip', $job->ar_descrip, ['class'=>'form-control', 'disabled']); ?><br>
<?php echo Form::label('Job description'); ?><br>
<?php echo Form::textarea('en_descrip', $job->en_descrip, ['class'=>'form-control', 'disabled']); ?><br>
<?php echo Form::label('تصنيف الوظيفة'); ?>

<?php echo Form::select('categories[]', $ar_categories, $selected, ['multiple' => 'multiple', 'class'=>'form-control', 'disabled']); ?><br>
<?php echo Form::label('البلد'); ?>

<?php echo Form::select('country', $ar_countries, $job->country_id, ['class'=>'form-control', 'disabled']); ?><br>
<?php echo Form::label('نوع المتقدم'); ?>

<?php echo Form::select('gender', ['ذكر', 'أنثى', 'الجميع'], $job->gender, ['class'=>'form-control', 'disabled']); ?><br>

<?php echo Form::label('المرتب'); ?><br>
<?php echo Form::text('salary', $job->salary, ['class'=>'form-control', 'disabled']); ?><br>
<?php echo Form::label('العملة'); ?><br>
<?php echo Form::text('currency', $job->currency, ['maxlength'=>'18', 'class'=>'form-control', 'disabled']); ?><br>
<?php echo Form::label('الخبرة المطلوبة'); ?><br>
<?php echo Form::text('experience', $job->experience, ['class'=>'form-control', 'disabled']); ?><br>

<h4><b>بيانات الإتصال</b></h4>
<?php echo Form::label('الهاتف'); ?><br>
<?php echo Form::text('phone', $job->phone, ['class'=>'form-control', 'disabled']); ?><br>
<?php echo Form::label('البريد الإلكتروني'); ?><br>
<?php echo Form::text('email', $job->email, ['class'=>'form-control', 'disabled']); ?><br>

<?php echo Form::label('صورة للوظيفة'); ?><br>
<?php echo HTML::image($job->image); ?><br><br>
<?php echo Form::label('نوع الإعلان'); ?><br>
<?php echo Form::select('add_rank', ['إعلان غير مميز', 'إعلان مميز'], $job->add_rank, ['class'=>'form-control']); ?><br>
<?php echo Form::label('طريقة الدفع'); ?><br>
<?php echo Form::select('payment', ['لم يتم الدفع بعد', 'كاش', 'بايبال'], $job->payment, ['class'=>'form-control']); ?><br>
<?php echo Form::label('الموافقة على الإعلان؟'); ?><br>
<?php echo Form::submit('موافقة', ['name'=>'review', 'class'=>'btn btn-success']); ?>

<?php echo Form::submit('رفض', ['name'=>'review', 'class'=>'btn btn-danger']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>