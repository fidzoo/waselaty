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
                        <th>مسلسل</th>
                        <th>اسم البلد</th>
                        <th>Country Name</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $order= 1; ?>
                @foreach($countries as $country)
                    <tr>
                    {!! Form::open(["url"=>"countries/$country->id", "method"=>"patch"]) !!}
                        <td>{!! $order !!}</td>
                        <?php $order= $order +1;?>
                        <td>{!!Form::text('ar_name', $country->ar_name)!!}</td>
                        <td>{!!Form::text('en_name', $country->en_name)!!}</td>
                        <td>{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}</td>
                        {!! Form::close() !!}
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