<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        قائمة المسجلين
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
                        <th>الهاتف</th>
                        <?php if($user_type == 'company'): ?>
                        <th>اسم الشركة</th>
                        <th>Company Name</th>
                        <?php endif; ?>
                        <th>تاريخ التسجيل</th>
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
                        <td style=" direction: ltr;text-align: right;"> 
                            <span><?php echo e($user->country_code); ?></span> &nbsp; 
                            <span><?php echo e($user->phone); ?></span> 
                        </td>
                        <?php if($user_type == 'company'): ?>
                        <td><?php echo e($user->company->ar_company); ?></td>
                        <td><?php echo e($user->company->en_company); ?></td>
                        <?php endif; ?>
                        <td><?php echo e($user->created_at); ?></td>
						<td><?php echo Form::open(["url"=>"user-delete/$user->id", "method"=>"delete"]); ?> 
							<?php echo Form::submit('حذف', ['class'=>'btn btn-danger']); ?>

							<?php echo Form::close(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php echo $users->links(); ?>

    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.ar-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>