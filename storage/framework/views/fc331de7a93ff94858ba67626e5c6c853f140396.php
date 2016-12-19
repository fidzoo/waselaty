<?php $__env->startSection('content'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        ِAdmin List
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo e($user->name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e(@$user->roles[0]->role); ?></td>
						<td><?php echo Form::open(["url"=>"admin-delete/$user->id", "method"=>"delete"]); ?> 
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