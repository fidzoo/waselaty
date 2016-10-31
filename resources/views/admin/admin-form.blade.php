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

<div><h3>تعيين أدمن جديد:</h3></div><br>

{!! Form::open(["url"=>"new-admin", "class"=>"form-group"]) !!}
{!! Form::label('الاسم') !!}<br>
{!! Form::text('name', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('البريد الإلكتروني') !!}<br>
{!! Form::email('email', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('كلمة المرور') !!}&nbsp;
{!! Form::password('password', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('تأكيد كلمة المرور') !!}&nbsp;
{!! Form::password('password_confirmation', "", ['class'=>'form-control']) !!}<br><br>
{!! Form::label('نوع الأدمن') !!}
{!! Form::select('role[]', $roles, null, ['class'=>'form-control']) !!}<br>

{!! Form::submit('إضافة', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop