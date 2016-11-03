@extends('en.layouts.en-dash')

@section('content')

<h3>Banners Price Rate:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Normal Ads.
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ad. Order</th>
                        <th>Price Plan Title</th>
                        <th>Cash Price</th>
                        <th>Paypal Price</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prices as $price)
                    <tr>
                        <td>{{$price->display_order}}</td>
                        <td>{{$price->en_item}}</td>
                        <td>{{$price->normal_price}}&nbsp;{{$price->norm_currency}}</td>
                        <td>{{$price->paypal_norm_price}}&nbsp;{{$price->paypal_norm_currency}}</td>
                        <td>{!! Form::open(["url"=>"prices/$price->id/edit", "method"=>"get"]) !!} 
                            {!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}</td>
                        <td>{!! Form::open(["url"=>"prices/$price->id", "method"=>"delete"]) !!} 
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Premium Ads.
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ad. Order</th>
                        <th>Price Plan Title</th>
                        <th>Cash Price</th>
                        <th>Paypal Price</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prices as $price)
                    <tr>
                        <td>{{$price->display_order}}</td>
                        <td>{{$price->en_item}}</td>
                        <td>{{$price->premium_price}}&nbsp;{{$price->   prem_currency}}</td>
                        <td>{{$price->paypal_prem_price}}&nbsp;{{$price->paypal_prem_currency}}</td>
                        <td>{!! Form::open(["url"=>"prices/$price->id/edit", "method"=>"get"]) !!} 
                            {!! Form::submit('Update', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}</td>
                        <td>{!! Form::open(["url"=>"prices/$price->id", "method"=>"delete"]) !!} 
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop