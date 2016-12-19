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
                        <th>Country No.</th>
                        <th>Country Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($countries as $country): ?>
                    <tr>
                        <td><?php echo e($country->id); ?></td>
                        <td><?php echo e($country->en_name); ?></td>
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