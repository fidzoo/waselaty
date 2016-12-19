<?php $__env->startSection('content'); ?>

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
                        <td>Companies Ads. &nbsp &nbsp <?php echo HTML::image("assets/images/organization-24.ico"); ?></td>
                        <td><?php echo $pending_company_adds; ?></td>
                    </tr>
                    <tr>
                        <td>Persons Ads. &nbsp <?php echo HTML::image("assets/images/user-24.ico"); ?></td>
                        <td><?php echo $pending_person_adds; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php if(Session::get('role') == 'super'): ?>
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
                        <td>Cash Paid Ads. &nbsp &nbsp <?php echo HTML::image("assets/images/banknotes-24.ico"); ?></td>
                        <td><?php echo $cash_comp_adds; ?></td>
                    </tr>
                    <tr>
                        <td>Paypal Paid Ads. &nbsp <?php echo HTML::image("assets/images/paypal-3-32.ico"); ?></td>
                        <td><?php echo $paypal_comp_adds; ?></td>
                    </tr>
                    <tr>
                        <td>Unpaid Ads. &nbsp &nbsp <?php echo HTML::image("assets/images/warning.ico"); ?></td>
                        <td><?php echo $nopay_comp_adds; ?></td>
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
                        <td>Cash Paid Ads. &nbsp &nbsp <?php echo HTML::image("assets/images/banknotes-24.ico"); ?></td>
                        <td><?php echo $cash_pers_adds; ?></td>
                    </tr>
                    <tr>
                        <td>Paypal Paid Ads. &nbsp <?php echo HTML::image("assets/images/paypal-3-32.ico"); ?></td>
                        <td><?php echo $paypal_pers_adds; ?></td>
                    </tr>
                    <tr>
                        <td>Unpaid Ads. &nbsp &nbsp <?php echo HTML::image("assets/images/warning.ico"); ?></td>
                        <td><?php echo $nopay_pers_adds; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>