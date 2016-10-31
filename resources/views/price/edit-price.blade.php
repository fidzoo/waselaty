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

<div><h3>تعديل السعر:</h3></div><br>

{!! Form::open(["url"=>"prices/$price->id", "class"=>"form-group", "method"=>"patch"]) !!}
{!! Form::label('ترتيب السعر في العرض') !!}<br>
{!! Form::text('id', $price->id, ['class'=>'form-control']) !!}<br>

{!! Form::label('عنوان التسعير') !!}<br>
{!! Form::text('ar_item', $price->ar_item, ['class'=>'form-control']) !!}<br>

{!! Form::label('Enlgish Price Title') !!}<br>
{!! Form::text('en_title', $price->en_title, ['class'=>'form-control']) !!}<br>

{!! Form::label('مدة الإعلان لهذا السعر') !!}<br>
العدد: {!! Form::number('number', $number)!!} {!!Form::select('duration', ['day'=>'أيام', 'week'=>'أسابيع', 'month'=>'أشهر', 'year'=>'سنوات'], $duration)!!}<br><br>

<h3>الإعلانات العادية:</h3><br>

{!! Form::label('سعر الإعلان الكاش') !!}<br>
{!! Form::number('normal_price', $price->normal_price, ['class'=>'form-control']) !!}<br>

{!! Form::label('العملة') !!}<br>
{!! Form::text('norm_currency', $price->norm_currency,['class'=>'form-control']) !!}<br><br>

{!! Form::label('سعر الإعلان البايبال') !!}<br>
{!! Form::number('paypal_norm_price', $price->paypal_norm_price, ['class'=>'form-control']) !!}<br>

{!! Form::label('العملة') !!}<br>
{!! Form::select('paypal_norm_currency', ['USD'=>'دولار أمريكي', 'EUR'=>'يورو'], $price->paypal_norm_currency, ['class'=>'form-control']) !!}<br><br>
------------------------------------
<h3>الإعلانات المميزة:</h3><br>

{!! Form::label('سعر الإعلان الكاش') !!}<br>
{!! Form::number('premium_price', $price->premium_price, ['class'=>'form-control']) !!}<br>

{!! Form::label('العملة') !!}<br>
{!! Form::text('prem_currency', $price->prem_currency,['class'=>'form-control']) !!}<br><br>

{!! Form::label('سعر الإعلان البايبال') !!}<br>
{!! Form::number('paypal_prem_price', $price->paypal_prem_price, ['class'=>'form-control']) !!}<br>

{!! Form::label('العملة') !!}<br>
{!! Form::select('paypal_prem_currency', ['USD'=>'دولار أمريكي', 'EUR'=>'يورو'], $price->paypal_prem_currency, ['class'=>'form-control']) !!}<br><br>

{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}
@stop



