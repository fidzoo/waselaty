<?php $__env->startSection('content'); ?>

<h2>تحديث البنارات!!</h2><br><br>

<?php foreach($banners as $banner): ?>
<div class="col-lg-5 banners">
	<?php echo HTML::image("$banner->ar_image", "", ['width'=>'100']); ?><br><br>
	<?php echo Form::open(["url"=>"banners/$banner->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]); ?>

	<?php echo Form::label('التصنيف: '.$banner->category_title); ?><br>
	<?php echo Form::label('موقع الإعلان: '.$banner->position); ?><br>
	<?php echo Form::label('link', 'رابط الموقع: (رجاءً قم بحذف http://)'); ?><br>
	<?php echo Form::text('link', $banner->link); ?><br><br>
	<?php echo Form::file('image'); ?><br>
	<?php echo Form::submit('Update', ['class'=>'btn btn-info']); ?>

	<?php echo Form::close(); ?><br>
</div>
<?php endforeach; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>