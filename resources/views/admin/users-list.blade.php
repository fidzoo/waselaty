@extends('layouts.ar-dash')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        قائمة المسجلين
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>الهاتف</th>
                        @if($user_type == 'company')
                        <th>اسم الشركة</th>
                        <th>Company Name</th>
                        @endif
                        <th>تاريخ التسجيل</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td style=" direction: ltr;text-align: right;"> 
                            <span>{{$user->country_code}}</span> &nbsp; 
                            <span>{{$user->phone}}</span> 
                        </td>
                        @if($user_type == 'company')
                        <td>{{$user->company->ar_company}}</td>
                        <td>{{$user->company->en_company}}</td>
                        @endif
                        <td>{{$user->created_at}}</td>
						<td>{!! Form::open(["url"=>"user-delete/$user->id", "method"=>"delete"]) !!} 
							{!! Form::submit('حذف', ['class'=>'btn btn-danger']) !!}
							{!! Form::close() !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {!!$users->links()!!}
    </div>
</div>


@stop