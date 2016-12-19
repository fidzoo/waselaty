<?php $__env->startSection('content'); ?>

<h3>اعلانات الوظائف المتاحة:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        الإعلانات المتاحة
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>الوظيفة</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($jobs as $job): ?>
                    <tr>
                        <td><?php echo e($job->ar_title); ?></td>
                        <td><?php echo Form::open(["url"=>"jobs/$job->id/edit", "method"=>"get"]); ?>

							<?php echo Form::submit('تعديل', ['class'=>'btn btn-success']); ?>

							<?php echo Form::close(); ?></td>
						<td><?php echo Form::open(["url"=>"jobs/$job->id", "method"=>"delete"]); ?> 
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