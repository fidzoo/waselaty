@extends('en.layouts.en-dash')

@section('content')

<h3>Available Sections:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Sections
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Section No.</th>
                        <th>Section Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->en_title}}</td>
						<td>{!! Form::open(["url"=>"categories/$category->id", "method"=>"delete"]) !!} 
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