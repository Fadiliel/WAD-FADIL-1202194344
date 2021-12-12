<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mx-auto">
            <a class="nav-item nav-link <?php echo e((request()->segment(1) == '') ? 'active' : ''); ?>"
                href="<?php echo e(url('/')); ?>">Home</a>
        </div>
    </div>
</nav><?php /**PATH C:\xampp\htdocs\WAD-FADIL-1202194344\MODUL5 FADIL\resources\views/templates/partials/navbar.blade.php ENDPATH**/ ?>