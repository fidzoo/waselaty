@extends('layouts.ar-dash')

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<h3>تحديث صور السلايدر:</h3><br>
<b>(برجاء حذف أي مسافات من أسماء الصور)</b><br><br>

{!! Form::open(["url"=>"slider-update", "files"=>true,"class"=>"form-group"]) !!}

<div class="col-lg-4 banners">
{!! Form::hidden('item', 'img3') !!}
{!! HTML::image($silder_img3->ar_content, "", ["width"=>"200", "id"=>"ban-img-up"]) !!}<br><br>
{!! Form::file('image3') !!}<br>
</div>
<div class="col-lg-4 banners">
{!! Form::hidden('item', 'img2') !!}
{!! HTML::image($silder_img2->ar_content, "", ["width"=>"200", "id"=>"ban-img-up"]) !!}<br><br>
{!! Form::file('image2') !!}<br>
</div>

<div class="col-lg-4 banners">
{!! Form::hidden('item', 'img1') !!}
{!! HTML::image($silder_img1->ar_content, "", ["width"=>"200", "id"=>"ban-img-up"]) !!}<br><br>
{!! Form::file('image1') !!}<br>

{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}
<br><br>
</div>

-----------------------------------------------------------------------
<br><br>

<h3>تحديث أيقونات الرئيسية:</h3><br>

{!! Form::open(["url"=>"icons-update", "files"=>true,"class"=>"form-group"]) !!}

<div class="col-lg-6 banners">
{!! HTML::image('assets/images/profession.png', "", ["width"=>"150", "id"=>"ban-img-up"]) !!}<br><br>
{!! Form::file('prof_image') !!}<br>
{!! Form::label('العنوان بالعربية:') !!}
{!! Form::text('ar_profession', $prof_jobs->ar_content) !!}<br>
{!! Form::label('العنوان بالإنجليزية:') !!}
{!! Form::text('en_profession', $prof_jobs->en_content) !!}
</div>

<div class="col-lg-6 banners">
{!! HTML::image('assets/images/services.png', "", ["width"=>"150", "id"=>"ban-img-up"]) !!}<br><br>
{!! Form::file('serv_image') !!}<br>
{!! Form::label('العنوان بالعربية:') !!}
{!! Form::text('ar_service', $serv_jobs->ar_content) !!}<br>
{!! Form::label('العنوان بالإنجليزية:') !!}
{!! Form::text('en_service', $serv_jobs->en_content) !!}
<br><br>
{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}
<br><br>
</div>


-----------------------------------------------------------------------
<br><br>

<h3>تحديث روابط السوشيال ميديا:</h3><br>
<br>
{!! Form::open(["url"=>"social-update", "files"=>true,"class"=>"form-group"]) !!}
<i class="fa fa-facebook"> --</i> 
{!! Form::label('رابط فيسبوك') !!}
{!! Form::text('facebook', $facebook->ar_content, ['class'=>'form-control']) !!}<br><br>
<i class="fa fa-twitter"> --</i> 
{!! Form::label('رابط تويتر') !!}
{!! Form::text('twitter', $twitter->ar_content, ['class'=>'form-control']) !!}<br><br>
<i class="fa fa-youtube"> --</i> 
{!! Form::label('رابط يوتيوب') !!}
{!! Form::text('youtube', $youtube->ar_content, ['class'=>'form-control']) !!}<br><br>
<i class="fa fa-instagram"> --</i> 
{!! Form::label('رابط انستجرام') !!}
{!! Form::text('instagram', $instagram->ar_content, ['class'=>'form-control']) !!}<br><br>

{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop