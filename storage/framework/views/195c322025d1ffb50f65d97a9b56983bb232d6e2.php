<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        قائمة الأدمن
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>مسلسل</th>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>نوع الأدمن</th>
                    </tr>
                </thead>
                <tbody>
                <?php $order= 1; ?>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $order; ?></td>
                        <?php $order= $order +1;?>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e(@$user->roles[0]->ar_role); ?></td>
						<td><?php echo Form::open(["url"=>"admin-delete/$user->id", "method"=>"delete"]); ?> 
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