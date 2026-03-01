<?php $__env->startSection('content'); ?>
    <?php $__env->startPush('seo'); ?>
        <meta name='description' content="<?php echo e(@$general->seo_description); ?>">
    <?php $__env->stopPush(); ?>

    <section class="auth-section">
        <div class="auth-wrapper">
            <div class="auth-top-part">
                <a href="<?php echo e(route('home')); ?>" class="auth-logo w-100 text-center">
                    <img class="img-fluid rounded sm-device-img text-align" src="<?php echo e(getFile('logo', @$general->logo)); ?>" width="100%" alt="logo">
                </a>
            </div>
            <div class="auth-body-part">
                <div class="auth-form-wrapper">
                    <h3 class="text-center mb-4"><?php echo e(__('Request For Reset Password')); ?></h3>
                    <form action="<?php echo e(route('user.forgot.password')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label><?php echo e(__('Email Address')); ?> <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="email"
                            placeholder="<?php echo e(__('Enter Email')); ?>">
                        </div>
                        <?php if(@$general->allow_recaptcha==1): ?>
                            <div class="mb-3">
                                <script src="https://www.google.com/recaptcha/api.js"></script>
                                <div class="g-recaptcha" data-sitekey="<?php echo e(@$general->recaptcha_key); ?>"
                                    data-callback="verifyCaptcha"></div>
                                <div id="g-recaptcha-error"></div>
                            </div>
                        <?php endif; ?>
                        <div class="mb-3">
                            <button type="submit" id="recaptcha" class="cmn-btn w-100"><?php echo e(__('Send Verification Code')); ?></button>
                        </div>
                        <div>
                            <p class="text-center"><?php echo e(__('Login Again')); ?>? <a href="<?php echo e(route('user.login')); ?>" class="color-change" ><?php echo e(__('Login')); ?></a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-footer-part">
                <p class="text-center mb-0">
                    <?php if(@$general->copyright): ?>
                        <?php echo e(__(@$general->copyright)); ?>

                    <?php endif; ?>
                </p>
            </div>
        </div>
        <div class="auth-thumb-area">
            <div class="auth-thumb">
                <img src="<?php echo e(getFile('frontendlogin', @$general->frontend_login_image)); ?>" alt="image">
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
    <script>
        "use strict";

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    "<span class='text-danger'>{{__('Captcha field is required.')</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template().'layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrkgjcvi/public_html/core/resources/views/frontend/user/auth/forgot_password.blade.php ENDPATH**/ ?>