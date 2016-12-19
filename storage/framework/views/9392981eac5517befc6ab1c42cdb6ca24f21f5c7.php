<?php $__env->startSection('content'); ?>

<h3>New Ads. Waiting For Approve:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Available Ads.
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Arabic Title</th>
                        <th>English Title</th>
                        <th>Ad. Owner</th>
                        <?php if($add_type == 1): ?>
                        <th>Company Name</th>
                        <?php endif; ?>
                        <th>Ad. Rank</th>
                        <th>Approved؟</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                <?php $order= 1; ?>
                <?php foreach($jobs as $job): ?>
                    <tr>
                        <td><?php echo $order; ?></td>
                        <?php $order= $order +1;?>
                        <td><?php echo e($job->ar_title); ?></td>
                        <td><?php echo e($job->en_title); ?></td>
                        <td><?php echo e($job->user->name); ?></td>
                        <?php if($add_type == 1): ?>
                        <td><?php echo $job->user->company->en_company; ?></td>
                        <?php endif; ?>
                        <td><?php if($job->add_rank == 0): ?>Normal
                        <?php elseif($job->add_rank == 1): ?>Premium
                        <?php endif; ?></td>
                        <td><?php if($job->approved == 1): ?>
                        <center><?php echo HTML::image("assets/images/checkmark.ico"); ?></center>
                        <?php elseif($job->approved == 2): ?> <center><?php echo HTML::image("assets/images/x-mark.ico"); ?></center>
                        <?php else: ?> <center><?php echo HTML::image("assets/images/warning.ico"); ?></center>
                        <?php endif; ?></td>
                        <td><?php if($job->payment == 1): ?>
                        <center><?php echo HTML::image("assets/images/banknotes-24.ico"); ?></center>
                        <?php elseif($job->payment == 2): ?> <center><?php echo HTML::image("assets/images/paypal-3-32.ico"); ?></center>
                        <?php else: ?> <center><?php echo HTML::image("assets/images/warning.ico"); ?></center>
                        <?php endif; ?></td>
                        <td><?php echo Form::open(["url"=>"jobs/$job->id/edit", "method"=>"get"]); ?>

							<?php echo Form::submit('Show', ['class'=>'btn btn-success']); ?>

							<?php echo Form::close(); ?></td>
						<td><?php echo Form::open(["url"=>"jobs/$job->id", "method"=>"delete"]); ?> 
							<?php echo Form::submit('Delete', ['class'=>'btn btn-danger']); ?>

							<?php echo Form::close(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <center><?php echo $jobs->links(); ?></center>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('en.layouts.en-dash', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>