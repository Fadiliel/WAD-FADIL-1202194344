

<?php $__env->startSection('title'); ?> Patient <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if(session()->has('success')): ?>
    <div class="alert alert-success">
        <i class="fa fa-check"></i> <?php echo e(session()->get('success')); ?>

    </div>
    <?php endif; ?>

    <?php if($patients->isNotEmpty()): ?>
    <div class="col d-flex justify-content-center my-5">
        <h1>List Patient</h1>
    </div>

    <a href="<?php echo e(route('patient.register')); ?>" class="btn btn-primary">Register Patient</a>

    <div class="table-responsive my-3">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Vaccine</th>
                    <th scope="col">Name</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i = 1; ?>
                <tr>
                    <th scope="row"><?php echo e($i); ?></th>
                    <td><?php echo e($patient->vaccine->name); ?></td>
                    <td><?php echo e($patient->name); ?></td>
                    <td><?php echo e($patient->nik); ?></td>
                    <td><?php echo e($patient->alamat); ?></td>
                    <td><?php echo e($patient->no_hp); ?></td>
                    <td>
                        <div class="btn-toolbar">
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="<?php echo e(route('patient.edit', [$patient->id])); ?>"
                                        class="btn btn-xs btn-block btn-info">
                                        Edit
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <form action="<?php echo e(route('patient.destroy', [$patient->id])); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <?php echo e(method_field('DELETE')); ?>

                                        <button class="btn btn-xs btn-block btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this patient?');">
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
        <a href="<?php echo e(route('patient.register')); ?>" class="btn btn-primary">Register Patient</a>
    </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER5\WAD\rar\crud-produk\resources\views/patient/index.blade.php ENDPATH**/ ?>