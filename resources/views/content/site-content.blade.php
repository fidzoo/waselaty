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

<h3>تحديث جملة مسؤلية الموقع (في الصفحة الرئيسية):</h3><br>

{!! Form::open(["url"=>"site-content", "class"=>"form-group"]) !!}
{!! Form::hidden('item', 'policy') !!}
{!! Form::label('النسخة العربية') !!}
{!! Form::textarea('ar_content', $site_policy->ar_content, ['class'=>'form-control']) !!}<br>
{!! Form::label('النسخة الإنجليزية') !!}
{!! Form::textarea('en_content', $site_policy->en_content, ['class'=>'form-control']) !!}<br>
{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}
<br>
---------------------------------
<br>

<h3>تحديث سياسة تسجيل الشركات (صفحة تسجيل الشركات):</h3><br>

{!! Form::open(["url"=>"site-content", "class"=>"form-group"]) !!}
{!! Form::hidden('item', 'company_reg') !!}
{!! Form::label('النسخة العربية') !!}
{!! Form::textarea('ar_content', $company_reg->ar_content, ['class'=>'form-control']) !!}<br>
{!! Form::label('النسخة الإنجليزية') !!}
{!! Form::textarea('en_content', $company_reg->en_content, ['class'=>'form-control']) !!}<br>
{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}
<br>
---------------------------------
<br>

<h3>تحديث سياسة تسجيل الأفراد (صفحة تسجيل الأفراد):</h3><br>

{!! Form::open(["url"=>"site-content", "class"=>"form-group"]) !!}
{!! Form::hidden('item', 'person_reg') !!}
{!! Form::label('النسخة العربية') !!}
{!! Form::textarea('ar_content', $person_reg->ar_content, ['class'=>'form-control']) !!}<br>
{!! Form::label('النسخة الإنجليزية') !!}
{!! Form::textarea('en_content', $person_reg->en_content, ['class'=>'form-control']) !!}<br>
{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}


@stop