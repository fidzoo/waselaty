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

<div><h3>إضافة سعر جديد:</h3></div><br>

{!! Form::open(["url"=>"prices", "class"=>"form-group"]) !!}
{!! Form::label('عنوان التسعير') !!}<br>
{!! Form::text('ar_item', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('Price Title') !!}<br>
{!! Form::text('en_title', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('الفئة السعرية (مدة الإعلان)') !!}<br>
العدد: {!! Form::number('number')!!} {!!Form::select('duration', ['day'=>'أيام', 'week'=>'أسابيع', 'month'=>'أشهر', 'year'=>'سنوات',])!!}<br><br>

<h3>الإعلانات العادية:</h3><br>

{!! Form::label('سعر الإعلان الكاش') !!}<br>
{!! Form::number('normal_price', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('العملة') !!}<br>
{!! Form::text('norm_currency', "",['class'=>'form-control']) !!}<br><br>

{!! Form::label('سعر الإعلان البايبال') !!}<br>
{!! Form::number('paypal_norm_price', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('العملة') !!}<br>
{!! Form::select('paypal_norm_currency', ['USD'=>'دولار أمريكي', 'EUR'=>'يورو'], ['class'=>'form-control']) !!}<br><br>
------------------------------------
<h3>الإعلانات المميزة:</h3><br>

{!! Form::label('سعر الإعلان الكاش') !!}<br>
{!! Form::number('premium_price', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('العملة') !!}<br>
{!! Form::text('prem_currency', "",['class'=>'form-control']) !!}<br><br>

{!! Form::label('سعر الإعلان البايبال') !!}<br>
{!! Form::number('paypal_prem_price', "", ['class'=>'form-control']) !!}<br>

{!! Form::label('العملة') !!}<br>
{!! Form::select('paypal_prem_currency', ['USD'=>'دولار أمريكي', 'EUR'=>'يورو'], ['class'=>'form-control']) !!}<br><br>

{!! Form::submit('إضافة', ['class'=>'btn btn-info']) !!}
{!! Form::close() !!}
@stop

