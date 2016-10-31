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

<h3>إضافة قسم رئيسي جديد:</h3><br>

{!! Form::open(["url"=>"mcategory", "class"=>"form-group"]) !!}
{!! Form::label('عنوان القسم') !!}
{!! Form::text('ar_title', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('Category Title') !!}
{!! Form::text('en_title', "", ['class'=>'form-control']) !!}<br>
{!! Form::submit('إضافة', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop