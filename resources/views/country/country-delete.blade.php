@extends('layouts.ar-dash')

@section('content')

<h3>البلدان المتاحة:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        البلد
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>رقم البلد</th>
                        <th>اسم البلد</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>{{$country->id}}</td>
                        <td>{{$country->ar_name}}</td>
						<td>{!! Form::open(["url"=>"countries/$country->id", "method"=>"delete"]) !!} 
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