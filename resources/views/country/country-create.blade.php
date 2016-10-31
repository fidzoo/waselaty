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

<h3>إضافة بلد جديدة:</h3><br>

{!! Form::open(["url"=>"countries", "class"=>"form-group"]) !!}
{!! Form::label('اسم البلد') !!}
{!! Form::text('ar_name', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('Country Name') !!}
{!! Form::text('en_name', "", ['class'=>'form-control']) !!}<br>
{!! Form::submit('إضافة', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop