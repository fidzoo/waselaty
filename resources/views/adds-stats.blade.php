@extends('layouts.ar-dash')

@section('content')

<h3>إحصائيات الإعلانات:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        إعلانات في انتظار الموافقة عليها
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>نوع الإعلان</th>
                        <th>العدد</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>إعلانات شركات &nbsp &nbsp {!! HTML::image("assets/images/organization-24.ico") !!}</td>
                        <td>{!!$pending_company_adds!!}</td>
                    </tr>
                    <tr>
                        <td>إعلانات أفراد &nbsp {!! HTML::image("assets/images/user-24.ico") !!}</td>
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
        إعلانات الشركات
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>حالة الدفع</th>
                        <th>العدد</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>عدد الإعلانات المدفوعة كاش &nbsp &nbsp {!! HTML::image("assets/images/banknotes-24.ico") !!}</td>
                        <td>{!!$cash_comp_adds!!}</td>
                    </tr>
                    <tr>
                        <td>عدد الإعلانات المدفوعة بايبال &nbsp {!! HTML::image("assets/images/paypal-3-32.ico") !!}</td>
                        <td>{!!$paypal_comp_adds!!}</td>
                    </tr>
                    <tr>
                        <td>عدد الإعلانات غير المدفوعة بعد &nbsp &nbsp {!! HTML::image("assets/images/warning.ico") !!}</td>
                        <td>{!!$nopay_comp_adds!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        إعلانات الأفراد
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>حالة الدفع</th>
                        <th>العدد</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>عدد الإعلانات المدفوعة كاش &nbsp &nbsp {!! HTML::image("assets/images/banknotes-24.ico") !!}</td>
                        <td>{!!$cash_pers_adds!!}</td>
                    </tr>
                    <tr>
                        <td>عدد الإعلانات المدفوعة بايبال &nbsp {!! HTML::image("assets/images/paypal-3-32.ico") !!}</td>
                        <td>{!!$paypal_pers_adds!!}</td>
                    </tr>
                    <tr>
                        <td>عدد الإعلانات غير المدفوعة بعد &nbsp &nbsp {!! HTML::image("assets/images/warning.ico") !!}</td>
                        <td>{!!$nopay_pers_adds!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

@stop