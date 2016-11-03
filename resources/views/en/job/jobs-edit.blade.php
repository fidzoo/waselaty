@extends('en.layouts.en-main') @section('content')
<div class="main-container">
    <div class="clearfix"></div>
    <div class="container">
        <div class="row">
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


            <h3>Jobs Ads. List:</h3>
            <br>
            <div class="col-lg-9 col-md-9 col-sm-12 animated panel panel-default">

                <div class="panel-heading">
                    Ads.
                </div>
                <!-- /.panel-heading -->
                <div class="row">
                    <!-- /.panel-heading -->
                    <div class="panel-body col-md-12">
                        <div class="table-responsive table-bordered row">
                            <table class="table col-lg-12">
                                <!--
                <thead class="col-lg-12">
                    <tr>
                        <th>English Title</th>
                        <th>Arabic Title</th>
                    </tr>
                </thead>
-->
                                <tbody class="col-md-12 col-xs-12">
                                    @foreach($jobs as $job)
                                    <tr style="display: block;width: 100%;border: 1px solid #dedede;overflow: hidden;">
                                        <td class="col-md-2 col-xs-12">{{$job->en_title}}</td>
                                        <td class="col-md-2 col-xs-12">{{$job->ar_title}}</td>
                                        <td class="col-md-2 col-xs-12"> @if($job->approved == 1)Approved @elseif($job->approved == 2) Rejected @else Pendeing @endif
                                        </td>
                                        <td class="col-md-2 col-xs-12">{!!$job->price->en_title!!}</td>
                                        <td class="col-md-2 col-xs-12">@if($job->expire_date > $current_time) Still Valid 
                                        @elseif($job->expire_date == '0000-00-00 00:00:00') Pending
                                        @else Expired 
                                        @endif
                                        </td>
                                        <td class="col-md-1 col-xs-12">{!! Form::open(["url"=>"jobs/$job->id/edit", "method"=>"get"]) !!} {!! Form::submit('Edit', ['class'=>'btn']) !!} {!! Form::close() !!}</td>
                                        <td class="col-md-1 col-xs-12">{!! Form::open(["url"=>"jobs/$job->id", "method"=>"delete"]) !!} {!! Form::submit('Delete', ['class'=>'btn']) !!} {!! Form::close() !!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @stop