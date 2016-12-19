<?php $__env->startSection('content'); ?>
<!--ajax menu-->
<h2>تحديث البنارات!!</h2><br><br>
<strong>برجاء اختيار <span style="color: red;"> القسم </span>المراد تحديث البنرات الخاصة به:</strong>
                <select name="cats" id="mcats">
                    <option selected disabled>اختر القسم</option>
                    <option value="home">الصفحة الرئيسية</option>
                    <option disabled>--الأقسام الرئيسية--</option>
                    <?php foreach($mcats as $mid=>$mcat): ?>
                    <option value="<?php echo $mid; ?>"><?php echo $mcat; ?></option>
                    <?php endforeach; ?>
                </select>
<br><br>

<strong>أو اختر <span style="color: red;">الوظيفة </span>المراد تحديث البنرات الخاصة بها:</strong>
                <select name="cats" id="cats">
                    <option selected disabled>اختر الوظيفة</option>
                    <?php foreach($cats as $id=>$cat): ?>
                    <option value="<?php echo $id; ?>"><?php echo $cat; ?></option>
                    <?php endforeach; ?>
                </select>

<div class="col-lg-12 banners">
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data" id="banner-up-form">
		<input name="_method" type="hidden" value="PATCH">
			<?php echo e(csrf_field()); ?>


		<div class="col-md-6 col-xs-12">
	
		<dev id="ar-ban-up"></dev>
		
		</div>
		<div class="col-md-6 col-xs-12">

		<dev id="en-ban-up"></dev>

		</div>
	
		<div id="banners-submit-up"></div>
		
	</div>
		</form>	
</div>

<div class="col-lg-12 banners">
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data" id="banner-mid-form">
		<input name="_method" type="hidden" value="PATCH">
			<?php echo e(csrf_field()); ?>


		<div class="col-md-6 col-xs-12">
	
		<dev id="ar-ban-mid"></dev>
		
		</div>
		<div class="col-md-6 col-xs-12">

		<dev id="en-ban-mid"></dev>

		</div>
	
		<div id="banners-submit-mid"></div>
		
	</div>
		</form>	
</div>

