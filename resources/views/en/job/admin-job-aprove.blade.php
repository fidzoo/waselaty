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

<div><h3>Review Job Ad.:</h3></div><br>

{!! Form::open(["url"=>"jobs/$job->id", "files"=>true, "method"=>"patch", "class"=>"form-group"]) !!}
{!! Form::label('Arabic Job Title') !!}<br>
{!! Form::text('ar_title', $job->ar_title, ['class'=>'form-control']) !!}<br>
{!! Form::label('English Job Title') !!}<br>
{!! Form::text('en_title', $job->en_title, ['class'=>'form-control']) !!}<br>
{!! Form::label('Arabic Content') !!}<br>
{!! Form::textarea('ar_descrip', $job->ar_descrip, ['class'=>'form-control']) !!}<br>
{!! Form::label('English Content') !!}<br>
{!! Form::textarea('en_descrip', $job->en_descrip, ['class'=>'form-control']) !!}<br>
{!! Form::label('Job Section') !!}
{!! Form::select('categories[]', $cat_en, $selected, ['multiple' => 'multiple', 'class'=>'form-control']) !!}<br>
{!! Form::label('Country') !!}
{!! Form::select('country', $country_en, $job->country_id, ['class'=>'form-control']) !!}<br>
{!! Form::label('Gender') !!}
{!! Form::select('gender', ['Male', 'Female', 'Both'], $job->gender, ['class'=>'form-control']) !!}<br>

{!! Form::label('Salary') !!}<br>
{!! Form::text('salary', $job->salary, ['class'=>'form-control']) !!}<br>
{!! Form::label('Currency in Arabic') !!}<br>
{!! Form::text('ar_currency', $job->ar_currency, ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('Currency in English') !!}<br>
{!! Form::text('en_currency', $job->en_currency, ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('Required Experience') !!}<br>
{!! Form::select('experience', [0=> 'Less than 1 year', 1=>'1 year', 2=>'2 years', 3=>'3 years', 4=>'4 yesrs', 5=>'5 yesrs', 6=>'More than 6 years' ], $job->experience, ['class'=>'form-control']) !!}

<h4><b>بيانات الإتصال</b></h4>
{!! Form::label('Tel.') !!}<br>
{!! Form::text('phone', $job->phone, ['class'=>'form-control']) !!}<br>
{!! Form::label('E-mail') !!}<br>
{!! Form::text('email', $job->email, ['class'=>'form-control']) !!}<br>

{!! Form::label('Ad. Image') !!}<br>
{!! HTML::image($job->image, '',["width"=>"400"]) !!}<br><br>
{!! Form::label('Update Image') !!}<br>
{!! Form::file('image') !!}<br>
{!! Form::label('Ad. Rank') !!}<br>
{!! Form::select('add_rank', ['Normal Ad.', 'Premium'], $job->add_rank, ['class'=>'form-control']) !!}<br>
{!! Form::label('Ad. Duration') !!}<br>
{!! Form::select('duration', $duration, $job->price_id, ['class'=>'form-control']) !!}<br>
{!! Form::label('Payment Method') !!}<br>
{!! Form::select('payment', ['Unpaid yet', 'Cash', 'Paypal'], $job->payment, ['class'=>'form-control']) !!}<br>
{!! Form::label('Approve Ad.?') !!}<br>
{!! Form::submit('Approve', ['name'=>'review', 'class'=>'btn btn-success']) !!}
{!! Form::submit('Reject', ['name'=>'review', 'class'=>'btn btn-danger']) !!}
{!! Form::close() !!}

@stop