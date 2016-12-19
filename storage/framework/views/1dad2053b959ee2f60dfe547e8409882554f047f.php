<?php $__env->startSection('content'); ?>

<h3>احصائيات الإعلانات:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        اعلانات الشركات
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
                        <td>عدد الإعلانات المدفوعة كاش &nbsp &nbsp <?php echo HTML::image("assets/images/banknotes-24.ico"); ?></td>
                        <td><?php echo $cash_comp_adds; ?></td>
                    </tr>
                    <tr>
                        <td>عدد الإعلانات المدفوعة بايبال &nbsp <?php echo HTML::image("assets/images/paypal-3-32.ico"); ?></td>
                        <td><?php echo $paypal_comp_adds; ?></td>
                    </tr>
                    <tr>
                        <td>عدد الإعلانات غير المدفوعة بعد &nbsp &nbsp <?php echo HTML::image("assets/images/warning.ico"); ?></td>
                        <td><?php echo $nopay_comp_adds; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        اعلانات الأفراد
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
                        <td>عدد الإعلانات المدفوعة كاش &nbsp &nbsp <?php echo HTML::image("assets/images/banknotes-24.ico"); ?></td>
                        <td><?php echo $cash_pers_adds; ?></td>
                    </tr>
                    <tr>
                        <td>عدد الإعلانات المدفوعة بايبال &nbsp <?php echo HTML::image("assets/images/paypal-3-32.ico"); ?></td>
                        <td><?php echo $paypal_pers_adds; ?></td>
                    </tr>
                    <tr>
                        <td>عدد الإعلانات غير المدفوعة بعد &nbsp &nbsp <?php echo HTML::image("assets/images/warning.ico"); ?></td>
                        <td><?php echo $nopay_pers_adds; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>