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
                    <form class="pull-right" action='{!! URL::to("ser-sort") !!}' method="GET">
                    {!!Form::hidden('mcategory', $mcategory)!!}
                    {!!Form::hidden('category', $category)!!}
                    {!!Form::hidden('gender', $gender)!!}
                    {!!Form::hidden('country', $country)!!}
                    {!!Form::hidden('experience', $experience)!!}
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
                @if(count($rank_search) == 0 && count($search) == 0)
                <h2>Sorry, There Is No Results!</h2>
                @endif
                                <style type="text/css">
                                    .free p
                                    {
                                        position: absolute;
                                        z-index: 999999;
                                        bottom: 0;
                                        display: block;
                                        font-size: 20px;
                                        width: 48%;
                                        margin: 0px auto;
                                        right: 0;
                                    }
                                    .free p span {
                                        display: block;
                                        font-size: 9px;
                                        margin: 0;
                                        text-align: left;
                                        padding-right: 10px;
                                        font-weight: bold;
                                    }
                                </style>
                <ul class="jobs">
                @foreach($rank_search as $r_job)
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img  src='{!! asset("$r_job->image") !!}' alt="{!!$r_job->ar_title!!}">
                        <div class="free hidden-sm  hidden-xs">
                            <a href='{!! URL::to("jobs/$r_job->id") !!}'>
                                <img  src='{!! asset("$r_job->image") !!}' data-zoom-image='{!! asset("$r_job->image") !!}' alt="{!!$r_job->ar_title!!}">
                                <p>
                                    <span>{!!$r_job->en_name!!}</span>
                                    <span>{!!$r_job->en_title!!}</span>
                                    <span>Experince: @if ($r_job->experience == 6) +  @endif {!!$r_job->experience!!}</span>
                                    @if($r_job->user->user_group == 'company')
                                    <span>{!!$r_job->user->company->en_company!!}</span>
                                    @else
                                    <span>Add. Owner: {!!$r_job->user->name!!}</span>
                                    @endif
                                </p>

                            </a>
                        </div>
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
                @endforeach
                @foreach($search as $job)
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='{!! asset("$job->image") !!}' alt="{!!$job->ar_title!!}">

                        <div class="free hidden-sm  hidden-xs">
                            <a href='{!! URL::to("jobs/$job->id") !!}'>
                                <img  src='{!! asset("$job->image") !!}' data-zoom-image='{!! asset("$job->image") !!}' alt="{!!$job->ar_title!!}">
                                <p>
                                    <span>{!!$job->en_name!!}</span>
                                    <span>{!!$job->en_title!!}</span>
                                    <span>Experince: @if ($job->experience == 6) + @endif {!!$job->experience!!}</span>
                                    @if($job->user->user_group == 'company')
                                    <span>{!!$job->user->company->en_company!!}</span>
                                    @else
                                    <span>Add. Owner: {!!$job->user->name!!}</span>
                                    @endif
                                </p>

                            </a>
                        </div>

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
                        {!!$search->appends(Request::only(['mcategory', 'category', 'gender', 'country', 'experience', 'order']))->links()!!}
                    </ul></div>
                    </div>
            </div>
        </div>
    </div>
@stop