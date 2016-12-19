<?php $__env->startSection('content'); ?>

<h3>Available Main Sections:</h3><br>
<div class="panel panel-default">
    <div class="panel-heading">
        Main Sections
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="table-responsive table-bordered">
            <table class="table">
                <thead>
                    <tr>
                        <th>English Section Name</th>
                        <th>Arabic Section Name</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($mcats as $cat): ?>
                    <tr>
                        <?php echo Form::open(["url"=>"mcategory/$cat->id", "method"=>"patch"]); ?>

                        <td><?php echo Form::text('en_title', $cat->en_title); ?></td>
                        <td><?php echo Form::text('ar_title', $cat->ar_title); ?></td>
                        <td><?php echo Form::submit('Update', ['class'=>'btn btn-info']); ?></td>
                        <?php echo Form::close(); ?>

						<td><?php echo Form::open(["url"=>"mcategory/$cat->id", "method"=>"delete"]); ?> 
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