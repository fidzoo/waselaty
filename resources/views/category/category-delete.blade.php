@extends('layouts.ar-dash')

@section('content')

<h3>التصنيفات المتاحة:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        التصنيفات
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>رقم التصنيف</th>
                        <th>اسم التصنيف</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->ar_title}}</td>
						<td>{!! Form::open(["url"=>"categories/$category->id", "method"=>"delete"]) !!} 
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