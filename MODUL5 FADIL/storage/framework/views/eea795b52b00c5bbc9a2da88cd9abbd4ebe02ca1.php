<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link <?php echo e((request()->segment(1) == '') ? 'active' : ''); ?>"
                href="<?php echo e(url('/')); ?>">Home</a>
            <a class="nav-item nav-link <?php echo e((request()->segment(1) == 'vaccine') ? 'active' : ''); ?>"
                href="<?php echo e(route('vaccine.index')); ?>">Vaccine</a>
        </div>
    </div>
</nav><?php /**PATH D:\KULIAH\SEMESTER5\WAD\rar\crud-produk\resources\views/templates/partials/navbar.blade.php ENDPATH**/ ?>