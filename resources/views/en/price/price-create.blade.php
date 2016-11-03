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

<div><h3>Insert New Price:</h3></div><br>

{!! Form::open(["url"=>"prices", "class"=>"form-group"]) !!}
{!! Form::label('Arabic Price Tile') !!}<br>
{!! Form::text('ar_item', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('English Price Tile') !!}<br>
{!! Form::text('en_title', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('Price Type (Ad. duration)') !!}<br>
Number: {!! Form::number('number', '', ['min'=>0])!!} {!!Form::select('duration', ['day'=>'Days', 'week'=>'Weeks', 'month'=>'Months', 'year'=>'Years',])!!}<br><br>

<h3>Normal Ads.:</h3><br>

{!! Form::label('Cash Price') !!}<br>
{!! Form::number('normal_price', "", ['class'=>'form-control', 'step' => 'any', 'min'=>0]) !!}<br>

{!! Form::label('Currency') !!}<br>
{!! Form::text('norm_currency', "",['class'=>'form-control']) !!}<br><br>

{!! Form::label('Paypal Price') !!}<br>
{!! Form::number('paypal_norm_price', "", ['class'=>'form-control', 'step' => 'any', 'min'=>0]) !!}<br>

{!! Form::label('Currency') !!}<br>
{!! Form::select('paypal_norm_currency', ['USD'=>'US Dollars', 'EUR'=>'Euro'], ['class'=>'form-control']) !!}<br><br>
------------------------------------
<h3>Premium Ads.:</h3><br>

{!! Form::label('Cash Price') !!}<br>
{!! Form::number('premium_price', "", ['class'=>'form-control', 'step' => 'any', 'min'=>0]) !!}<br>

{!! Form::label('Currency') !!}<br>
{!! Form::text('prem_currency', "",['class'=>'form-control']) !!}<br><br>

{!! Form::label('Paypal Price') !!}<br>
{!! Form::number('paypal_prem_price', "", ['class'=>'form-control', 'step' => 'any', 'min'=>0]) !!}<br>

{!! Form::label('Currency') !!}<br>
{!! Form::select('paypal_prem_currency', ['USD'=>'US Dollars', 'EUR'=>'Euro'], ['class'=>'form-control']) !!}<br><br>

{!! Form::submit('Submit', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}
@stop

