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

<div><h3>Create a new admin:</h3></div><br>

{!! Form::open(["url"=>"new-admin", "class"=>"form-group"]) !!}
{!! Form::label('name') !!}<br>
{!! Form::text('name', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('E-mail') !!}<br>
{!! Form::email('email', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('Password') !!}&nbsp;
{!! Form::password('password', "", ['class'=>'form-control']) !!}<br>
{!! Form::label('Re-Type Password') !!}&nbsp;
{!! Form::password('password_confirmation', "", ['class'=>'form-control']) !!}<br><br>
{!! Form::label('Admin Role') !!}
{!! Form::select('role[]', $roles, null, ['class'=>'form-control']) !!}<br>

{!! Form::submit('Create', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop