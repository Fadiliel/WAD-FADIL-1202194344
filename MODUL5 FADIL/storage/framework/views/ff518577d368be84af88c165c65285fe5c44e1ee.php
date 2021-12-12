

<?php $__env->startSection('title'); ?> Patient - Register Patient <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="mt-5">
        <div class="col d-flex justify-content-center">
            <h1 class="font-weight-bold">Register <?php echo e($vaccine->name); ?> Patient</h1>
        </div>

        <form action="<?php echo e(route('patient.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo e(@csrf_field()); ?>

            <div class="form-group">
                <label for="name">Vaccine Id</label>
                <input name="vaccine_id" type="number" class="form-control" id="vaccine_id" placeholder="Vaccine Id"
                    value="<?php echo e($vaccine->id); ?>" readonly>
            </div>

            <div class="form-group">
                <label for="name">Patient Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Patient name" required>
            </div>

            <div class="form-group">
                <label for="nik">NIK</label>
                <input name="nik" type="text" class="form-control" id="nik" placeholder="NIK" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">KTP</label>
                <input name="image_ktp" type="file" class="form-control-file" id="file" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input name="no_hp" type="text" class="form-control" id="no_hp" placeholder="No Hp" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\laragon\www\crud-produk\resources\views/patient/create.blade.php ENDPATH**/ ?>