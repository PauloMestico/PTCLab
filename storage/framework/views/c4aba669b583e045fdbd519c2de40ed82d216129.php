<?php $__env->startSection('content'); ?>
    <?php
        $kycInfo = getContent('kyc_info.content',true);
    ?>
    <div class="row g-4 g-lg-3 g-xxl-4">
        <?php if(auth()->user()->kv == 0): ?>
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    <h5 class="alert-heading mt-0"><?php echo app('translator')->get('KYC Verification required'); ?></h5>
                    <hr>
                    <p class="mb-0"><?php echo e(__($kycInfo->data_values->verification_content)); ?> <a
                            href="<?php echo e(route('user.kyc.form')); ?>"><?php echo app('translator')->get('Click Here to Verify'); ?></a>
                    </p>
                </div>
            </div>
        <?php elseif(auth()->user()->kv == 2): ?>
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    <h5 class="alert-heading mt-0"><?php echo app('translator')->get('KYC Verification pending'); ?></h5>
                    <hr>
                    <p class="mb-0"><?php echo e(__($kycInfo->data_values->pending_content)); ?> <a
                            href="<?php echo e(route('user.kyc.data')); ?>"><?php echo app('translator')->get('See KYC Data'); ?></a></p>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get('Total Deposit'); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            <?php echo e(showAmount($user->deposits->sum('amount'))); ?> <?php echo e($general->cur_text); ?>

                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-file-invoice-dollar"></i>
                </span>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get('Total Withdraw'); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            <?php echo e(showAmount($user->withdrawals->where('status',1)->sum('amount'))); ?> <?php echo e($general->cur_text); ?>

                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-credit-card"></i>
                </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get('My Plan'); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            <?php if($user->plan): ?>
                                <?php echo e(__($user->plan->name)); ?> <?php if($user->expire_date < now()): ?>
                                    (<?php echo app('translator')->get('Expired'); ?>)
                                <?php endif; ?>
                            <?php else: ?>
                                <?php echo app('translator')->get('No Plan'); ?>
                            <?php endif; ?>
                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-list"></i>
                </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get('Total Clicks'); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            <?php echo e($user->clicks->count()); ?>

                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-trophy"></i>
                </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get("Today's Clicks"); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            <?php echo e($user->clicks->where('view_date',Date('Y-m-d'))->count()); ?>

                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-link"></i>
                </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get('Remain clicks for today'); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            <?php echo e($user->daily_limit - $user->clicks->where('view_date',Date('Y-m-d'))->count()); ?>

                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-link"></i>
                </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get('Next Reminder'); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount timer" id="counter">
                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-clock"></i>
                </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get('Referral Commissions'); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            <?php echo e(__($commissionCount)); ?> <?php echo e($general->cur_text); ?>

                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-clock"></i>
                </span>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get('My Active ADS'); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            <?php echo e(__($activeAdCount)); ?>

                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-clock"></i>
                </span>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="widget-container">
                <div class="widget-container__head">
                <span class="dashboard-widget__title">
                    <?php echo app('translator')->get('Referred'); ?>
                </span>
                </div>
                <div class="dashboard-widget">
                    <div class="dashboard-widget__icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="dashboard-widget__content">
                        <h4 class="dashboard-widget__amount">
                            <?php echo e(__($referCount)); ?>

                        </h4>
                    </div>
                    <span class="dashboard-widget__overlay-icon">
                    <i class="fas fa-clock"></i>
                </span>
                </div>
            </div>
        </div>

        <div class="col-md-12 mb-30">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title"><?php echo app('translator')->get('Click & Earn Report'); ?></h5>
                    <div id="apex-bar-chart"></div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('assets/admin/js/vendor/apexcharts.min.js')); ?>"></script>
    <script>
        (function ($) {
            "use strict";
            // apex-bar-chart js
            var options = {
                series: [{
                    name: 'Clicks',
                    data: [
                        <?php $__currentLoopData = $chart['click']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $click): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($click); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ]
                }, {
                    name: 'Earn Amount',
                    data: [
                        <?php $__currentLoopData = $chart['amount']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($amount); ?>,
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ]
                }],
                chart: {
                    type: 'bar',
                    height: 580,
                    toolbar: {
                        show: false
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded'
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: [
                        <?php $__currentLoopData = $chart['amount']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            '<?php echo e($key); ?>',
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val
                        }
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
            chart.render();

            function createCountDown(elementId, sec) {
                var tms = sec;
                var x = setInterval(function () {
                    var distance = tms * 1000;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById(elementId).innerHTML = days + "d: " + hours + "h " + minutes + "m " + seconds + "s ";
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById(elementId).innerHTML = "<?php echo e(__('COMPLETE')); ?>";
                    }
                    tms--;
                }, 1000);
            }

            createCountDown('counter', <?php echo e(\Carbon\Carbon::tomorrow()->diffInSeconds()); ?>);
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\assets\core\resources\views/templates/ptc_diamond/user/dashboard.blade.php ENDPATH**/ ?>