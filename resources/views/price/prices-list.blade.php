@extends('layouts.ar-dash')

@section('content')

<h3>أسعار الإعلانات:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        الإعلانات العادية
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>ترتيب عرض السعر</th>
                        <th>عنوان التسعير</th>
                        <th>سعر الكاش</th>
                        <th>سعر بايبال</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prices as $price)
                    <tr>
                        <td>{{$price->id}}</td>
                        <td>{{$price->ar_item}}</td>
                        <td>{{$price->normal_price}}&nbsp;{{$price->norm_currency}}</td>
                        <td>{{$price->paypal_norm_price}}&nbsp;{{$price->paypal_norm_currency}}</td>
                        <td>{!! Form::open(["url"=>"prices/$price->id/edit", "method"=>"get"]) !!} 
                            {!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}</td>
						<td>{!! Form::open(["url"=>"prices/$price->id", "method"=>"delete"]) !!} 
							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
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
        الإعلانات المميزة
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>ترتيب عرض السعر</th>
                        <th>عنوان التسعير</th>
                        <th>سعر الكاش</th>
                        <th>سعر بايبال</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($prices as $price)
                    <tr>
                        <td>{{$price->id}}</td>
                        <td>{{$price->ar_item}}</td>
                        <td>{{$price->premium_price}}&nbsp;{{$price->   prem_currency}}</td>
                        <td>{{$price->paypal_prem_price}}&nbsp;{{$price->paypal_prem_currency}}</td>
                        <td>{!! Form::open(["url"=>"prices/$price->id/edit", "method"=>"get"]) !!} 
                            {!! Form::submit('تحديث', ['class'=>'btn btn-success']) !!}
                            {!! Form::close() !!}</td>
                        <td>{!! Form::open(["url"=>"prices/$price->id", "method"=>"delete"]) !!} 
                            {!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop