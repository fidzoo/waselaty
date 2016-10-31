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

<h3>Insert New Country:</h3><br>

{!! Form::open(["url"=>"countries", "class"=>"form-group"]) !!}
{!! Form::label('Arabic Country Name') !!}
{!! Form::text('ar_name', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('English Country Name') !!}
{!! Form::text('en_name', "", ['class'=>'form-control']) !!}<br>
{!! Form::submit('Insert', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop