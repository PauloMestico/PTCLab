<?php
    $content = getContent('breadcrumb.content', true);
?>
<div class="section--sm pt-0">
    <div class="banner" style="background-image: url(<?php echo e(getImage('assets/images/frontend/breadcrumb/' . $content->data_values->image, '1920x330')); ?>)">
        <div class="banner__content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-xl-6">
                        <h2 class="mt-0 text--white text-center">
                            <?php echo e(__($pageTitle)); ?>

                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\assets\core\resources\views/templates/ptc_diamond/partials/breadcrumb.blade.php ENDPATH**/ ?>