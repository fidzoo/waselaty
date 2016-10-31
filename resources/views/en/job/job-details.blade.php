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
                    <h1 class="center-text">{!!$job->en_title!!}</h1>
                </div>
                <ul class="jobs">
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-4 col-md-4"><img src='{!! asset("$job->image") !!}' alt="job-image"> </div>
                        <div class="col-lg-8 last col-md-8">
                            <ul class="details">
                                <li>Created at: {!!$job->created_at!!}</li>
                                <li>Salary: {!!$job->salary!!}&nbsp;{!!$job->en_currency!!}</li>
                                <li>Country: {!!$job->country->en_name!!}</li>
                            </ul>
                            <ul class="details">
                                <li>Job Title : {!!$job->categories[0]->en_title!!}</li>
                                <li>Experience years : {!!$job->experience!!}</li>
                                <li>Gender : {!!$gender!!}</li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="job-details">
                         <h3>Job Details</h3>
                         <p>{!!$job->en_descrip!!} 
</p>
                         <hr>
                         <h3>Contacts</h3>
                         <h4>Tel. : {!!$job->phone!!}</h4>
                         <h4>E-mail : {!!$job->email!!}</h4>
                        </div>
                    </li>
                </ul>               
                <div class="latest-order-bar comments">
                    <h3 class="center-text">Comments</h3>
                    <h2>Previous Comments</h2>
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
                    <h2>Send Comment</h2>
                    {!! Form::open(["url"=>"comments/$job->id"]) !!}
                    <input type="test" name="title" placeholder="Comment Title">
                    <textarea name="comment" id="comment" placeholder="Add your comment here"></textarea>
                    <button value="submit" id="">Send your comment</button>
                    {!! Form::close() !!}
                </div>
                <div class="clearfix"></div>
                @if(count($relate_jobs) !== 1)
                <div class="latest-order-bar">
                    <h3 class="center-text">Related Jobs</h3>
                </div>
                <div class="clearfix"></div>
                <ul class="jobs">
                    @foreach($relate_jobs as $re_job)
                    	@if($re_job->id == $job->id)
                            @continue
                        @endif
                    <li class="wow fadeIn" data-wow-delay=".2s" data-wow-duration="1s">
                        <div class="col-lg-2 col-md-2"><img src='{!! asset("$re_job->image") !!}' alt="{!!$re_job->en_title!!}"> </div>
                        <div class="col-lg-8 col-md-8">
                            <a href='{!! URL::to("jobs/$re_job->id") !!}'>
                                <h2>{!!$re_job->en_title!!}</h2>
                                <p>{!!substr($re_job->en_descrip, 0, 250)!!}..</p>
                            </a>
                        </div>
                        <div class="col-lg-2 last col-md-2">
                            <ul class="details">
                                <li>Created at: {!!date("d/m",strtotime($re_job->created_at))!!}</li>
                                <li>Salary: {!!$re_job->salary!!}&nbsp;{!!$re_job->en_currency!!}</li>
                                <li>Country: {!!$re_job->country->en_name!!}</li>
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