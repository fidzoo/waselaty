<?php $__env->startSection('content'); ?>

<h3>أسعار الإعلانات:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        الإعلانات العادية
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>ترتيب عرض السعر</th>
                        <th>عنوان التسعير</th>
                        <th>سعر الكاش</th>
                        <th>سعر بايبال</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($prices as $price): ?>
                    <tr>
                        <td><?php echo e($price->id); ?></td>
                        <td><?php echo e($price->ar_item); ?></td>
                        <td><?php echo e($price->normal_price); ?>&nbsp;<?php echo e($price->norm_currency); ?></td>
                        <td><?php echo e($price->paypal_norm_price); ?>&nbsp;<?php echo e($price->paypal_norm_currency); ?></td>
                        <td><?php echo Form::open(["url"=>"prices/$price->id/edit", "method"=>"get"]); ?> 
                            <?php echo Form::submit('تحديث', ['class'=>'btn btn-success']); ?>

                            <?php echo Form::close(); ?></td>
						<td><?php echo Form::open(["url"=>"prices/$price->id", "method"=>"delete"]); ?> 
							<?php echo Form::submit('حذف', ['class'=>'btn btn-danger']); ?>

							<?php echo Form::close(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        الإعلانات المميزة
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>ترتيب عرض السعر</th>
                        <th>عنوان التسعير</th>
                        <th>سعر الكاش</th>
                        <th>سعر بايبال</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($prices as $price): ?>
                    <tr>
                        <td><?php echo e($price->id); ?></td>
                        <td><?php echo e($price->ar_item); ?></td>
                        <td><?php echo e($price->premium_price); ?>&nbsp;<?php echo e($price->   prem_currency); ?></td>
                        <td><?php echo e($price->paypal_prem_price); ?>&nbsp;<?php echo e($price->paypal_prem_currency); ?></td>
                        <td><?php echo Form::open(["url"=>"prices/$price->id/edit", "method"=>"get"]); ?> 
                            <?php echo Form::submit('تحديث', ['class'=>'btn btn-success']); ?>

                            <?php echo Form::close(); ?></td>
                        <td><?php echo Form::open(["url"=>"prices/$price->id", "method"=>"delete"]); ?> 
                            <?php echo Form::submit('حذف', ['class'=>'btn btn-danger']); ?>

                            <?php echo Form::close(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>