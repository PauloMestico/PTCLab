<?php $__env->startSection('content'); ?>
<?php
    $content = getContent('register.content',true);
    $policyPages = getContent('policy_pages.element', false, null, true);
?>
<div class="section login-section">
	<div class="container">
		<div class="row g-4 justify-content-between align-items-center">
			<div class="col-lg-6">
				<img src="<?php echo e(getImage('assets/images/frontend/register/'.$content->data_values->image, '1382x1445')); ?>" alt="images" class="img-fluid" />
			</div>
			<div class="col-lg-6 col-xxl-5">
				<div class="login-form">
					<h3 class="login-form__title"><?php echo e(__($content->data_values->heading)); ?></h3>
					<form action="<?php echo e(route('user.register')); ?>" class="row g-3 g-xxl-4 verify-gcaptcha" method="post">
                        <?php echo csrf_field(); ?>
						<?php if(session()->get('reference') != null): ?>
                            <div class="col-12">
                                <label for="referenceBy" class="form-label"><?php echo app('translator')->get('Reference by'); ?></label>
                                <input type="text" name="referBy" id="referenceBy" class="form-control form--control" value="<?php echo e(session()->get('reference')); ?>" readonly>
                            </div>
                        <?php endif; ?>

                        <div class="col-md-6">
							<label for="username" class="form-label"><?php echo app('translator')->get('Username'); ?></label>
                            <input type="text" name="username" id="username" placeholder="<?php echo app('translator')->get('Username'); ?>" class="form-control form--control checkUser" value="<?php echo e(old('username')); ?>" required>
                            <small class="text-danger usernameExist"></small>
						</div>

						<div class="col-md-6">
							<label for="email" class="form-label"><?php echo app('translator')->get('Email'); ?></label>
                            <input type="email" name="email" id="email" placeholder="<?php echo app('translator')->get('Email'); ?>" class="form-control form--control checkUser" value="<?php echo e(old('email')); ?>" required>
						</div>

                        <div class="col-md-6">
                            <label class="form-label" for="country"><?php echo app('translator')->get('Country'); ?></label>
                            <div class="form--select">
                                <select id="country" name="country" class="form-select" required>
                                    <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option data-mobile_code="<?php echo e($country->dial_code); ?>" value="<?php echo e($country->country); ?>" data-code="<?php echo e($key); ?>"><?php echo e(__($country->country)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
							<label class="form-label" for="mobile"><?php echo app('translator')->get('Mobile'); ?></label>
							<div class="input-group input--group">
                                <span class="input-group-text mobile-code"></span>
                                <input type="hidden" name="mobile_code">
                                <input type="hidden" name="country_code">
                                <input type="number" id="mobile" name="mobile" value="<?php echo e(old('mobile')); ?>" class="form-control form--control checkUser" required>
                            </div>
                            <small class="text-danger mobileExist"></small>
						</div>

						<div class="col-md-6 form-group mb-0">
							<label class="form-label" for="password"><?php echo app('translator')->get('Password'); ?></label>
							<input type="password" id="password" name="password" class="form-control form--control" placeholder="<?php echo app('translator')->get('Password'); ?>" required>
                            <?php if($general->secure_password): ?>
                                <div class="input-popup">
                                    <p class="error lower"><?php echo app('translator')->get('1 small letter minimum'); ?></p>
                                    <p class="error capital"><?php echo app('translator')->get('1 capital letter minimum'); ?></p>
                                    <p class="error number"><?php echo app('translator')->get('1 number minimum'); ?></p>
                                    <p class="error special"><?php echo app('translator')->get('1 special character minimum'); ?></p>
                                    <p class="error minimum"><?php echo app('translator')->get('6 character password'); ?></p>
                                </div>
                            <?php endif; ?>
						</div>

						<div class="col-md-6">
							<label class="form-label" for="password_confirmation"><?php echo app('translator')->get('Re-type Password'); ?></label>
							<input type="password" id="password_confirmation" name="password_confirmation" class="form-control form--control" placeholder="<?php echo app('translator')->get('Re-type Password'); ?>" required>
						</div>

                        <?php if (isset($component)) { $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243 = $component; } ?>
<?php $component = App\View\Components\Captcha::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('captcha'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Captcha::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243)): ?>
<?php $component = $__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243; ?>
<?php unset($__componentOriginalc0af13564821b3ac3d38dfa77d6cac9157db8243); ?>
<?php endif; ?>

                        <?php if($general->agree): ?>
                            <div class="col-12">
                                <div class="form-check form--check d-block">
                                    <input type="checkbox" id="agree" <?php if(old('agree')): echo 'checked'; endif; ?> name="agree" class="form-check-input custom--check" required>
                                    <label class="form-check-label form-label" for="agree"><?php echo app('translator')->get('I agree with '); ?> </label> <span><?php $__currentLoopData = $policyPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a class="t-link t-link--base text--base" href="<?php echo e(route('policy.pages', [slug($policy->data_values->title), $policy->id])); ?>" target="_blank"><?php echo e(__($policy->data_values->title)); ?></a>
                                        <?php if(!$loop->last): ?>
                                            ,
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="col-12">
                            <button type="submit" class="btn btn--lg btn--base w-100 rounded"><?php echo app('translator')->get('Register Now'); ?></button>
                        </div>
					</form>
					
					 <?php
                            $credentials = $general->socialite_credentials;
                        ?>
                        <?php if($credentials->google->status == 1 || $credentials->facebook->status == 1 || $credentials->linkedin->status == 1): ?>
                            <div class="col-12 my-3">
                                <p class="text-center sm-text mb-2"><?php echo app('translator')->get('Or Login with'); ?></p>

                                <div class="socials-buttons d-flex flex-wrap flex-row gap-10 justify-content-between">

                                    <?php if($credentials->google->status == 1): ?>
                                        <a href="<?php echo e(route('user.social.login', 'google')); ?>" class="btn btn-outline-google btn-sm text-uppercase">
                                            <span class="me-1"><i class="fab fa-google"></i></span> <?php echo app('translator')->get('Google'); ?></a>
                                    <?php endif; ?>

                                    <?php if($credentials->facebook->status == 1): ?>
                                        <a href="<?php echo e(route('user.social.login', 'facebook')); ?>" class="btn btn-outline-facebook btn-sm text-uppercase">
                                            <span class="me-1"><i class="fab fa-facebook-f"></i></span> <?php echo app('translator')->get('Facebook'); ?></a>
                                    <?php endif; ?>

                                    <?php if($credentials->linkedin->status == 1): ?>
                                        <a href="<?php echo e(route('user.social.login', 'linkedin')); ?>" class="btn btn-outline-linkedin btn-sm text-uppercase">
                                            <span class="me-1"><i class="fab fa-linkedin-in"></i></span> <?php echo app('translator')->get('Linkedin'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade custom--modal" id="existModalCenter" tabindex="-1" role="dialog" aria-labelledby="existModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="existModalLongTitle"><?php echo app('translator')->get('You are with us'); ?></h5>
                <span type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </span>
            </div>
            <div class="modal-body">
                <h6 class="text-center"><?php echo app('translator')->get('You already have an account please Login '); ?></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn--dark" data-bs-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                <a href="<?php echo e(route('user.login')); ?>" class="btn btn--base"><?php echo app('translator')->get('Login'); ?></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .country-code .input-group-text {
            background: #fff !important;
        }

        .country-code select {
            border: none;
        }

        .country-code select:focus {
            border: none;
            outline: none;
        }
            .btn {
            border: 1px solid transparent !important;
        }

        .content-area {
            z-index: -1;
            height: 100%;
        }

        .btn-outline-linkedin {
            border-color: #0077B5 !important;
            background-color: #0077B5;
            color: #ffff;
        }

        .btn-outline-linkedin:hover {
            border-color: #0077B5 !important;
            color: #fff !important;
            background-color: #0077B5;
        }

        .btn-outline-facebook {
            border-color: #395498 !important;
            background-color: #395498;
            color: #ffff;
        }

        .btn-outline-facebook:hover {
            border-color: #395498 !important;
            color: #fff !important;
            background-color: #395498;
        }

        .btn-outline-google {
            border-color: #D64937 !important;
            background-color: #D64937;
            color: #ffff;
        }

        .btn-outline-google:hover {
            border-color: #D64937;
            color: #fff !important;
            background-color: #D64937;
        }

        .row>* {
            padding-right: calc(var(--bs-gutter-x) * .0);
        }

        .socials-buttons .btn {
            width: calc(33% - 10px);
        }

        @media (max-width: 424px) {
            .socials-buttons .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
<?php $__env->stopPush(); ?>

<?php if($general->secure_password): ?>
    <?php $__env->startPush('script-lib'); ?>
        <script src="<?php echo e(asset('assets/global/js/secure_password.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php endif; ?>

<?php $__env->startPush('script'); ?>
    <script>
        "use strict";
        (function($) {
            <?php if($mobileCode): ?>
                $(`option[data-code=<?php echo e($mobileCode); ?>]`).attr('selected', '');
            <?php endif; ?>

            $('select[name=country]').change(function() {
                $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
                $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
                $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));
            });
            $('input[name=mobile_code]').val($('select[name=country] :selected').data('mobile_code'));
            $('input[name=country_code]').val($('select[name=country] :selected').data('code'));
            $('.mobile-code').text('+' + $('select[name=country] :selected').data('mobile_code'));

            $('.checkUser').on('focusout', function(e) {
                var url = '<?php echo e(route('user.checkUser')); ?>';
                var value = $(this).val();
                var token = '<?php echo e(csrf_token()); ?>';
                if ($(this).attr('name') == 'mobile') {
                    var mobile = `${$('.mobile-code').text().substr(1)}${value}`;
                    var data = {
                        mobile: mobile,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'email') {
                    var data = {
                        email: value,
                        _token: token
                    }
                }
                if ($(this).attr('name') == 'username') {
                    var data = {
                        username: value,
                        _token: token
                    }
                }
                $.post(url, data, function(response) {
                    if (response.data != false && response.type == 'email') {
                        $('#existModalCenter').modal('show');
                    } else if (response.data != false) {
                        $(`.${response.type}Exist`).text(`${response.type} already exist`);
                    } else {
                        $(`.${response.type}Exist`).text('');
                    }
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make($activeTemplate.'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\assets\core\resources\views/templates/ptc_diamond/user/auth/register.blade.php ENDPATH**/ ?>