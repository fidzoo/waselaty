@extends('layouts.ar-main')

@section('content')
    <div class="main-container">
        <div class="clearfix"></div>
        <div class="container">
            <aside class="col-lg-3 col-md-3 col-sm-3">
                <div class="row">
                    <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_up->link") !!}' target="_blank"><img src='{!! asset("$banner_up->ar_image") !!}' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="categories">
                        <div class="title">الأقسام</div>
                        <ul class="cats">
                        @foreach($mcat_ar as $id=>$mcat)
                            <li><a href='{!! URL::to("mcategory/$id") !!}'>{!!$mcat!!}</a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_mid->link") !!}' target="_blank"><img src='{!! asset("$banner_mid->ar_image") !!}' alt=""> </a></div>
                </div>
                <div class="row">
                    <div class="jobs">
                        <div class="title">الوظائف</div>
                        <ul class="cats">
                        @foreach($cat_ar as $id=>$cat)
                            <li><a href='{!! URL::to("categories/$id") !!}'>{!!$cat!!}</a></li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="row">
                        <div class="banner-ad"> <a href='{!! URL::to( "http://$banner_down->link") !!}' target="_blank"><img src='{!! asset("$banner_down->ar_image") !!}' alt=""> </a></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </aside>
            <div class="content col-lg-9 col-md-9 col-sm-9">
                <div class="latest-order-bar">
                    <h3>أحدث الوظائف المٌضافة</h3>
                    <form class="pull-right" action='{!! URL::to("ser-sort") !!}' method="GET">
                    {!!Form::hidden('mcategory', $mcategory)!!}
                    {!!Form::hidden('category', $category)!!}
                    {!!Form::hidden('gender', $gender)!!}
                    {!!Form::hidden('country', $country)!!}
                    {!!Form::hidden('experience', $experience)!!}
                    <select class="pull-right" name="order" id="order" onchange="this.form.submit();">
                        <option value="-1" disabled selected>ترتيب حسب</option>
                        <option value="recent" id="recent">أحدث الوظائف</option>
                        <option value="old" id="old">أقدم الوظائف</option>
                        <option value="most-exp" id="most-exp">الأكثر خبرة</option>
                        <option value="low-exp" id="low-exp">الأقل خبرة</option>
                    </select>
                    </form>
                </div>
                <div class="clearfix"></div>
                @if(count($rank_search) == 0 && count($search) == 0)
                <h2>عفواً لا توجد نتائج</h2>
                @endif

                <ul class="jobs">
                @foreach($rank_search as $r_job)
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2">
                        <a href='{!! URL::to("jobs/$r_job->id") !!}'>
                        <img class='zoom_01' src='{!! asset("$r_job->image") !!}' data-zoom-image='{!! asset("$r_job->image") !!}' alt="{!!$r_job->ar_title!!}"></a>
                            <div class="paid-strip">إعلان مميز</div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='{!! URL::to("jobs/$r_job->id") !!}'>
                                <h2>{!!$r_job->ar_title!!}</h2>
                                <p>{!!substr($r_job->ar_descrip, 0, 250)!!}..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>تاريخ الإضافة: {!!date("d/m",strtotime($r_job->created_at))!!}</li>
                                <li>الراتب: {!!$r_job->salary!!}&nbsp;{!!$r_job->ar_currency!!}</li>
                                <li>الدولة: {!!$r_job->country->ar_name!!}</li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                @endforeach
                @foreach($search as $job)
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2">
                        <a href='{!! URL::to("jobs/$job->id") !!}'>
                        <img class='zoom_01' src='{!! asset("$job->image") !!}' data-zoom-image='{!! asset("$job->image") !!}' alt="{!!$job->ar_title!!}"></a>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='{!! URL::to("jobs/$job->id") !!}'>
                                <h2>{!!$job->ar_title!!}</h2>
                                <p>{!!substr($job->ar_descrip, 0, 250)!!}..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>تاريخ الإضافة: {!!date("d/m",strtotime($job->created_at))!!}</li>
                                <li>الراتب: {!!$job->salary!!}&nbsp;{!!$job->ar_currency!!}</li>
                                <li>الدولة: {!!$job->country->ar_name!!}</li>
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