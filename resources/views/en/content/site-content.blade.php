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

<h3>Update Site Policy (Location: Main Page):</h3><br>

{!! Form::open(["url"=>"site-content", "class"=>"form-group"]) !!}
{!! Form::hidden('item', 'policy') !!}
{!! Form::label('Arabic Version') !!}
{!! Form::textarea('ar_content', $site_policy->ar_content, ['class'=>'form-control']) !!}<br>
{!! Form::label('English Version') !!}
{!! Form::textarea('en_content', $site_policy->en_content, ['class'=>'form-control']) !!}<br>
{!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}
<br>
---------------------------------
<br>

<h3>Update Companies Registration Policy (Companies Registration page):</h3><br>

{!! Form::open(["url"=>"site-content", "class"=>"form-group"]) !!}
{!! Form::hidden('item', 'company_reg') !!}
{!! Form::label('Arabic Version') !!}
{!! Form::textarea('ar_content', $company_reg->ar_content, ['class'=>'form-control']) !!}<br>
{!! Form::label('English Version') !!}
{!! Form::textarea('en_content', $company_reg->en_content, ['class'=>'form-control']) !!}<br>
{!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}
<br>
---------------------------------
<br>

<h3>Update Persons Registration Policy (Persons Registration page):</h3><br>

{!! Form::open(["url"=>"site-content", "class"=>"form-group"]) !!}
{!! Form::hidden('item', 'person_reg') !!}
{!! Form::label('Arabic Version') !!}
{!! Form::textarea('ar_content', $person_reg->ar_content, ['class'=>'form-control']) !!}<br>
{!! Form::label('English Version') !!}
{!! Form::textarea('en_content', $person_reg->en_content, ['class'=>'form-control']) !!}<br>
{!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}


@stop