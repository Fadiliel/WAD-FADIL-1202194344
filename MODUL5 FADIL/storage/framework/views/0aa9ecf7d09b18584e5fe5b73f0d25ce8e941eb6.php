

<?php $__env->startSection('title'); ?> Vaccine <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <i class="fa fa-check"></i> <?php echo e(session()->get('success')); ?>

    </div>
    <?php endif; ?>

    <?php if($vaccines->isNotEmpty()): ?>
    <div class="col d-flex justify-content-center my-5">
        <h1>List Vaccine</h1>
    </div>

    <a href="<?php echo e(route('vaccine.create')); ?>" class="btn btn-primary">Add Vaccine</a>

    <div class="table-responsive my-3">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php $__currentLoopData = $vaccines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaccine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row"><?php echo e($i); ?></th>
                    <td><?php echo e($vaccine->name); ?></td>
                    <td>Rp <?php echo e(number_format($vaccine->price,0,",",".")); ?></td>
                    <td>
                        <div class="btn-toolbar">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="<?php echo e(route('vaccine.edit', [$vaccine->id])); ?>"
                                        class="btn btn-xs btn-block btn-info">
                                        Edit
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <form action="<?php echo e(route('vaccine.destroy', [$vaccine->id])); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                        <button class="btn btn-xs btn-block btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this vaccine?');">
                                            <i class="fa fa-times-circle"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="text-center mt-5">
        <p>There is no data. . .</p>
        <a href="<?php echo e(route('vaccine.create')); ?>" class="btn btn-primary">Add Vaccine</a>
    </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\laragon\www\crud-produk\resources\views/vaccine/index.blade.php ENDPATH**/ ?>