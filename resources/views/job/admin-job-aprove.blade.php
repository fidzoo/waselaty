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

<div><h3>مراجعة إعلان الوظيفة:</h3></div><br>

{!! Form::open(["url"=>"jobs/$job->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]) !!}
{!! Form::label('عنوان الوظيفة') !!}<br>
{!! Form::text('ar_title', $job->ar_title, ['class'=>'form-control']) !!}<br>
{!! Form::label('Job Title') !!}<br>
{!! Form::text('en_title', $job->en_title, ['class'=>'form-control']) !!}<br>
{!! Form::label('وصف الوظيفة') !!}<br>
{!! Form::textarea('ar_descrip', $job->ar_descrip, ['class'=>'form-control']) !!}<br>
{!! Form::label('Job description') !!}<br>
{!! Form::textarea('en_descrip', $job->en_descrip, ['class'=>'form-control']) !!}<br>
{!! Form::label('تصنيف الوظيفة') !!}
{!! Form::select('categories[]', $cat_ar, $selected, ['multiple' => 'multiple', 'class'=>'form-control']) !!}<br>
{!! Form::label('البلد') !!}
{!! Form::select('country', $country_ar, $job->country_id, ['class'=>'form-control']) !!}<br>
{!! Form::label('نوع المتقدم') !!}
{!! Form::select('gender', ['ذكر', 'أنثى', 'الجميع'], $job->gender, ['class'=>'form-control']) !!}<br>

{!! Form::label('المرتب') !!}<br>
{!! Form::text('salary', $job->salary, ['class'=>'form-control']) !!}<br>
{!! Form::label('العملة بالعربية') !!}<br>
{!! Form::text('ar_currency', $job->ar_currency, ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('العملة بالإنجليزية') !!}<br>
{!! Form::text('en_currency', $job->en_currency, ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('الخبرة المطلوبة') !!}<br>
{!! Form::select('experience', [0=> 'أقل من سنة', 1=>'سنة واحدة', 2=>'سنتان', 3=>'3 سنوات', 4=>'4 سنوات', 5=>'5 سنوات', 6=>'أكثر من 6 سنوات' ], $job->experience, ['class'=>'form-control']) !!}<br>

<h4><b>بيانات الإتصال</b></h4>
{!! Form::label('الهاتف') !!}<br>
{!! Form::text('phone', $job->phone, ['class'=>'form-control']) !!}<br>
{!! Form::label('البريد الإلكتروني') !!}<br>
{!! Form::text('email', $job->email, ['class'=>'form-control']) !!}<br>

{!! Form::label('صورة للوظيفة') !!}<br>
{!! HTML::image($job->image, '',["width"=>"400"]) !!}<br><br>
{!! Form::label('تحديث الصورة') !!}<br>
{!! Form::file('image') !!}<br>
{!! Form::label('نوع الإعلان') !!}<br>
{!! Form::select('add_rank', ['إعلان غير مميز', 'إعلان مميز'], $job->add_rank, ['class'=>'form-control']) !!}<br>
{!! Form::label('مدة الإعلان') !!}<br>
{!! Form::select('duration', $duration, $job->price_id, ['class'=>'form-control']) !!}<br>
{!! Form::label('طريقة الدفع') !!}<br>
{!! Form::select('payment', ['لم يتم الدفع بعد', 'كاش', 'بايبال'], $job->payment, ['class'=>'form-control']) !!}<br>
{!! Form::label('الموافقة على الإعلان؟') !!}<br>
{!! Form::submit('موافقة', ['name'=>'review', 'class'=>'btn btn-success']) !!}
{!! Form::submit('رفض', ['name'=>'review', 'class'=>'btn btn-danger']) !!}
{!! Form::close() !!}

@stop