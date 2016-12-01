@extends('en.layouts.en-main')

@section('content')
<div class="main-container">
	    <div class="clearfix"></div>
        <div class="container">
            <aside class="col-lg-3 col-md-3 col-sm-3 col-XS-12">
                <div class="row">
                    <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_up->link") !!}' target="_blank"><img src='{!! asset("$banner_up->en_image") !!}' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="categories">
                        <div class="title">Dashboard</div>
                        <ul class="cats">
                            <li><a href='{!! URL::to("jobs-edit") !!}'>My Jobs</a></li>
                            <li><a href='{!! URL::to("jobs/create") !!}'>New Job</a></li>
                            <li><a href='{!! URL::to("adds-pay") !!}'>Ads. Payment</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_mid->link") !!}' target="_blank"><img src='{!! asset("$banner_mid->en_image") !!}' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="jobs">
                        <div class="title">Jobs</div>
                        <ul class="cats">
                        @foreach($cat_en as $id=>$cat)
                            <li><a href='{!! URL::to("categories/$id") !!}'>{!!$cat!!}</a></li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_down->link") !!}' target="_blank"><img src='{!! asset("$banner_down->en_image") !!}' alt=""> </a></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </aside>        


@if (count($errors) > 0)
	<div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        	<li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<h3>Edit Job Ad.:</h3><br>
<div class="content col-lg-9 col-md-9 col-sm-12 animated panel panel-default">
{!! Form::open(["url"=>"jobs/$job->id", "files"=>true, "method"=>"patch", "class"=>"form-group", "id"=>"register"]) !!}
{!! Form::label('Arabic Title') !!}<br>
{!! Form::text('ar_title', $job->ar_title, ['class'=>'form-control']) !!}<br>
{!! Form::label('English Title') !!}<br>
{!! Form::text('en_title', $job->en_title, ['class'=>'form-control']) !!}<br>
{!! Form::label('Arabic Content') !!}<br>
{!! Form::textarea('ar_descrip', $job->ar_descrip, ['class'=>'form-control']) !!}<br>
{!! Form::label('English Content') !!}<br>
{!! Form::textarea('en_descrip', $job->en_descrip, ['class'=>'form-control']) !!}<br>
{!! Form::label('Job Section') !!}<br>
{!! Form::select('categories[]', $cat_en, $selected, ['multiple' => 'multiple', 'class'=>'form-control']) !!}<br>
{!! Form::label('البلد') !!}<br>
{!! Form::select('Country', $country_en, $job->country_id, ['class'=>'form-control']) !!}<br>
{!! Form::label('نوع المتقدم') !!}<br>
{!! Form::select('Gender', ['Male', 'Female', 'Both'], $job->gender, ['class'=>'form-control']) !!}<br>


{!! Form::label('Salary With Numbers') !!}<br>
{!! Form::text('salary', $job->salary, ['class'=>'form-control']) !!}<br>
{!! Form::label('Currency In Arabic') !!}<br>
{!! Form::text('ar_currency', $job->ar_currency, ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('Currency In English') !!}<br>
{!! Form::text('en_currency', $job->en_currency, ['maxlength'=>'18', 'class'=>'form-control']) !!}<br>
{!! Form::label('Yesrs Of Experience') !!}<br>
{!! Form::select('experience', [0=> 'Less than 1 year', 1=>'1 year', 2=>'2 years', 3=>'3 years', 4=>'4 yesrs', 5=>'5 yesrs', 6=>'More than 6 years' ], $job->experience, ['class'=>'form-control']) !!}<br>


<h4><b>Contact Details</b></h4>
{!! Form::label('Tel.') !!}<br>
{!! Form::text('phone', $job->phone, ['class'=>'form-control']) !!}<br>
{!! Form::label('الجوال') !!}<br>
{!! Form::text('mobile', $job->mobile, ['class'=>'form-control']) !!}<br>
{!! Form::label('E-mail') !!}<br>
{!! Form::text('email', $job->email, ['class'=>'form-control']) !!}<br>
{!! Form::label('Map Location') !!}<br>
{!! Form::text('map', $job->map, ['class'=>'form-control']) !!}<br>

{!! Form::label('Update Image') !!}<br>
{!! Form::file('image') !!}<br>


{!! Form::submit('Update', ['class'=>'btn']) !!}
{!! Form::close() !!}
</div>
        </div>
</div>
@stop