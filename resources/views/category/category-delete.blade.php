@extends('layouts.ar-dash')

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

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
                        <th>مسلسل</th>
                        <th>اسم التصنيف</th>
                        <th>Category Title</th>
                        <th>القسم الرئيسي</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $order= 1; ?>
                @foreach($categories as $category)
                    <tr>
                    {!! Form::open(["url"=>"categories/$category->id", "method"=>"patch"]) !!}
                        <td>{!! $order !!}</td>
                        <?php $order= $order +1;?>
                        <td>{!!Form::text('ar_title', $category->ar_title)!!}</td>
                        <td>{!!Form::text('en_title', $category->en_title)!!}</td>
                        <td>{!!Form::select('mcategory', $mcategories, @$category->mcategory->id)!!}</td>
                        <td>{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}</td>
                        {!! Form::close() !!}
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