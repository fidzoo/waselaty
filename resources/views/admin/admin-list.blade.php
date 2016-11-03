@extends('layouts.ar-dash')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        قائمة الأدمن
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>مسلسل</th>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>نوع الأدمن</th>
                    </tr>
                </thead>
                <tbody>
                <?php $order= 1; ?>
                @foreach($users as $user)
                    <tr>
                        <td>{!! $order !!}</td>
                        <?php $order= $order +1;?>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{@$user->roles[0]->ar_role}}</td>
						<td>{!! Form::open(["url"=>"admin-delete/$user->id", "method"=>"delete"]) !!} 
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