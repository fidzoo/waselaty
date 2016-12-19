<?php $__env->startSection('content'); ?>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
        <?php foreach($errors->all() as $error): ?>
            <li><?php echo e($error); ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

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
                        <th>مسلسل</th>
                        <th>اسم التصنيف</th>
                        <th>Category Title</th>
                        <th>القسم الرئيسي</th>
                    </tr>
                </thead>
                <tbody>
                 <?php $order= 1; ?>
                <?php foreach($categories as $category): ?>
                    <tr>
                    <?php echo Form::open(["url"=>"categories/$category->id", "method"=>"patch"]); ?>

                        <td><?php echo $order; ?></td>
                        <?php $order= $order +1;?>
                        <td><?php echo Form::text('ar_title', $category->ar_title); ?></td>
                        <td><?php echo Form::text('en_title', $category->en_title); ?></td>
                        <td><?php echo Form::select('mcategory', $mcategories, @$category->mcategory->id); ?></td>
                        <td><?php echo Form::submit('تحديث', ['class'=>'btn btn-info']); ?></td>
                        <?php echo Form::close(); ?>

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