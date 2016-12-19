<?php $__env->startSection('content'); ?>

<h3>الأقسام الرئيسية المتاحة:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        الأقسام
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>اسم القسم</th>
                        <th>Section Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($mcats as $cat): ?>
                    <tr>
                        <?php echo Form::open(["url"=>"mcategory/$cat->id", "method"=>"patch"]); ?>

                        <td><?php echo Form::text('ar_title', $cat->ar_title); ?></td>
                        <td><?php echo Form::text('en_title', $cat->en_title); ?></td>
                        <td><?php echo Form::submit('تحديث', ['class'=>'btn btn-info']); ?></td>
                        <?php echo Form::close(); ?>

						<td><?php echo Form::open(["url"=>"mcategory/$cat->id", "method"=>"delete"]); ?> 
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