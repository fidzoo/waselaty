@extends('layouts.ar-dash')

@section('content')

<h3>الأقسام الرئيسية المتاحة:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        الأقسام
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>مسلسل</th>
                        <th>اسم القسم</th>
                        <th>Section Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php $order= 1; ?>
                @foreach($mcats as $cat)
                    <tr>
                        {!! Form::open(["url"=>"mcategory/$cat->id", "method"=>"patch"]) !!}
                        <td>{!! $order !!}</td>
                        <?php $order= $order +1;?>
                        <td>{!!Form::text('ar_title', $cat->ar_title)!!}</td>
                        <td>{!!Form::text('en_title', $cat->en_title)!!}</td>
                        <td>{!! Form::submit('تحديث', ['class'=>'btn btn-info']) !!}</td>
                        {!! Form::close() !!}
						<td>{!! Form::open(["url"=>"mcategory/$cat->id", "method"=>"delete"]) !!} 
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