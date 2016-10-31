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

			<h3>Jobs Ads.:</h3><br>
			<div class="col-lg-9 col-md-9 col-sm-12 animated panel panel-default">
			    <div class="panel-heading">
			        Ads.
			    </div>
			    <!-- /.panel-heading -->
			    <div class="panel-body">
			        <div class="col-lg-12 table-responsive table-bordered">
			            <table class="table col-lg-12">
			                <thead class="col-lg-12">
			                    <tr class="col-lg-12">
			                        <th class="col-lg-2">Arabic title</th>
			                        <th class="col-lg-2">English Title</th>
			                        <th class="col-lg-2">Admin Approve</th>
			                        <th class="col-lg-2">Ad. Rank</th>
			                        <th class="col-lg-2">Payment Status</th>
			                    </tr>
			                </thead>
<div class="clearfix"></div>
			                <tbody class="col-lg-12">
			                    @foreach($jobs as $job)
			                    <tr class="col-lg-12">
			                        <td class="col-lg-2">{!!$job->ar_title!!}</td>
			                        <td class="col-lg-2">{!!$job->en_title!!}</td>
			                        <td class="col-lg-2">@if($job->approved == 1)
                        			<center>{!! HTML::image("assets/images/checkmark.ico") !!}</center>
                        			@elseif($job->approved == 2) <center>{!! HTML::image("assets/images/x-mark.ico") !!}</center>
                        			@else <center>{!! HTML::image("assets/images/warning.ico") !!}</center>
                        			@endif</td>
			                        <td class="col-lg-2">@if($job->add_rank == 0)Normal
                        				@elseif($job->add_rank == 1)Premium
                        				@endif</td>
			                        <td class="col-lg-2">@if($job->payment == 1)
			                        <center>{!! HTML::image("assets/images/banknotes-24.ico") !!}</center>
			                        @elseif($job->payment == 2) <center>{!! HTML::image("assets/images/paypal-3-32.ico") !!}</center>
			                        @else <center>{!! HTML::image("assets/images/warning.ico") !!}</center>
			                        @endif</td>
			                        @if($job->payment == 0)
			                        <td class="col-lg-2"><form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
									<input type="hidden" name="cmd" value="_xclick">
									<input type="hidden" name="business" value="payment@waselti.com">
									<input type="hidden" name="lc" value="QA">
									@if($job->add_rank == 0)
									<input type="hidden" name="item_name" value="{!!$job->price->en_title!!}">
									<input type="hidden" name="item_number" value="{!!$job->price->id!!}">
									<input type="hidden" name="amount" value="{!!$job->price->paypal_norm_price!!}">
									<input type="hidden" name="currency_code" value="{!!$job->price->paypal_norm_currency!!}">
									@elseif($job->add_rank == 1)
									<input type="hidden" name="item_name" value="{!!$job->price->en_title!!}">
									<input type="hidden" name="item_number" value="{!!$job->price->id!!}">
									<input type="hidden" name="amount" value="{!!$job->price->paypal_prem_price!!}">
									<input type="hidden" name="currency_code" value="{!!$job->price->paypal_prem_currency!!}">			
									@endif
									<input type="hidden" name="button_subtype" value="services">
									<input type="hidden" name="no_note" value="0">
									<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_SM.gif:NonHostedGuest">
									<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_paynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
									<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
									</form>
									</td>
									@endif
			                    </tr>
			                    @endforeach
			                </tbody>
			            </table>
			        </div>
			    </div>
			</div> 
			           	
    	</div>
	</div>

@stop