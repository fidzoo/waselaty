@extends('en.layouts.en-main')

@section('content')
    <div class="main-container">
        <div class="clearfix"></div>
        <div class="container">
            <aside class="col-lg-3 col-md-3 col-sm-3">
                <div class="row">
                    <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_up->link") !!}' target="_blank"><img src='{!! asset("$banner_up->en_image") !!}' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="categories">
                        <div class="title">Sections</div>
                        <ul class="cats">
                        @foreach($mcat_en as $id=>$mcat)
                            <li><a href='{!! URL::to("mcategory/$id") !!}'>{!!$mcat!!}</a></li>
                        @endforeach
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
            <div class="content col-lg-9 col-md-9 col-sm-9">
                <div class="latest-order-bar">
                    <h3>Recent Added Jobs</h3>
                    <form action='{!! URL::to("result-sort") !!}' method="GET"  class="pull-right">
                    {!!Form::hidden('page_results', $hidden)!!}
                    {!!Form::hidden('cat_id', $cat_id)!!}
                    <select class="pull-right" name="order" id="order" onchange="this.form.submit();">
                        <option value="-1" disabled selected>Sort Jobs By:</option>
                        <option value="recent" id="recent">Recent Jobs</option>
                        <option value="old" id="old">Oldest Jobs</option>
                        <option value="most-exp" id="most-exp">Most Experience</option>
                        <option value="low-exp" id="low-exp">Less Experience</option>
                    </select>
                    </form>
                </div>
                <div class="clearfix"></div>
                <ul class="jobs">
                <!--ranked companies-->
                @foreach($rank_jobs as $r_job)
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='{!! asset("$r_job->image") !!}' alt="{!!$r_job->en_title!!}">
                            <div class="paid-strip">Premium</div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='{!! URL::to("jobs/$r_job->id") !!}'>
                                <h2>{!!$r_job->en_title!!}</h2>
                                <p>{!!substr($r_job->en_descrip, 0, 250)!!}..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>Created at: {!!date("d/m",strtotime($r_job->created_at))!!}</li>
                                <li>Salary: {!!$r_job->salary!!}&nbsp;{!!$r_job->en_currency!!}</li>
                                <li>Country: {!!$r_job->country->en_name!!}</li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                @endforeach <!--end of ranked companies-->
                <!--normal companies-->
                @foreach($jobs as $job)               
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='{!! asset("$job->image") !!}' alt="{!!$job->en_title!!}">
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='{!! URL::to("jobs/$job->id") !!}'>
                                <h2>{!!$job->en_title!!}</h2>
                                <p>{!!substr($job->en_descrip, 0, 250)!!}..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>Created at: {!!date("d/m",strtotime($job->created_at))!!}</li>
                                <li>Salary: {!!$job->salary!!}&nbsp;{!!$job->en_currency!!}</li>
                                <li>Country: {!!$job->country->en_name!!}</li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                @endforeach
                </ul>
                <div class="col-lg-12">
                   <div class="contain-pager">
                    <ul class="pagination">
                        {!!$jobs->links()!!}
                    </ul></div>
                    </div>
            </div>
        </div>
    </div>
@stop