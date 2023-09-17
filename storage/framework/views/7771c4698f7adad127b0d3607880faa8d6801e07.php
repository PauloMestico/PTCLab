<div class="dashboard-sidebar">
    <div class="primary-widget mb-3">
        <span class="primary-widget__subtitle"><?php echo app('translator')->get('My Balance'); ?></span>
        <h4 class="primary-widget__title"><?php echo e(showAmount(auth()->user()->balance)); ?> <?php echo e($general->cur_text); ?></h4>
        <ul class="list list--row  justify-content-center flex-wrap primary-widget__list">
            <li>
                <a href="<?php echo e(route('user.deposit.index')); ?>" class="btn btn--base btn--md">
                    <?php echo app('translator')->get('Deposit'); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('user.withdraw')); ?>" class="btn btn--light btn--md">
                    <?php echo app('translator')->get('Withdraw'); ?>
                </a>
            </li>
        </ul>
    </div>
    <div class="dashboard-sidebar__nav-toggle">
        <span class="dashboard-sidebar__nav-toggle-text"><?php echo app('translator')->get('My Account'); ?></span>
        <button type="button" class="btn dashboard-sidebar__nav-toggle-btn">
            <i class="las la-bars"></i>
        </button>
    </div>
    <div class="dashboard-menu">
        <div class="dashboard-menu__head">
            <span class="dashboard-menu__head-text"><?php echo app('translator')->get('My Account'); ?></span>
            <button type="button" class="btn dashboard-menu__head-close">
                <i class="las la-times"></i>
            </button>
        </div>
        <div class="dashboard-menu__body" data-simplebar="">
            <ul class="list dashboard-menu__list">

                <li>
                    <a href="<?php echo e(route('user.home')); ?>"
                        class="dashboard-menu__link <?php echo e(request()->routeIs('user.home') ? 'active' : ''); ?>">
                        <span class="dashboard-menu__icon">
                            <i class="las la-tachometer-alt"></i>
                        </span>
                        <span class="dashboard-menu__text"><?php echo app('translator')->get('Dashboard'); ?></span>
                    </a>
                </li>

                <li>
                    <div class="accordion" id="diposit">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#dipositCollapse"
                                    aria-expanded="<?php echo e(request()->routeIs('user.deposit*') ? 'true' : 'false'); ?>">
                                    <span class="accordion-button__icon">
                                        <i class="las la-wallet"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        <?php echo app('translator')->get('Deposit'); ?>
                                    </span>
                                </button>
                            </h2>
                            <div id="dipositCollapse"
                                class="accordion-collapse collapse <?php echo e(request()->routeIs('user.deposit*') ? 'show' : ''); ?>"
                                data-bs-parent="#diposit">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a href="<?php echo e(route('user.deposit.index')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.deposit.index') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Deposit Now'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('user.deposit.history')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.deposit.history') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Deposit History'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="accordion" id="withdraw">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#withdrawCollapse"
                                    aria-expanded="<?php echo e(request()->routeIs('user.withdraw*') ? 'true' : 'false'); ?>">
                                    <span class="accordion-button__icon">
                                        <i class="las la-money-check"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        <?php echo app('translator')->get('Withdraw'); ?>
                                    </span>
                                </button>
                            </h2>
                            <div id="withdrawCollapse"
                                class="accordion-collapse collapse <?php echo e(request()->routeIs('user.withdraw*') ? 'show' : ''); ?>"
                                data-bs-parent="#withdraw">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a href="<?php echo e(route('user.withdraw')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.withdraw') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Withdraw Now'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('user.withdraw.history')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.withdraw.history') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Withdraw History'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="accordion" id="ptc">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#ptcCollapse"
                                    aria-expanded="<?php echo e(request()->routeIs('user.ptc*') ? 'true' : 'false'); ?>">
                                    <span class="accordion-button__icon">
                                        <i class="las la-mouse"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        <?php echo app('translator')->get('PTC'); ?>
                                    </span>
                                </button>
                            </h2>
                            <div id="ptcCollapse"
                                class="accordion-collapse collapse <?php echo e(request()->routeIs('user.ptc*') ? 'show' : ''); ?>"
                                data-bs-parent="#ptc">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a href="<?php echo e(route('user.ptc.index')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.ptc.index') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Ads'); ?>
                                            </a>
                                        </li>
                                        <?php if($general->user_ads_post): ?>
                                        <li>
                                            <a href="<?php echo e(route('user.ptc.ads')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.ptc.ads') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('My Ads'); ?>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <li>
                                            <a href="<?php echo e(route('user.ptc.clicks')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.ptc.clicks') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Clicks'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="<?php echo e(route('user.transactions')); ?>"
                        class="dashboard-menu__link <?php echo e(request()->routeIs('user.transactions') ? 'active' : ''); ?>">
                        <span class="dashboard-menu__icon">
                            <i class="las la-money-bill"></i>
                        </span>
                        <span class="dashboard-menu__text"><?php echo app('translator')->get('Transactions'); ?></span>
                    </a>
                </li>

                <?php if($general->balance_transfer): ?>
                <li>
                    <a href="<?php echo e(route('user.transfer.balance')); ?>"
                        class="dashboard-menu__link <?php echo e(request()->routeIs('user.transfer.balance') ? 'active' : ''); ?>">
                        <span class="dashboard-menu__icon">
                            <i class="las la-credit-card"></i>
                        </span>
                        <span class="dashboard-menu__text"><?php echo app('translator')->get('Balance Transfer'); ?></span>
                    </a>
                </li>
                <?php endif; ?>

                <li>
                    <div class="accordion" id="referral">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#referralCollapse"
                                    aria-expanded="<?php echo e(request()->routeIs('user.commissions') || request()->routeIs('user.referred') ? 'true' : 'false'); ?>">
                                    <span class="accordion-button__icon">
                                        <i class="las la-gift"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        <?php echo app('translator')->get('Referral'); ?>
                                    </span>
                                </button>
                            </h2>
                            <div id="referralCollapse"
                                class="accordion-collapse collapse <?php echo e(request()->routeIs('user.commissions') || request()->routeIs('user.referred') ? 'show' : ''); ?>"
                                data-bs-parent="#referral">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a href="<?php echo e(route('user.commissions')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.commissions') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Commissions'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('user.referred')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.referred') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Referred Users'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="accordion" id="helpDesk">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#helpDeskCollapse"
                                    aria-expanded="<?php echo e(request()->routeIs('ticket*') ? 'true' : 'false'); ?>">
                                    <span class="accordion-button__icon">
                                        <i class="las la-question-circle"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        <?php echo app('translator')->get('Help &amp; Support'); ?>
                                    </span>
                                </button>
                            </h2>
                            <div id="helpDeskCollapse"
                                class="accordion-collapse collapse <?php echo e(request()->routeIs('ticket*') ? 'show' : ''); ?>"
                                data-bs-parent="#helpDesk">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a href="<?php echo e(route('ticket.index')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('ticket.index') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Support Ticket'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('ticket.open')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('ticket.open') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('New Ticket'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <div class="accordion" id="account">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#accountCollapse"
                                    aria-expanded="<?php echo e(request()->routeIs('user.profile.setting') || request()->routeIs('user.change.password') || request()->routeIs('user.twofactor') ? 'true' : 'false'); ?>">
                                    <span class="accordion-button__icon">
                                        <i class="las la-user-circle"></i>
                                    </span>
                                    <span class="accordion-button__text">
                                        <?php echo app('translator')->get('Account'); ?>
                                    </span>
                                </button>
                            </h2>
                            <div id="accountCollapse"
                                class="accordion-collapse collapse <?php echo e(request()->routeIs('user.profile.setting') || request()->routeIs('user.change.password') || request()->routeIs('user.twofactor') ? 'show' : ''); ?>"
                                data-bs-parent="#account">
                                <div class="accordion-body">
                                    <ul class="list dashboard-menu__inner">
                                        <li>
                                            <a href="<?php echo e(route('user.profile.setting')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.profile.setting') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Profile'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('user.change.password')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.change.password') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Change Password'); ?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('user.twofactor')); ?>"
                                                class="dashboard-menu__inner-link <?php echo e(request()->routeIs('user.twofactor') ? 'active' : ''); ?>">
                                                <?php echo app('translator')->get('Two Factor'); ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li>
                    <a href="<?php echo e(route('user.logout')); ?>" class="dashboard-menu__link">
                        <span class="dashboard-menu__icon">
                            <i class="las la-sign-out-alt"></i>
                        </span>
                        <span class="dashboard-menu__text"><?php echo app('translator')->get('Logout'); ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\assets\core\resources\views/templates/ptc_diamond/partials/sidenav.blade.php ENDPATH**/ ?>