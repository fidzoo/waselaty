@extends('en.layouts.en-dash')

@section('content')

<h3>Available Countries:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Countries
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Country No.</th>
                        <th>Country Name</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>{{$country->id}}</td>
                        <td>{{$country->en_name}}</td>
						<td>{!! Form::open(["url"=>"countries/$country->id", "method"=>"delete"]) !!} 
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