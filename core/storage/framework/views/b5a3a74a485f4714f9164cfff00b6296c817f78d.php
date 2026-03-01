<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?php echo e(route('admin.home')); ?>"><?php echo e(@$general->sitename); ?></a>
        </div>




        <ul class="sidebar-menu">

            <li class="nav-item dropdown <?php echo e(menuActive('admin.home')); ?>">
                <a href="<?php echo e(route('admin.home')); ?>" class="nav-link "><i
                        class="fas fa-fire"></i><span><?php echo e(__('Dashboard')); ?></span></a>
            </li>



            <?php if(auth()->guard('admin')->user()->can('manage-role')): ?>

            <li class="nav-item dropdown <?php echo e(menuActive('admin.roles.index')); ?>">
                <a href="<?php echo e(route('admin.roles.index')); ?>" class="nav-link "><i
                        class="fas fa-fire"></i><span><?php echo e(__('Manage Role')); ?></span></a>
            </li>

            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-admin')): ?>
            <li class="nav-item dropdown <?php echo e(menuActive('admin.admins.index')); ?>">
                <a href="<?php echo e(route('admin.admins.index')); ?>" class="nav-link "><i
                        class="fas fa-fire"></i><span><?php echo e(__('Manage Admins')); ?></span></a>
            </li>
            <?php endif; ?>


            <?php if(auth()->guard('admin')->user()->can('manage-referral')): ?>
            <li class="nav-item dropdown <?php echo e(menuActive('admin.referral*')); ?>">
                <a href="<?php echo e(route('admin.referral.index')); ?>" class="nav-link "><i
                        class="fas fa-tree"></i><span><?php echo e(__('Manage Referral')); ?></span></a>
            </li>
            <?php endif; ?>


            <?php if(auth()->guard('admin')->user()->can('manage-schedule')): ?>
            <li class="nav-item dropdown <?php echo e(menuActive('admin.time*')); ?>">
                <a href="<?php echo e(route('admin.time.index')); ?>" class="nav-link "><i
                        class="fas fa-clock"></i><span><?php echo e(__('Schedule')); ?></span></a>
            </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-plan')): ?>
            <li class="nav-item dropdown <?php echo e(menuActive('admin.plan*')); ?>">
                <a href="<?php echo e(route('admin.plan.index')); ?>" class="nav-link "><i
                        class="fas fa-fire"></i><span><?php echo e(__('Manage Plan')); ?></span></a>
            </li>
            <?php endif; ?>



            



            <li class="menu-header"><?php echo e(__('User Management')); ?></li>


            <?php if(auth()->guard('admin')->user()->can('manage-user')): ?>
            <li class="nav-item dropdown <?php echo e(@$navManageUserActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users-cog"></i>
                    <span><?php echo e(__('Manage Users')); ?> <?php if(@$deactiveUser > 0): ?>
                        <i
                            class="far fa-bell text-danger animate__animated animate__infinite animate__heartBeat animate__slow"></i>
                        <?php endif; ?>
                    </span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavManageUserActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.user')); ?>"><?php echo e(__('Manage Users')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavActiveUserActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.user.filter', 'active')); ?>"><?php echo e(__('Active Users')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavDeactiveUserActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.user.filter', 'deactive')); ?>"><?php echo e(__('Deactive Users')); ?> <span
                                class="badge badge-danger"><?php echo e(@$deactiveUser); ?></span></a>
                    </li>


                    <li class="<?php echo e(@$subNavkycUserActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.user.kyc')); ?>"><?php echo e(__('KYC Setting')); ?></a>
                    </li>


                    <li class="<?php echo e(@$subNavkycReqUserActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.user.kyc.req')); ?>"><?php echo e(__('KYC Request')); ?></a>
                    </li>


                </ul>
            </li>
            <?php endif; ?>


            <li class="menu-header"><?php echo e(__('Ticket')); ?></li>

            <?php if(auth()->guard('admin')->user()->can('manage-ticket')): ?>
            <li class="nav-item dropdown <?php echo e(@$navTicketActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-ticket-alt"></i>
                    <span><?php echo e(__('Ticket')); ?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$ticketList); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.ticket.index')); ?>"><?php echo e(__('All Tickets')); ?></a>
                    </li>
                    <li class="<?php echo e(@$pendingTicket); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.ticket.pendingList')); ?>"><?php echo e(__('Pending Ticket')); ?></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>


            <li class="menu-header"><?php echo e(__('Payment Sections')); ?></li>

            <?php if(auth()->guard('admin')->user()->can('manage-gateway')): ?>
            <li class="nav-item dropdown <?php echo e(@$navPaymentGatewayActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-credit-card"></i>
                    <span><?php echo e(__('Payment Gateway')); ?></span></a>
                <ul class="dropdown-menu">

                    <li class="<?php echo e(@$subNavPaypalPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.gateway.index')); ?>"><?php echo e(__('Create Gateway')); ?></a>
                    </li>


                    <li class="<?php echo e(@$subNavPaypalPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.paypal')); ?>"><?php echo e(__('Paypal')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavStripePaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.stripe')); ?>"><?php echo e(__('Stripe')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavCoinpaymentsPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.coin')); ?>"><?php echo e(__('Coinpayments')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavRazorpayPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.razorpay')); ?>"><?php echo e(__('Razorpay')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavVougePayPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.vougepay')); ?>"><?php echo e(__('VougePay')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavMolliePaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.mollie')); ?>"><?php echo e(__('Mollie')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavNowPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.nowpay')); ?>"><?php echo e(__('NowPayments')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavFlutterPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.fullerwave')); ?>"><?php echo e(__('Flutterwave')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavPayStackPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.paystack')); ?>"><?php echo e(__('PayStack')); ?></a>
                    </li>


                    <li class="<?php echo e(@$subNavPayStackPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.paghiper')); ?>"><?php echo e(__('PagHiper')); ?></a>
                    </li>


                    <li class="<?php echo e(@$subNavgourlPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.gourl')); ?>"><?php echo e(__('Gourl.io')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavperfectPaymentActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.payment.perfectmoney')); ?>"><?php echo e(__('Perfect Money')); ?></a>
                    </li>


                    <li class="<?php echo e(@$subNavperfectPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.mercadopago')); ?>"><?php echo e(__('MercadoPago')); ?></a>
                    </li>


                    <li class="<?php echo e(@$subNavpaytmPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.paytm')); ?>"><?php echo e(__('Paytm')); ?></a>
                    </li>


                    <li class="<?php echo e(@$subNavBankPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.payment.bank')); ?>"><?php echo e(__('Bank Payment')); ?></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('Manual-payments')): ?>
            <li class="nav-item dropdown <?php echo e(@$navManualPaymentActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-credit-card"></i>
                    <span><?php echo e(__('Manual Payments')); ?></span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavManualPaymentActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.manual')); ?>"><?php echo e(__('Manual Payments')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavPendingPaymentActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.manual.status', 'pending')); ?>"><?php echo e(__('Pending Payments')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavAcceptedPaymentActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.manual.status', 'accepted')); ?>"><?php echo e(__('Accepted Payments')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavRejectedPaymentActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.manual.status', 'rejected')); ?>"><?php echo e(__('Rejected Payments')); ?></a>
                    </li>

                </ul>
            </li>
            <?php endif; ?>



            <li class="menu-header"><?php echo e(__('Manage Withdraw')); ?></li>

            <?php if(auth()->guard('admin')->user()->can('manage-withdraw')): ?>
            <li class="nav-item dropdown <?php echo e(@$navManageWithdrawActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-bill-alt"></i>
                    <span><?php echo e(__('Manage Withdraw')); ?></span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavWithdrawMethodActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.withdraw')); ?>"><?php echo e(__('Withdraw Method')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavWithdrawPendingActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.withdraw.pending')); ?>"><?php echo e(__('Pending Withdraws')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavWithdrawAcceptedActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.withdraw.accepted')); ?>"><?php echo e(__('Accepted Withdraws')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavWithdrawRejectedActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.withdraw.rejected')); ?>"><?php echo e(__('Rejected Withdraws')); ?></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>


            <?php if(auth()->guard('admin')->user()->can('manage-deposit')): ?>
            <li class="nav-item dropdown <?php echo e(menuActive('admin.deposit.log')); ?>">
                <a href="<?php echo e(route('admin.deposit.log')); ?>" class="nav-link ">
                    <i class="fas fa-dollar-sign"></i>
                    <span><?php echo e(__('Manage Deposit')); ?></span>
                </a>
            </li>
            <?php endif; ?>

             <?php if(auth()->guard('admin')->user()->can('manage-theme')): ?>
            <!--    <li class="sidebar-menu-caption"><?php echo e(__('Manage Theme')); ?></li>-->

            <!--    <li class="nav-item dropdown <?php echo e(menuActive('admin.manage.theme*')); ?>">-->
            <!--        <a href="<?php echo e(route('admin.manage.theme')); ?>" class="nav-link "><i-->
            <!--                class="fab fa-themeco"></i><span><?php echo e(__('Manage Theme')); ?></span></a>-->
            <!--    </li>-->
            <!--<?php endif; ?> -->

            <?php if(auth()->guard('admin')->user()->can('manage-email') ||
            auth()->guard('admin')->user()->can('manage-setting') ||
            auth()->guard('admin')->user()->can('manage-language')): ?>


            <li class="sidebar-menu-caption"><?php echo e(__('Settings')); ?></li>

            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-email')): ?>
            <li class="menu-header"><?php echo e(__('Email Settings')); ?></li>

            <li class="nav-item dropdown <?php echo e(@$navEmailManagerActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i>
                    <span><?php echo e(__('Email Manager')); ?></span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavEmailConfigActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.email.config')); ?>"><?php echo e(__('Email Configure')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavEmailTemplatesActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.email.templates')); ?>"><?php echo e(__('Email Templates')); ?></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>


            <?php if(auth()->guard('admin')->user()->can('manage-setting')): ?>

            <li class="menu-header"><?php echo e(__('System Settings')); ?></li>

            <li class="nav-item dropdown <?php echo e(@$navGeneralSettingsActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-cog"></i>
                    <span><?php echo e(__('General Settings')); ?></span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavGeneralSettingsActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.general.setting')); ?>"><?php echo e(__('General Settings')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavPreloaderActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.general.preloader')); ?>"><?php echo e(__('Preloader Setting')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavAnalyticsActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.general.analytics')); ?>"><?php echo e(__('Google Analytics')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavCookieActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.general.cookie')); ?>"><?php echo e(__('Cookie Consent')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavRecaptchaActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.general.recaptcha')); ?>"><?php echo e(__('Google Recaptcha')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavLiveChatActiveClass); ?>">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.general.live.chat')); ?>"><?php echo e(__('Live Chat Setting')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavSEOManagerActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.general.seo')); ?>"><?php echo e(__('Global SEO Manager')); ?></a>
                    </li>

                    <li>
                        <a class="nav-link" href="<?php echo e(route('admin.general.cacheclear')); ?>"><?php echo e(__('Cache Clear')); ?></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>


            <?php if(auth()->guard('admin')->user()->can('manage-language')): ?>
            <li class="nav-item dropdown <?php echo e(@$navManageLanguageActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-globe-africa"></i>
                    <span><?php echo e(__('Manage Language')); ?></span></a>
                <ul class="dropdown-menu">

                    <li class="<?php echo e(@$subNavManageLanguageActiveClass); ?>"><a class="nav-link"
                            href="<?php echo e(route('admin.language.index')); ?>"><?php echo e(__('Manage Language')); ?></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-logs')): ?>
            <li class="sidebar-menu-caption"><?php echo e(__('Logs')); ?></li>

            <li class="nav-item dropdown <?php echo e(menuActive('admin.user.interestlog')); ?>">
                <a href="<?php echo e(route('admin.user.interestlog')); ?>" class="nav-link ">
                    <i class="fas fa-dollar-sign"></i>
                    <span><?php echo e(__('User Interest Log')); ?></span>
                </a>
            </li>

            <li class="nav-item dropdown <?php echo e(menuActive('admin.commision')); ?>">
                <a href="<?php echo e(route('admin.commision')); ?>" class="nav-link ">
                    <i class="fas fa-dollar-sign"></i>
                    <span><?php echo e(__('Commission Log')); ?></span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-frontend') ||
            auth()->guard('admin')->user()->can('manage-subscriber')): ?>

            <li class="sidebar-menu-caption"><?php echo e(__('Others')); ?></li>

            <?php endif; ?>
            <?php if(auth()->guard('admin')->user()->can('manage-frontend')): ?>

            <li class="nav-item dropdown <?php echo e(@$navManagePagesActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span><?php echo e(__('Frontend')); ?></span>
                </a>

                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavPagesActiveClass); ?>">
                        <a class="nav-link" href="<?php echo e(route('admin.frontend.pages')); ?>"><?php echo e(__('Pages')); ?></a>
                    </li>

                    <?php $__empty_1 = true; $__currentLoopData = $urlSections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="">
                        <a class="nav-link"
                            href="<?php echo e(route('admin.frontend.section.manage', ['name' => $key])); ?>"><?php echo e(frontendFormatter($key) . ' Section'); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <?php endif; ?>
                </ul>

            </li>

            <?php endif; ?>

            <?php if(auth()->guard('admin')->user()->can('manage-subscriber')): ?>
            <li class="nav-item dropdown <?php echo e(menuActive('admin.subscribers')); ?>">
                <a href="<?php echo e(route('admin.subscribers')); ?>" class="nav-link "><i
                        class="fas fa-users"></i><span><?php echo e(__('Newsletter Subscriber')); ?></span></a>
            </li>
            <?php endif; ?>



            <?php if(auth()->guard('admin')->user()->can('manage-report')): ?>
            <li class="menu-header"><?php echo e(__('Reports')); ?></li>

            <li class="nav-item mb-3 dropdown <?php echo e(@$navReportActiveClass); ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chart-line"></i>
                    <span><?php echo e(__('Report')); ?></span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e(@$subNavPaymentReportActiveClass); ?>"><a class="nav-link"
                            href="<?php echo e(route('admin.payment.report')); ?>"><?php echo e(__('Payment Reports')); ?></a>
                    </li>
                    <li class="<?php echo e(@$subNavWithdrawReportActiveClass); ?>"><a class="nav-link"
                            href="<?php echo e(route('admin.withdraw.report')); ?>"><?php echo e(__('Withdraw Reports')); ?></a>
                    </li>

                    <li class="<?php echo e(@$subNavTransactionActiveClass); ?>">
                        <a href="<?php echo e(route('admin.transaction')); ?>" class="nav-link "><?php echo e(__('Manage Transaction')); ?></a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>

        </ul>

    </aside>
</div><?php /**PATH /var/www/sites/nestvest-mgmt/core/resources/views/backend/layout/sidebar.blade.php ENDPATH**/ ?>