<div class="col-lg-12 banners">
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data" id="banner-botm-form">
		<input name="_method" type="hidden" value="PATCH">
			<?php echo e(csrf_field()); ?>


		<div class="col-md-6 col-xs-12">
	
		<dev id="ar-ban-botm"></dev>
		
		</div>
		<div class="col-md-6 col-xs-12">

		<dev id="en-ban-botm"></dev>

		</div>
	
		<div id="banners-submit-botm"></div>
		
	</div>
		</form>	
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!--script for the ajax menu-->
    <script type="text/javascript">
        $('#mcats').on('change', function(e){
            //to print into browser console
            //console.log(e);
            var mcat_id= e.target.value;
console.log(mcat_id);
            //ajax
            $.get('/ajax-mbanners?mcat_id=' + mcat_id, function(data){
                //success data
                //Up Banner:
                //Eglish Banner
                $('#banner-up-form').attr('action', 'banners/'+data[0].id);
                $('#ar-ban-up').html('<h2>النسخة الإنجليزية</h2><br> <?php echo HTML::image("'+data[0].en_image+'", "", ["width"=>"100", "id"=>"ban-img-up"]); ?> <br> <br> <strong>موقع البنر: '+data[0].en_position+'</strong> <br> <?php echo Form::file("en_image"); ?><br>');
                //Arabic Banner
                $('#en-ban-up').html('<h2>النسخة العربية</h2><br> <?php echo HTML::image("'+data[0].ar_image+'", "", ["width"=>"100", "id"=>"ban-img-up"]); ?> <br> <br> <strong>موقع البنر: '+data[0].ar_position+'</strong> <br> <?php echo Form::file("ar_image"); ?><br>');
                //link & submit
                $('#banners-submit-up').html('<?php echo Form::label("link", "رابط البنر: (رجاءً قم بحذف http://)"); ?> <br> <input type="text" name="link" value="'+data[0].link+'"> <br><br><?php echo Form::submit("تحديث", ["class"=>"btn btn-info"]); ?><br><br><br>');

                //Middle Banner:
                //Eglish Banner
                $('#banner-mid-form').attr('action', 'banners/'+data[1].id);
                $('#ar-ban-mid').html('<h2>النسخة الإنجليزية</h2><br> <?php echo HTML::image("'+data[1].en_image+'", "", ["width"=>"100", "id"=>"ban-img-mid"]); ?> <br> <br> <strong>موقع البنر: '+data[1].en_position+'</strong> <br> <?php echo Form::file("en_image"); ?><br>');
                //Arabic Banner
                $('#en-ban-mid').html('<h2>النسخة العربية</h2><br> <?php echo HTML::image("'+data[1].ar_image+'", "", ["width"=>"100", "id"=>"ban-img-mid"]); ?> <br> <br> <strong>موقع البنر: '+data[1].ar_position+'</strong> <br> <?php echo Form::file("ar_image"); ?><br>');
                //link & submit
                $('#banners-submit-mid').html('<?php echo Form::label("link", "رابط البنر: (رجاءً قم بحذف http://)"); ?> <br> <input type="text" name="link" value="'+data[1].link+'"> <br><br><?php echo Form::submit("تحديث", ["class"=>"btn btn-info"]); ?><br><br><br>');

                //Bottom Banner:
                //Eglish Banner
                $('#banner-botm-form').attr('action', 'banners/'+data[2].id);
                $('#ar-ban-botm').html('<h2>النسخة الإنجليزية</h2><br> <?php echo HTML::image("'+data[2].en_image+'", "", ["width"=>"100", "id"=>"ban-img-botm"]); ?> <br> <br> <strong>موقع البنر: '+data[2].en_position+'</strong> <br> <?php echo Form::file("en_image"); ?><br>');
                //Arabic Banner
                $('#en-ban-botm').html('<h2>النسخة العربية</h2><br> <?php echo HTML::image("'+data[2].ar_image+'", "", ["width"=>"100", "id"=>"ban-img-botm"]); ?> <br> <br> <strong>موقع البنر: '+data[2].ar_position+'</strong> <br> <?php echo Form::file("ar_image"); ?><br>');
                //link & submit
                $('#banners-submit-botm').html('<?php echo Form::label("link", "رابط البنر: (رجاءً قم بحذف http://)"); ?> <br> <input type="text" name="link" value="'+data[2].link+'"> <br><br><?php echo Form::submit("تحديث", ["class"=>"btn btn-info"]); ?><br><br><br>');
              
            });
        });

        $('#cats').on('change', function(e){
            //to print into browser console
            //console.log(e);
            var cat_id= e.target.value;

            //ajax
            $.get('/ajax-banners?cat_id=' + cat_id, function(data){
                //success data
                //Up Banner:
                //Eglish Banner
                $('#banner-up-form').attr('action', 'banners/'+data[0].id);
                $('#ar-ban-up').html('<h2>النسخة الإنجليزية</h2><br> <?php echo HTML::image("'+data[0].en_image+'", "", ["width"=>"100", "id"=>"ban-img-up"]); ?> <br> <br> <strong>موقع البنر: '+data[0].en_position+'</strong> <br> <?php echo Form::file("en_image"); ?><br>');
                //Arabic Banner
                $('#en-ban-up').html('<h2>النسخة العربية</h2><br> <?php echo HTML::image("'+data[0].ar_image+'", "", ["width"=>"100", "id"=>"ban-img-up"]); ?> <br> <br> <strong>موقع البنر: '+data[0].ar_position+'</strong> <br> <?php echo Form::file("ar_image"); ?><br>');
                //link & submit
                $('#banners-submit-up').html('<?php echo Form::label("link", "رابط البنر: (رجاءً قم بحذف http://)"); ?> <br> <input type="text" name="link" value="'+data[0].link+'"> <br><br><?php echo Form::submit("تحديث", ["class"=>"btn btn-info"]); ?><br><br><br>');

                //Middle Banner:
                //Eglish Banner
                $('#banner-mid-form').attr('action', 'banners/'+data[1].id);
                $('#ar-ban-mid').html('<h2>النسخة الإنجليزية</h2><br> <?php echo HTML::image("'+data[1].en_image+'", "", ["width"=>"100", "id"=>"ban-img-mid"]); ?> <br> <br> <strong>موقع البنر: '+data[1].en_position+'</strong> <br> <?php echo Form::file("en_image"); ?><br>');
                //Arabic Banner
                $('#en-ban-mid').html('<h2>النسخة العربية</h2><br> <?php echo HTML::image("'+data[1].ar_image+'", "", ["width"=>"100", "id"=>"ban-img-mid"]); ?> <br> <br> <strong>موقع البنر: '+data[1].ar_position+'</strong> <br> <?php echo Form::file("ar_image"); ?><br>');
                //link & submit
                $('#banners-submit-mid').html('<?php echo Form::label("link", "رابط البنر: (رجاءً قم بحذف http://)"); ?> <br> <input type="text" name="link" value="'+data[1].link+'"> <br><br><?php echo Form::submit("تحديث", ["class"=>"btn btn-info"]); ?><br><br><br>');

                //Bottom Banner:
                //Eglish Banner
                $('#banner-botm-form').attr('action', 'banners/'+data[2].id);
                $('#ar-ban-botm').html('<h2>النسخة الإنجليزية</h2><br> <?php echo HTML::image("'+data[2].en_image+'", "", ["width"=>"100", "id"=>"ban-img-botm"]); ?> <br> <br> <strong>موقع البنر: '+data[2].en_position+'</strong> <br> <?php echo Form::file("en_image"); ?><br>');
                //Arabic Banner
                $('#en-ban-botm').html('<h2>النسخة العربية</h2><br> <?php echo HTML::image("'+data[2].ar_image+'", "", ["width"=>"100", "id"=>"ban-img-botm"]); ?> <br> <br> <strong>موقع البنر: '+data[2].ar_position+'</strong> <br> <?php echo Form::file("ar_image"); ?><br>');
                //link & submit
                $('#banners-submit-botm').html('<?php echo Form::label("link", "رابط البنر: (رجاءً قم بحذف http://)"); ?> <br> <input type="text" name="link" value="'+data[2].link+'"> <br><br><?php echo Form::submit("تحديث", ["class"=>"btn btn-info"]); ?><br><br><br>');
              
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>