@extends('en.layouts.en-dash')

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

<h3>Insert New Main Section:</h3><br>

{!! Form::open(["url"=>"mcategory", "class"=>"form-group"]) !!}
{!! Form::label('Arabic Section Title') !!}
{!! Form::text('ar_title', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('English Section Title') !!}
{!! Form::text('en_title', "", ['class'=>'form-control']) !!}<br>
{!! Form::submit('Insert', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop