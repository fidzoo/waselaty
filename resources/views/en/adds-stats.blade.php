@extends('en.layouts.en-dash')

@section('content')

<h3>Ads. Stats:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Ads. waiting for approve
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ads. Titles</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Companies Ads. &nbsp &nbsp {!! HTML::image("assets/images/organization-24.ico") !!}</td>
                        <td>{!!$pending_company_adds!!}</td>
                    </tr>
                    <tr>
                        <td>Persons Ads. &nbsp {!! HTML::image("assets/images/user-24.ico") !!}</td>
                        <td>{!!$pending_person_adds!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@if (Session::get('role') == 'super')
<div class="panel panel-default">
    <div class="panel-heading">
        Companies Ads.
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Payment Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cash Paid Ads. &nbsp &nbsp {!! HTML::image("assets/images/banknotes-24.ico") !!}</td>
                        <td>{!!$cash_comp_adds!!}</td>
                    </tr>
                    <tr>
                        <td>Paypal Paid Ads. &nbsp {!! HTML::image("assets/images/paypal-3-32.ico") !!}</td>
                        <td>{!!$paypal_comp_adds!!}</td>
                    </tr>
                    <tr>
                        <td>Unpaid Ads. &nbsp &nbsp {!! HTML::image("assets/images/warning.ico") !!}</td>
                        <td>{!!$nopay_comp_adds!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        Persons Ads.
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Payment Status</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cash Paid Ads. &nbsp &nbsp {!! HTML::image("assets/images/banknotes-24.ico") !!}</td>
                        <td>{!!$cash_pers_adds!!}</td>
                    </tr>
                    <tr>
                        <td>Paypal Paid Ads. &nbsp {!! HTML::image("assets/images/paypal-3-32.ico") !!}</td>
                        <td>{!!$paypal_pers_adds!!}</td>
                    </tr>
                    <tr>
                        <td>Unpaid Ads. &nbsp &nbsp {!! HTML::image("assets/images/warning.ico") !!}</td>
                        <td>{!!$nopay_pers_adds!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
@stop