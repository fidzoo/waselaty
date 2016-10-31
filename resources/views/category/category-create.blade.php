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

<h3>إضافة تصنيف جديد:</h3><br>

{!! Form::open(["url"=>"categories", "class"=>"form-group"]) !!}
{!! Form::label('نوع التصنيف') !!}
{!! Form::select('mcategory', $mcategory, null, ['class'=>'form-control']) !!}<br>
{!! Form::label('عنوان التصنيف') !!}
{!! Form::text('ar_title', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('Category Title') !!}
{!! Form::text('en_title', "", ['class'=>'form-control']) !!}<br>
{!! Form::submit('إضافة', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop