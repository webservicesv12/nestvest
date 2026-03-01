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
    <section class="s-pt-100 s-pb-100">
        <div class="container">

            <div class="col-md-12">
                <div class="row ">
                    <div class="col-md-12">
                        <div class="card bg-second">
                            <div class="invest-top">
                                <h4 class="text-center"><b><?php echo e(@$data->data->title); ?></b></h4>
                            </div>
                            <div class="p-3">
                                <p class="text-justifys"> <?= clean(@$data->data->description) ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrkgjcvi/public_html/core/resources/views/frontend/pages/service.blade.php ENDPATH**/ ?>