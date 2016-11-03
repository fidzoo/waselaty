@extends('en.layouts.en-dash')

@section('content')

<h3>Available ads.:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Available ads.
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Arabic Title</th>
                        <th>English Title</th>
                        <th>Ad. Owner</th>
                        @if($add_type == 1)
                        <th>Company Name</th>
                        @endif
                        <th>Ad. type</th>
                        <th>Approved?</th>
                        <th>Payment</th>
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
                        <td>{!! $job->user->company->en_company !!}</td>
                        @endif
                        <td>@if($job->add_rank == 0)Normal
                        @elseif($job->add_rank == 1)Premium
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
							{!! Form::submit('Show', ['class'=>'btn btn-success']) !!}
							{!! Form::close() !!}</td>
						<td>{!! Form::open(["url"=>"jobs/$job->id", "method"=>"delete"]) !!} 
							{!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
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