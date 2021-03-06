@extends('en.layouts.en-dash')

@section('content')

<!--ajax menu-->
<h2>Banners Update!!</h2><br><br>
<strong>Please select the job's banners you wish to update:</strong>

                <select name="cats" id="cats">
                    <option selected disabled>Select Job</option>
                    @foreach($cats_en as $id=>$cat)
                    <option value="{!!$id!!}">{!!$cat!!}</option>
                    @endforeach
                </select>

<div class="col-lg-12 banners">
	<div class="row">
		<form action="" method="post" enctype="multipart/form-data" id="banner-up-form">
		<input name="_method" type="hidden" value="PATCH">
			{{ csrf_field() }}

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
			{{ csrf_field() }}

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
			{{ csrf_field() }}

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
                $('#ar-ban-up').html('<h2>English Version</h2><br> {!! HTML::image("'+data[0].en_image+'", "", ["width"=>"100", "id"=>"ban-img-up"]) !!} <br> <br> <strong>Banner Position: '+data[0].en_position+'</strong> <br> {!! Form::file("en_image") !!}<br>');
                //Arabic Banner
                $('#en-ban-up').html('<h2>Arabic Version</h2><br> {!! HTML::image("'+data[0].ar_image+'", "", ["width"=>"100", "id"=>"ban-img-up"]) !!} <br> <br> <strong>Banner Position: '+data[0].ar_position+'</strong> <br> {!! Form::file("ar_image") !!}<br>');
                //link & submit
                $('#banners-submit-up').html('{!! Form::label("link", "Banner Link: (Please remove http://)")!!} <br> <input type="text" name="link" value="'+data[0].link+'"> <br><br>{!! Form::submit("Update", ["class"=>"btn btn-info"]) !!}<br><br><br>');

                //Middle Banner:
                //Eglish Banner
                $('#banner-mid-form').attr('action', 'banners/'+data[1].id);
                $('#ar-ban-mid').html('<h2>English Version</h2><br> {!! HTML::image("'+data[1].en_image+'", "", ["width"=>"100", "id"=>"ban-img-mid"]) !!} <br> <br> <strong>Banner Position: '+data[1].en_position+'</strong> <br> {!! Form::file("en_image") !!}<br>');
                //Arabic Banner
                $('#en-ban-mid').html('<h2>Arabic Version</h2><br> {!! HTML::image("'+data[1].ar_image+'", "", ["width"=>"100", "id"=>"ban-img-mid"]) !!} <br> <br> <strong>Banner Position: '+data[1].ar_position+'</strong> <br> {!! Form::file("ar_image") !!}<br>');
                //link & submit
                $('#banners-submit-mid').html('{!! Form::label("link", "Banner Link: (Please remove http://)")!!} <br> <input type="text" name="link" value="'+data[1].link+'"> <br><br>{!! Form::submit("Update", ["class"=>"btn btn-info"]) !!}<br><br><br>');

                //Bottom Banner:
                //Eglish Banner
                $('#banner-botm-form').attr('action', 'banners/'+data[2].id);
                $('#ar-ban-botm').html('<h2>English Version</h2><br> {!! HTML::image("'+data[2].en_image+'", "", ["width"=>"100", "id"=>"ban-img-botm"]) !!} <br> <br> <strong>Banner Position: '+data[2].en_position+'</strong> <br> {!! Form::file("en_image") !!}<br>');
                //Arabic Banner
                $('#en-ban-botm').html('<h2>Arabic Version</h2><br> {!! HTML::image("'+data[2].ar_image+'", "", ["width"=>"100", "id"=>"ban-img-botm"]) !!} <br> <br> <strong>Banner Position: '+data[2].ar_position+'</strong> <br> {!! Form::file("ar_image") !!}<br>');
                //link & submit
                $('#banners-submit-botm').html('{!! Form::label("link", "Banner Link: (Please remove http://)")!!} <br> <input type="text" name="link" value="'+data[2].link+'"> <br><br>{!! Form::submit("Update", ["class"=>"btn btn-info"]) !!}<br><br><br>');
              
            });
        });
    </script>
@stop

