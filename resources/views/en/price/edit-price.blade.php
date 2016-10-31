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

<div><h3>Prices Edit:</h3></div><br>

{!! Form::open(["url"=>"prices/$price->id", "class"=>"form-group", "method"=>"patch"]) !!}
{!! Form::label('Price Order') !!}<br>
{!! Form::text('id', $price->id, ['class'=>'form-control']) !!}<br>

{!! Form::label('Arabic Price Plan Title') !!}<br>
{!! Form::text('ar_item', $price->ar_item, ['class'=>'form-control']) !!}<br>

{!! Form::label('English Price Plan Title') !!}<br>
{!! Form::text('en_title', $price->en_title, ['class'=>'form-control']) !!}<br>

{!! Form::label('Ad. Duration for this price') !!}<br>
Number: {!! Form::number('number', $number)!!} {!!Form::select('duration', ['day'=>'Days', 'week'=>'Weeks', 'month'=>'Months', 'year'=>'Years'], $duration)!!}<br><br>

<h3>Normal Ads.:</h3><br>

{!! Form::label('Cash Price') !!}<br>
{!! Form::number('normal_price', $price->normal_price, ['class'=>'form-control']) !!}<br>

{!! Form::label('Currency') !!}<br>
{!! Form::text('norm_currency', $price->norm_currency,['class'=>'form-control']) !!}<br><br>

{!! Form::label('Paypal Price') !!}<br>
{!! Form::number('paypal_norm_price', $price->paypal_norm_price, ['class'=>'form-control']) !!}<br>

{!! Form::label('Currency') !!}<br>
{!! Form::select('paypal_norm_currency', ['USD'=>'US Dollars', 'EUR'=>'Euro'], $price->paypal_norm_currency, ['class'=>'form-control']) !!}<br><br>
------------------------------------
<h3>Premium Ads.:</h3><br>

{!! Form::label('Cash Price') !!}<br>
{!! Form::number('premium_price', $price->premium_price, ['class'=>'form-control']) !!}<br>

{!! Form::label('Currency') !!}<br>
{!! Form::text('prem_currency', $price->prem_currency,['class'=>'form-control']) !!}<br><br>

{!! Form::label('Paypal Price') !!}<br>
{!! Form::number('paypal_prem_price', $price->paypal_prem_price, ['class'=>'form-control']) !!}<br>

{!! Form::label('Currency') !!}<br>
{!! Form::select('paypal_prem_currency', ['USD'=>'US Dollars', 'EUR'=>'Euro'], $price->paypal_prem_currency, ['class'=>'form-control']) !!}<br><br>

{!! Form::submit('Update', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}

@stop

