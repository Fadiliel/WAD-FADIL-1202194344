

<?php $__env->startSection('title'); ?> Patient - List Vaccine <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if($vaccines->isNotEmpty()): ?>
    <div class="col d-flex justify-content-center my-5">
        <h1>List Vaccine</h1>
    </div>

    <div class="card-deck">
        <?php $__currentLoopData = $vaccines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vaccine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-4 mb-5">
            <div class="card  h-100">
                <img class="card-img-top" src="<?php echo e(Storage::url($vaccine->image)); ?>" alt="vaccine image" height="200"
                    style="object-fit: cover">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold"><?php echo e($vaccine->name); ?></h4>
                    <p class="text-secondary">Rp<?php echo e(number_format($vaccine->price,0,",",".")); ?></p>
                    <p class="card-text"><?php echo e($vaccine->description); ?></p>
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('patient.create', ['vaccine_id' => $vaccine->id])); ?>"
                        class="btn btn-primary btn-block">Vaccine Now</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>

    <div class="my-5">
        <div class="col d-flex justify-content-center">
            <h1>There's no data</h1>
        </div>
        <div class="col d-flex justify-content-center">
            <a href="<?php echo e(route('vaccine.create')); ?>" class="btn btn-dark">Add vaccine</a>
        </div>
    </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\KULIAH\SEMESTER5\WAD\rar\crud-produk\resources\views/patient/register-vaccine.blade.php ENDPATH**/ ?>