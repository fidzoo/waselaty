<?php $__env->startSection('content'); ?>

<h3>التصنيفات المتاحة:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        التصنيفات
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>رقم التصنيف</th>
                        <th>اسم التصنيف</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo e($category->id); ?></td>
                        <td><?php echo e($category->ar_title); ?></td>
						<td><?php echo Form::open(["url"=>"categories/$category->id", "method"=>"delete"]); ?> 
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