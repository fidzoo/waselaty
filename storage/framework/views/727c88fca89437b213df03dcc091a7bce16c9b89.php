<?php $__env->startSection('content'); ?>

<h3>أسعار الإعلانات للبايبال:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        الأسعار
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>نوع الإعلان</th>
                        <th>سعر الكاش</th>
                        <th>سعر بايبال</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($prices as $price): ?>
                    <tr>
                        <td><?php echo e($price->item); ?></td>
                        <td><?php echo e($price->price); ?>&nbsp;<?php echo e($price->currency); ?></td>
                        <td><?php echo e($price->paypal_price); ?>&nbsp;<?php echo e($price->paypal_currency); ?></td>
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