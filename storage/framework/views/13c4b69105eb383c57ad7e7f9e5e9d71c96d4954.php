<?php $__env->startSection('panel'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--sm table-responsive">
                        <table class="table table--light">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('User'); ?></th>
                                <th><?php echo app('translator')->get('Limit'); ?></th>
                                <th><?php echo app('translator')->get('Month'); ?></th>
                                <th><?php echo app('translator')->get('Action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($user->firstname." ".$user->lastname); ?>

                                    </td>

                                    <td>

                                        <?php if(isset($user->refLimit->limit)): ?>
                                            <?php echo e($user->refLimit->limit); ?>

                                        <?php else: ?>
                                            Not Set
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(isset($user->refLimit->year_month)): ?>
                                            <?php echo e(\Carbon\Carbon::parse($user->refLimit->year_month)->format('F')); ?>

                                        <?php else: ?>
                                            Not Set
                                        <?php endif; ?>
                                        
                                    </td>
                                    <td>
                                        <button class="btn btn-outline--primary btn-sm planBtn"
                                                data-id="<?php echo e($user->id); ?>" data-act="Edit">
                                            <i class="la la-pencil"></i> <?php echo app('translator')->get('Set Limit'); ?>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            

                            </tbody>
                        </table>
                        <!-- table end -->
                    </div>
                </div>
                <?php if($users->hasPages()): ?>
                    <div class="card-footer py-4">
                        <?php echo e(paginateLinks($users)); ?>

                    </div>
                <?php endif; ?>
            </div>
            <!-- card end -->
        </div>
    </div>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="modal fade" id="planModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><span class="act"></span> <?php echo app('translator')->get('Set Referral Limit'); ?></h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="las la-times"></i>
                        </button>
                    </div>
                    <form action="<?php echo e(route('admin.refer.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="text" id="modalUserId" name="userId" hidden>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="daily_limit"><?php echo app('translator')->get('Set Limit'); ?></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="limit" placeholder="<?php echo app('translator')->get('limit'); ?>"
                                           required>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="details"><?php echo app('translator')->get('Select Month'); ?> </label>
                                <input type="date" class="form-control" name="year_month"
                                       placeholder="<?php echo app('translator')->get('Select Month'); ?>"
                                       required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn--primary w-100"><?php echo app('translator')->get('Submit'); ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $('.planBtn').on('click', function () {
                var modal = $('#planModal');
                // console.log($(this).data('id'));
                $('#modalUserId').val($(this).data('id'));
                if ($(this).data('id') == 0) {
                    modal.find('form')[0].reset();
                }
                modal.modal('show');
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\assets\core\resources\views/admin/referral/index.blade.php ENDPATH**/ ?>