<?php $__env->startSection('content'); ?>
    <section class="breadcrumbs" style="background-image: url(<?php echo e(getFile('breadcrumbs', @$general->breadcrumbs)); ?>);">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center text-capitalize">
                <h2><?php echo e(__($pageTitle)); ?></h2>
                <ol>
                    <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                    <li><?php echo e(__($pageTitle)); ?></li>
                </ol>
            </div>

        </div>
    </section>

    <!-- ======= Portfolio Section ======= -->
    <section>
        <div class="container" data-aos="fade-up">
            <?php
                $policy = content('privacy policy.content');
            ?>
            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="bg-dark card">
                            <div class="invest-top">
                                <h4 class="text-center"><b><?php echo e(@$policy->data->Title); ?></b></h4>
                            </div>

                            <div class="p-3 text-justifys">
                                <p> <?= clean(@$policy->data->Privacy_Policy); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sites/nestvest-mgmt/core/resources/views/frontend/pages/privacypolicy.blade.php ENDPATH**/ ?>