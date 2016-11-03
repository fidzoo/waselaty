@extends('layouts.ar-dash')

@section('content')

<h3>اعلانات الوظائف المتاحة:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        الإعلانات المتاحة
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>مسلسل</th>
                        <th>الوظيفة</th>
                        <th>Job title</th>
                        <th>صاحب الإعلان</th>
                        @if($add_type == 1)
                        <th>اسم الشركة</th>
                        @endif
                        <th>نوع الإعلان</th>
                        <th>تم الموافقة؟</th>
                        <th>الدفع</th>
                    </tr>
                </thead>
                <tbody>
                <?php $order= 1; ?>
                @foreach($jobs as $job)
                    <tr>
                        <td>{!! $order !!}</td>
                        <?php $order= $order +1;?>
                        <td>{{$job->ar_title}}</td>
                        <td>{{$job->en_title}}</td>
                        <td>{{$job->user->name}}</td>
                        @if($add_type == 1)
                        <td>{!! $job->user->company->ar_company !!}</td>
                        @endif
                        <td>@if($job->add_rank == 0)غير مميز
                        @elseif($job->add_rank == 1)إعلان مميز
                        @endif</td>
                        <td>@if($job->approved == 1)
                        <center>{!! HTML::image("assets/images/checkmark.ico") !!}</center>
                        @elseif($job->approved == 2) <center>{!! HTML::image("assets/images/x-mark.ico") !!}</center>
                        @else <center>{!! HTML::image("assets/images/warning.ico") !!}</center>
                        @endif</td>
                        <td>@if($job->payment == 1)
                        <center>{!! HTML::image("assets/images/banknotes-24.ico") !!}</center>
                        @elseif($job->payment == 2) <center>{!! HTML::image("assets/images/paypal-3-32.ico") !!}</center>
                        @else <center>{!! HTML::image("assets/images/warning.ico") !!}</center>
                        @endif</td>
                        <td>{!! Form::open(["url"=>"jobs/$job->id/edit", "method"=>"get"]) !!}
							{!! Form::submit('استعراض', ['class'=>'btn btn-success']) !!}
							{!! Form::close() !!}</td>
						<td>{!! Form::open(["url"=>"jobs/$job->id", "method"=>"delete"]) !!} 
							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <center>{!!$jobs->links()!!}</center>
    </div>
</div>

@stop