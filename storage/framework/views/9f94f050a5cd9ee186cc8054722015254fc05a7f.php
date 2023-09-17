
<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('user.withdraw.money')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <div class="row g-4 g-lg-3 g-xxl-4">
        <div class="col-md-7 col-xxl-8">
            <div class="card custom--card">
                <h5 class="card-header">
                <span class="card-header__icon">
                    <i class="las la-hand-holding-usd"></i>
                </span>
                    <?php echo app('translator')->get('Withdraw Money'); ?>
                </h5>
                <div class="card-body">
                    <?php if($leftRefer > 0): ?>
                        <p class="bg-warning" style="color: red"><strong><?php echo e("You Must need to Refer ".$leftRefer." Person for withdraw"); ?></strong></p>
                    <?php endif; ?>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label"><?php echo app('translator')->get('Method'); ?></label>
                        <div class="form--select">
                            <select class="form-select" name="method_code" required <?php echo e($leftRefer>0 ? "disabled"  : ""); ?>>
                                <option value=""><?php echo app('translator')->get('Select Gateway'); ?></option>
                                <?php $__currentLoopData = $withdrawMethod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($data->id); ?>" data-resource="<?php echo e($data); ?>">  <?php echo e(__($data->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label"><?php echo app('translator')->get('Amount'); ?></label>
                        <div class="input-group input--group">
                            <input type="number" step="any" name="amount" value="<?php echo e(old('amount')); ?>" class="form-control form--control" required <?php echo e($leftRefer>0 ? "disabled"  : ""); ?>>
                            <span class="input-group-text"><?php echo e($general->cur_text); ?></span>
                        </div>
                        <code class="xsm-text text-muted"><i class="fas fa-info-circle"></i> <?php echo app('translator')->get('Limit'); ?> : <span class="min">0</span>  ~ <span class="max">0</span> <?php echo e($general->cur_text); ?></code>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-xxl-4">
            <div class="card custom--card">
                <h5 class="card-header">
                <span class="card-header__icon">
                    <i class="las la-file-invoice-dollar"></i>
                </span>
                    <?php echo app('translator')->get('Summery'); ?>
                </h5>
                <div class="card-body">
                    <div class="deposit-card">
                        <ul class="deposit-card__list list">
                            <li>
                                <span class="deposit-card__title"><?php echo app('translator')->get('Charge'); ?></span>
                                <span class="deposit-card__amount">
                                <span class="charge">0</span> <?php echo e($general->cur_text); ?>

                                </span>
                            </li>
                            <li>
                                <span class="deposit-card__title fw-bold"><?php echo app('translator')->get('Receivable'); ?></span>
                                <span class="deposit-card__amount">
                                <span class="receivable">0</span> <?php echo e($general->cur_text); ?>

                                </span>
                            </li>
                            <li class="d-none rate-element">
                            </li>
                            <li class="d-none in-site-cur">
                                <span class="deposit-card__title"><?php echo app('translator')->get('In'); ?> <span class="base-currency"></span></span>
                                <span class="deposit-card__amount">
                                <span class="final_amo">0</span>
                                <span>
                                </span></span>
                            </li>
                        </ul>
                    </div>
                    <button type="submit" class="btn btn--lg btn--base w-100 mt-3" <?php echo e($leftRefer>0 ? "disabled"  : ""); ?>><?php echo app('translator')->get('Submit'); ?></button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script type="text/javascript">
    (function ($) {
            "use strict";
            $('select[name=method_code]').change(function(){

                var resource = $('select[name=method_code] option:selected').data('resource');
                var fixed_charge = parseFloat(resource.fixed_charge);
                var percent_charge = parseFloat(resource.percent_charge);
                var rate = parseFloat(resource.rate)
                var toFixedDigit = 2;
                $('.min').text(parseFloat(resource.min_limit).toFixed(2));
                $('.max').text(parseFloat(resource.max_limit).toFixed(2));
                var amount = parseFloat($('input[name=amount]').val());
                if (!amount) {
                    amount = 0;
                }

                var charge = parseFloat(fixed_charge + (amount * percent_charge / 100)).toFixed(2);
                $('.charge').text(charge);
                if (resource.currency != '<?php echo e($general->cur_text); ?>') {
                    var rateElement = `<span class="deposit-card__title"><?php echo app('translator')->get('Conversion Rate'); ?></span> <span class="deposit-card__amount">1 <?php echo e(__($general->cur_text)); ?> = <span class="rate">${rate}</span>  <span class="base-currency">${resource.currency}</span></span>`;
                    $('.rate-element').html(rateElement);
                    $('.rate-element').removeClass('d-none');
                    $('.in-site-cur').removeClass('d-none');
                    $('.rate-element').addClass('d-flex');
                    $('.in-site-cur').addClass('d-flex');
                }else{
                    $('.rate-element').html('')
                    $('.rate-element').addClass('d-none');
                    $('.in-site-cur').addClass('d-none');
                    $('.rate-element').removeClass('d-flex');
                    $('.in-site-cur').removeClass('d-flex');
                }
                var receivable = parseFloat((parseFloat(amount) - parseFloat(charge))).toFixed(2);
                $('.receivable').text(receivable);
                var final_amo = parseFloat(parseFloat(receivable)*rate).toFixed(toFixedDigit);
                $('.final_amo').text(final_amo);
                $('.base-currency').text(resource.currency);
                $('.method_currency').text(resource.currency);
                $('input[name=amount]').on('input');
            });
            $('input[name=amount]').on('input',function(){
                var data = $('select[name=method_code]').change();
                $('.amount').text(parseFloat($(this).val()).toFixed(2));
            });
        })(jQuery);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\assets\core\resources\views/templates/ptc_diamond/user/withdraw/methods.blade.php ENDPATH**/ ?>