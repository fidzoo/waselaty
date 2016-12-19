<?php $__env->startSection('content'); ?>

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
                        <th>#</th>
                        <th>English Country Name</th>
                        <th>Arabic Country Name</th>
                    </tr>
                </thead>
                <tbody> 
                 <?php $order= 1; ?>
                <?php foreach($countries as $country): ?>
                    <tr>
                    <?php echo Form::open(["url"=>"countries/$country->id", "method"=>"patch"]); ?>

                        <td><?php echo $order; ?></td>
                        <?php $order= $order +1;?>
                        <td><?php echo Form::text('en_name', $country->en_name); ?></td>
                        <td><?php echo Form::text('ar_name', $country->ar_name); ?></td>
                        <td><?php echo Form::submit('Update', ['class'=>'btn btn-info']); ?></td>
                        <?php echo Form::close(); ?>

                        <td><?php echo Form::open(["url"=>"countries/$country->id", "method"=>"delete"]); ?> 
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