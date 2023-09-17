
<?php $__env->startSection('content'); ?>
    <?php
        $content = getContent('login.content', true);
    ?>
    <div class="section login-section">
        <div class="container">
            <div class="row g-4 justify-content-between align-items-center">
                <div class="col-lg-6">
                    <img src="<?php echo e(getImage('assets/images/frontend/login/' . $content->data_values->image, '1382x1445')); ?>" alt="images" class="img-fluid" />
                </div>
                <div class="col-lg-6 col-xxl-5">
                    <div class="login-form">
                        <h3 class="login-form__title"><?php echo e(__($content->data_values->heading)); ?></h3>
                        <form action="<?php echo e(route('user.login')); ?>" class="row g-3 g-xxl-4 verify-gcaptcha" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="col-12">
                                <label class="form-label" for="username"><?php echo app('translator')->get('Username or Email'); ?></label>
                                <input type="username" id="username" name="username" class="form-control form--control" placeholder="<?php echo app('translator')->get('Username or Email'); ?>" required />
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="password"><?php echo app('translator')->get('Password'); ?></label>
                                <input type="password" id="password" name="password" class="form-control form--control" placeholder="<?php echo app('translator')->get('Password'); ?>" required />
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

                            <div class="col-sm-6">
                                <div class="form-check form--check">
                                    <input class="form-check-input custom--check" type="checkbox" id="rememberMe" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?> />
                                    <label class="form-check-label form-label" for="rememberMe">
                                        <?php echo app('translator')->get('Remember Me'); ?>
                                    </label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <a href="<?php echo e(route('user.password.request')); ?>" class="t-link d-block text-sm-end text--base t-link--base form-label lh-1">
                                    <?php echo app('translator')->get('Forgot password?'); ?>
                                </a>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn--lg btn--base w-100 rounded"><?php echo app('translator')->get('Login Now'); ?></button>
                            </div>

                            <div class="col-12">
                                <p class="m-0 sm-text text-center lh-1">
                                    <?php echo app('translator')->get('Don`t have an account?'); ?>' <a href="<?php echo e(route('user.register')); ?>" class="t-link t-link--base text--base"><?php echo app('translator')->get('Create an Account'); ?></a>
                                </p>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('style'); ?>
    <style>
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

<?php echo $__env->make($activeTemplate . 'layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\assets\core\resources\views/templates/ptc_diamond/user/auth/login.blade.php ENDPATH**/ ?>