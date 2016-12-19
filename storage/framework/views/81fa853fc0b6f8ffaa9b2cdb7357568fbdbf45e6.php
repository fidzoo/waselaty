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

<h3>تحديث صور السلايدر:</h3><br>
<b>(برجاء حذف أي مسافات من أسماء الصور)</b><br><br>

<?php echo Form::open(["url"=>"slider-update", "files"=>true,"class"=>"form-group"]); ?>


<div class="col-lg-4 banners">
<?php echo Form::hidden('item', 'img3'); ?>

<?php echo HTML::image($silder_img3->ar_content, "", ["width"=>"200", "id"=>"ban-img-up"]); ?><br><br>
<?php echo Form::file('image3'); ?><br>
</div>
<div class="col-lg-4 banners">
<?php echo Form::hidden('item', 'img2'); ?>

<?php echo HTML::image($silder_img2->ar_content, "", ["width"=>"200", "id"=>"ban-img-up"]); ?><br><br>
<?php echo Form::file('image2'); ?><br>
</div>

<div class="col-lg-4 banners">
<?php echo Form::hidden('item', 'img1'); ?>

<?php echo HTML::image($silder_img1->ar_content, "", ["width"=>"200", "id"=>"ban-img-up"]); ?><br><br>
<?php echo Form::file('image1'); ?><br>

<?php echo Form::submit('تحديث', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>

<br><br>
</div>

-----------------------------------------------------------------------
<br><br>

<h3>تحديث أيقونات الرئيسية:</h3><br>

<?php echo Form::open(["url"=>"icons-update", "files"=>true,"class"=>"form-group"]); ?>


<div class="col-lg-6 banners">
<?php echo HTML::image('assets/images/profession.png', "", ["width"=>"150", "id"=>"ban-img-up"]); ?><br><br>
<?php echo Form::file('prof_image'); ?><br>
<?php echo Form::label('العنوان بالعربية:'); ?>

<?php echo Form::text('ar_profession', $prof_jobs->ar_content); ?><br>
<?php echo Form::label('العنوان بالإنجليزية:'); ?>

<?php echo Form::text('en_profession', $prof_jobs->en_content); ?>

</div>

<div class="col-lg-6 banners">
<?php echo HTML::image('assets/images/services.png', "", ["width"=>"150", "id"=>"ban-img-up"]); ?><br><br>
<?php echo Form::file('serv_image'); ?><br>
<?php echo Form::label('العنوان بالعربية:'); ?>

<?php echo Form::text('ar_service', $serv_jobs->ar_content); ?><br>
<?php echo Form::label('العنوان بالإنجليزية:'); ?>

<?php echo Form::text('en_service', $serv_jobs->en_content); ?>

<br><br>
<?php echo Form::submit('تحديث', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>

<br><br>
</div>


-----------------------------------------------------------------------
<br><br>

<h3>تحديث روابط السوشيال ميديا:</h3><br>
<br>
<?php echo Form::open(["url"=>"social-update", "files"=>true,"class"=>"form-group"]); ?>

<i class="fa fa-facebook"> --</i> 
<?php echo Form::label('رابط فيسبوك'); ?>

<?php echo Form::text('facebook', $facebook->ar_content, ['class'=>'form-control']); ?><br><br>
<i class="fa fa-twitter"> --</i> 
<?php echo Form::label('رابط تويتر'); ?>

<?php echo Form::text('twitter', $twitter->ar_content, ['class'=>'form-control']); ?><br><br>
<i class="fa fa-youtube"> --</i> 
<?php echo Form::label('رابط يوتيوب'); ?>

<?php echo Form::text('youtube', $youtube->ar_content, ['class'=>'form-control']); ?><br><br>
<i class="fa fa-instagram"> --</i> 
<?php echo Form::label('رابط انستجرام'); ?>

<?php echo Form::text('instagram', $instagram->ar_content, ['class'=>'form-control']); ?><br><br>

<?php echo Form::submit('تحديث', ['class'=>'btn btn-info']); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>