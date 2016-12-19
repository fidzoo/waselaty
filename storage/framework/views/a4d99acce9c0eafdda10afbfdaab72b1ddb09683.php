<?php $__env->startSection('content'); ?>

<h3>Banners Price Rate:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Normal Ads.
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ad. Order</th>
                        <th>Price Plan Title</th>
                        <th>Cash Price</th>
                        <th>Paypal Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($prices as $price): ?>
                    <tr>
                        <td><?php echo e($price->id); ?></td>
                        <td><?php echo e($price->en_item); ?></td>
                        <td><?php echo e($price->normal_price); ?>&nbsp;<?php echo e($price->norm_currency); ?></td>
                        <td><?php echo e($price->paypal_norm_price); ?>&nbsp;<?php echo e($price->paypal_norm_currency); ?></td>
                        <td><?php echo Form::open(["url"=>"prices/$price->id/edit", "method"=>"get"]); ?> 
                            <?php echo Form::submit('Update', ['class'=>'btn btn-success']); ?>

                            <?php echo Form::close(); ?></td>
                        <td><?php echo Form::open(["url"=>"prices/$price->id", "method"=>"delete"]); ?> 
                            <?php echo Form::submit('Delete', ['class'=>'btn btn-danger']); ?>

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
        Premium Ads.
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ad. Order</th>
                        <th>Price Plan Title</th>
                        <th>Cash Price</th>
                        <th>Paypal Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($prices as $price): ?>
                    <tr>
                        <td><?php echo e($price->id); ?></td>
                        <td><?php echo e($price->en_item); ?></td>
                        <td><?php echo e($price->premium_price); ?>&nbsp;<?php echo e($price->   prem_currency); ?></td>
                        <td><?php echo e($price->paypal_prem_price); ?>&nbsp;<?php echo e($price->paypal_prem_currency); ?></td>
                        <td><?php echo Form::open(["url"=>"prices/$price->id/edit", "method"=>"get"]); ?> 
                            <?php echo Form::submit('Update', ['class'=>'btn btn-success']); ?>

                            <?php echo Form::close(); ?></td>
                        <td><?php echo Form::open(["url"=>"prices/$price->id", "method"=>"delete"]); ?> 
                            <?php echo Form::submit('Delete', ['class'=>'btn btn-danger']); ?>

                            <?php echo Form::close(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>