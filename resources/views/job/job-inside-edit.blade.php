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

<h3>تعديل إعلان الوظيفة:</h3><br>
<div class="content col-lg-9 col-md-9 col-sm-12 animated">
{!! Form::open(["url"=>"jobs/$job->id", "files"=>true, "method"=>"patch", "class"=>"form-group", "id"=>"register"]) !!}
{!! Form::label('عنوان الإعلان') !!}<br>
{!! Form::text('ar_title', $job->ar_title, ['class'=>'form-control']) !!}<br>
{!! Form::label('Add Title') !!}<br>
{!! Form::text('en_title', $job->en_title, ['class'=>'form-control']) !!}<br>
{!! Form::label('محتوى الإعلان') !!}<br>
{!! Form::textarea('ar_descrip', $job->ar_descrip, ['class'=>'form-control']) !!}<br>
{!! Form::label('Add Content') !!}<br>
{!! Form::textarea('en_descrip', $job->en_descrip, ['class'=>'form-control']) !!}<br>
{!! Form::label('تصنيف الإعلان') !!}<br>
{!! Form::select('categories[]', $cat_ar, $selected, ['multiple' => 'multiple', 'class'=>'form-control']) !!}<br>
{!! Form::label('البلد') !!}<br>
{!! Form::select('country', $country_ar, $job->country_id, ['class'=>'form-control']) !!}<br>
{!! Form::label('نوع المتقدم') !!}<br>
{!! Form::select('gender', ['ذكر', 'أنثى', 'الجميع'], $job->gender, ['class'=>'form-control']) !!}<br>


{!! Form::label('المرتب بالأرقام') !!}<br>
{!! Form::text('salary', $job->salary, ['class'=>'form-control']) !!}<br>
{!! Form::label('العملة') !!}<br>
{!! Form::text('ar_currency', $job->ar_currency, ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('العملة بالإنجليزية') !!}<br>
{!! Form::text('en_currency', $job->en_currency, ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('سنوات الخبرة') !!}<br>
{!! Form::select('experience', [0=> 'أقل من سنة', 1=>'سنة واحدة', 2=>'سنتان', 3=>'3 سنوات', 4=>'4 سنوات', 5=>'5 سنوات', 6=>'أكثر من 6 سنوات' ], $job->experience, ['class'=>'form-control']) !!}<br>


<h4><b>بيانات الإتصال</b></h4>
{!! Form::label('الهاتف') !!}<br>
{!! Form::text('phone', $job->phone, ['class'=>'form-control']) !!}<br>
{!! Form::label('البريد الإلكتروني') !!}<br>
{!! Form::text('email', $job->email, ['class'=>'form-control']) !!}<br>

{!! Form::label('تحديث الصورة') !!}<br>
{!! Form::file('image') !!}<br>


{!! Form::submit('تحديث', ['class'=>'btn']) !!}
{!! Form::close() !!}
</div>
        </div>
</div>
@stop