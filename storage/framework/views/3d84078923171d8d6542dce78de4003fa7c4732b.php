<?php $__env->startSection('content'); ?>

<h3>Available Sections:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Sections
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>Section No.</th>
                        <th>Section Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($categories as $category): ?>
                    <tr>
                        <td><?php echo e($category->id); ?></td>
                        <td><?php echo e($category->en_title); ?></td>
						<td><?php echo Form::open(["url"=>"categories/$category->id", "method"=>"delete"]); ?> 
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