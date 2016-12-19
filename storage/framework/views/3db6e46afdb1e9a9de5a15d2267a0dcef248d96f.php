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

<div><h3>تعديل السعر:</h3></div><br>

<?php echo Form::open(["url"=>"prices/$price->id", "class"=>"form-group", "method"=>"patch"]); ?>

<?php echo Form::label('ترتيب السعر في العرض'); ?><br>
<?php echo Form::text('id', $price->id, ['class'=>'form-control']); ?><br>

<?php echo Form::label('عنوان التسعير'); ?><br>
<?php echo Form::text('ar_item', $price->ar_item, ['class'=>'form-control']); ?><br>

<?php echo Form::label('Enlgish Price Title'); ?><br>
<?php echo Form::text('en_title', $price->en_title, ['class'=>'form-control']); ?><br>

<?php echo Form::label('مدة الإعلان لهذا السعر'); ?><br>
العدد: <?php echo Form::number('number', $number); ?> <?php echo Form::select('duration', ['day'=>'أيام', 'week'=>'أسابيع', 'month'=>'أشهر', 'year'=>'سنوات'], $duration); ?><br><br>

<h3>الإعلانات العادية:</h3><br>

<?php echo Form::label('سعر الإعلان الكاش'); ?><br>
<?php echo Form::number('normal_price', $price->normal_price, ['class'=>'form-control']); ?><br>

<?php echo Form::label('العملة'); ?><br>
<?php echo Form::text('norm_currency', $price->norm_currency,['class'=>'form-control']); ?><br><br>

<?php echo Form::label('سعر الإعلان البايبال'); ?><br>
<?php echo Form::number('paypal_norm_price', $price->paypal_norm_price, ['class'=>'form-control']); ?><br>

<?php echo Form::label('العملة'); ?><br>
<?php echo Form::select('paypal_norm_currency', ['USD'=>'دولار أمريكي', 'EUR'=>'يورو'], $price->paypal_norm_currency, ['class'=>'form-control']); ?><br><br>
------------------------------------
<h3>الإعلانات المميزة:</h3><br>

<?php echo Form::label('سعر الإعلان الكاش'); ?><br>
<?php echo Form::number('premium_price', $price->premium_price, ['class'=>'form-control']); ?><br>

<?php echo Form::label('العملة'); ?><br>
<?php echo Form::text('prem_currency', $price->prem_currency,['class'=>'form-control']); ?><br><br>

<?php echo Form::label('سعر الإعلان البايبال'); ?><br>
<?php echo Form::number('paypal_prem_price', $price->paypal_prem_price, ['class'=>'form-control']); ?><br>

<?php echo Form::label('العملة'); ?><br>
<?php echo Form::select('paypal_prem_currency', ['USD'=>'دولار أمريكي', 'EUR'=>'يورو'], $price->paypal_prem_currency, ['class'=>'form-control']); ?><br><br>

<?php echo Form::submit('تحديث', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>