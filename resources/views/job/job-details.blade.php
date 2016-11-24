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
                    <h1 class="center-text">{!!$job->ar_title!!}</h1>
                </div>
                <ul class="jobs">
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s" style="overflow: visible;">
                        <div class="col-lg-4 col-md-4" id="job-image">
                        <img id="zoom_01"  src='{!! asset("$job->image") !!}' data-zoom-image='{!! asset("$job->image") !!}' alt="job-image"> </div>

   

                        <div class="col-lg-8 last col-md-8">
                            <ul class="details">
                                <li>تاريخ الإضافة: {!!$job->created_at!!}</li>
                                <li>الراتب: {!!$job->salary!!}&nbsp;{!!$job->ar_currency!!}</li>
                                <li>الدولة: {!!$job->country->ar_name!!}</li>
                            </ul>
                            <ul class="details">
                                <li>نوع الوظيفة : {!!$job->categories[0]->ar_title!!}</li>
                                <li>سنوات الخبرة : {!!$job->experience!!}</li>
                                <li>الجنس : {!!$gender!!}</li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="job-details">
                         <h3>تفاصيل الوظيفة</h3>
                         <p>{!!$job->ar_descrip!!} 
</p>
                         <hr>
                         <h3>طرق التواصل</h3>
                         <h4>الهاتف : {!!$job->phone!!}</h4>
                         <h4>البريد الإلكتروني : {!!$job->email!!}</h4>
                        </div>
                    </li>
                </ul>               
                <div class="latest-order-bar comments">
                    <h3 class="center-text">التعليقات</h3>
                    <h2>التعليقات السابقة</h2>
                       @foreach($comments as $comment)
                       <div class="acomment wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='{!! asset("assets/images/com_logo.png") !!}' alt="comment"> </div>
                        <div class="col-lg-8 col-md-10">
                                <h2>{!!$comment->ar_title!!}</h2>
                                <p>{!!$comment->ar_body!!}</p>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        </div>
                        @endforeach
                    <h2>أضف تعليقك</h2>
                    {!! Form::open(["url"=>"comments/$job->id"]) !!}
                    <input type="test" name="title" placeholder="عنوان التعليق">
                    <textarea name="comment" id="comment" placeholder="أضف تعليقك هنا"></textarea>
                    <button value="submit" id="">إرسل تعليقك</button>
                    {!! Form::close() !!}
                </div>
                <div class="clearfix"></div>
                @if(count($relate_jobs) !== 1)
                <div class="latest-order-bar">
                    <h3 class="center-text">وظائف ذات صلة</h3>
                </div>
                <div class="clearfix"></div>
                <ul class="jobs">
                    @foreach($relate_jobs as $re_job)
                    	@if($re_job->id == $job->id)
                            @continue
                        @endif
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2">
                        <img class='zoom_01' src='{!! asset("$re_job->image") !!}' data-zoom-image='{!! asset("$re_job->image") !!}' alt="{!!$re_job->ar_title!!}"> </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='{!! URL::to("jobs/$re_job->id") !!}'>
                                <h2>{!!$re_job->ar_title!!}</h2>
                                <p>{!!substr($re_job->ar_descrip, 0, 250)!!}..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>تاريخ الإضافة: {!!date("d/m",strtotime($re_job->created_at))!!}</li>
                                <li>الراتب: {!!$re_job->salary!!}&nbsp;{!!$re_job->ar_currency!!}</li>
                                <li>الدولة: {!!$re_job->country->ar_name!!}</li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>


@stop

