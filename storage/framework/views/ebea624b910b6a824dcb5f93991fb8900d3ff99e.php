
<?php $__env->startSection('panel'); ?>
    <div class="page-wrapper">
        <?php echo $__env->make($activeTemplate.'partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make($activeTemplate.'partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="section--sm">
            <div class="container">
                <div class="row g-4 gy-lg-0">
                    <div class="col-lg-4 col-xl-3">
                        <?php echo $__env->make($activeTemplate.'partials.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make($activeTemplate.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\assets\core\resources\views/templates/ptc_diamond/layouts/master.blade.php ENDPATH**/ ?>