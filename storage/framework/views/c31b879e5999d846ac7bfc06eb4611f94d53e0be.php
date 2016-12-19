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

<div><h3>تعديل إعلان الوظيفة:</h3></div><br>

<?php echo Form::open(["url"=>"jobs/$job->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]); ?>

<?php echo Form::label('عنوان الإعلان'); ?><br>
<?php echo Form::text('ar_title', $job->ar_title, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Add Title'); ?><br>
<?php echo Form::text('en_title', $job->en_title, ['class'=>'form-control']); ?><br>
<?php echo Form::label('محتوى الإعلان'); ?><br>
<?php echo Form::textarea('ar_descrip', $job->ar_descrip, ['class'=>'form-control']); ?><br>
<?php echo Form::label('Add Content'); ?><br>
<?php echo Form::textarea('en_descrip', $job->en_descrip, ['class'=>'form-control']); ?><br>
<?php echo Form::label('تصنيف الإعلان'); ?>

<?php echo Form::select('categories[]', $ar_categories, $selected, ['multiple' => 'multiple', 'class'=>'form-control']); ?><br>
<?php echo Form::label('البلد'); ?>

<?php echo Form::select('country', $ar_countries, $job->country_id, ['class'=>'form-control']); ?><br>
<?php echo Form::label('نوع المتقدم'); ?>

<?php echo Form::select('gender', ['ذكر', 'أنثى', 'الجميع'], $job->gender, ['class'=>'form-control']); ?><br>

<?php if(Session::get('group') == 'company'): ?>
<?php echo Form::label('المرتب بالأرقام'); ?><br>
<?php echo Form::text('salary', $job->salary, ['class'=>'form-control']); ?><br>
<?php echo Form::label('العملة'); ?><br>
<?php echo Form::text('ar_currency', $job->ar_currency, ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::text('en_currency', $job->en_currency, ['maxlength'=>'18', 'class'=>'form-control']); ?><br>
<?php echo Form::label('سنوات الخبرة'); ?><br>
<?php echo Form::select('experience', [0=> 'أقل من سنة', 1=>'سنة واحدة', 2=>'سنتان', 3=>'3 سنوات', 4=>'4 سنوات', 5=>'5 سنوات', 6=>'أكثر من 6 سنوات' ], $job->experience, ['class'=>'form-control']); ?></b><br>
<?php endif; ?>

<h4><b>بيانات الإتصال</b></h4>
<?php echo Form::label('الهاتف'); ?><br>
<?php echo Form::text('phone', $job->phone, ['class'=>'form-control']); ?><br>
<?php echo Form::label('البريد الإلكتروني'); ?><br>
<?php echo Form::text('email', $job->email, ['class'=>'form-control']); ?><br>

<?php echo Form::label('صورة'); ?><br>
<?php echo Form::file('image'); ?><br>
<?php echo Form::submit('تحديث', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>