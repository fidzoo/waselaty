@extends('layouts.ar-main')

@section('content')
<div class="main-container">
	    <div class="clearfix"></div>
        <div class="container">
            <aside class="col-lg-3 col-md-3 col-sm-3 col-XS-12">
                <div class="row">
                    <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_up->link") !!}' target="_blank"><img src='{!! asset("$banner_up->ar_image") !!}' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="categories">
                        <div class="title">لوحة التحكم</div>
                        <ul class="cats">
                            <li><a href='{!! URL::to("jobs-edit") !!}'>إعلاناتي</a></li>
                            <li><a href='{!! URL::to("jobs/create") !!}'>إعلان جديد</a></li>
                            <li><a href='{!! URL::to("adds-pay") !!}'>دفع الإعلانات</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_mid->link") !!}' target="_blank"><img src='{!! asset("$banner_mid->ar_image") !!}' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="jobs">
                        <div class="title">الوظائف</div>
                        <ul class="cats">
                        @foreach($cat_ar as $id=>$cat)
                            <li><a href='{!! URL::to("categories/$id") !!}'>{!!$cat!!}</a></li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_down->link") !!}' target="_blank"><img src='{!! asset("$banner_down->ar_image") !!}' alt=""> </a></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </aside>        

@if (count($errors) > 0)
	<div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        	<li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<h3>إنشاء إعلان جديد:</h3>
<br>
<div class="content col-lg-9 col-md-9 col-sm-12 animated panel panel-default">
{!! Form::open(["url"=>"jobs", "files"=>true, "class"=>"form-group", "id"=>"register"]) !!}
{!! Form::label('عنوان الإعلان') !!}<br>
{!! Form::text('ar_title', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('Add Title') !!}<br>
{!! Form::text('en_title', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('محتوى الإعلان') !!}<br>
{!! Form::textarea('ar_descrip', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('Add Content') !!}<br>
{!! Form::textarea('en_descrip', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('تصنيف الإعلان') !!}<br>
{!! Form::select('categories[]', $cat_ar, null, ['multiple' => 'multiple', 'class'=>'form-control']) !!}<br>
{!! Form::label('البلد') !!}<br>
{!! Form::select('country', $country_ar, null, ['class'=>'form-control']) !!}<br>
{!! Form::label('نوع المتقدم') !!}<br>
{!! Form::select('gender', ['ذكر', 'أنثى', 'الجميع'], null, ['class'=>'form-control']) !!}<br>


{!! Form::label('المرتب بالأرقام') !!}<br>
{!! Form::text('salary', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('العملة') !!}<br>
{!! Form::text('ar_currency', "", ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('العملة بالإنجليزية') !!}<br>
{!! Form::text('en_currency', "", ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('سنوات الخبرة') !!}<br>
{!! Form::select('experience', [0=> 'أقل من سنة', 1=>'سنة واحدة', 2=>'سنتان', 3=>'3 سنوات', 4=>'4 سنوات', 5=>'5 سنوات', 6=>'أكثر من 6 سنوات' ], null, ['class'=>'form-control']) !!}</b><br>


<h4><b>بيانات الإتصال</b></h4>
{!! Form::label('الهاتف') !!}<br>
{!! Form::text('phone', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('البريد الإلكتروني') !!}<br>
{!! Form::text('email', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('صورة') !!}<br>
{!! Form::file('image') !!}<br>
{!! Form::label('مدة الإعلان') !!}<br>
{!! Form::select('duration', $duration, null, ['class'=>'form-control']) !!}<br>
{!! Form::select('add_rank', [1=>'إعلان مميز', 0=>'إعلان غير مميز'], null, ['class'=>'form-control']) !!}<br>

{!! Form::submit('إضافة', ['class'=>'', 'id'=>'reg']) !!}
{!! Form::close() !!}
</div>
		</div>
</div>
@stop