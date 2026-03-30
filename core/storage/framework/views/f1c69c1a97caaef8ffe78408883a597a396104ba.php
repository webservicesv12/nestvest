

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">

                                <?php echo csrf_field(); ?>

                                <div class="row">


                                    <div class="form-group col-md-6">

                                        <label for=""><?php echo e(__('Allow Tawk Live Chat')); ?></label>

                                        <select name="twak_allow" id="" class="form-control selectric">

                                            <option value="1" <?php echo e(@$twakto->twak_allow==1 ? 'selected' : ''); ?>>
                                                <?php echo e(__('Yes')); ?></option>
                                            <option value="0" <?php echo e(@$twakto->twak_allow==0 ? 'selected' : ''); ?>>
                                                <?php echo e(__('No')); ?></option>

                                        </select>

                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for=""><?php echo e(__('Tawk Embed url')); ?></label>

                                        <input type="text" name="twak_key" class="form-control" placeholder="Tawk Embed url"
                                            value="<?php echo e(@$twakto->twak_key); ?>">

                                    </div>


                                    <div class="form-group col-md-12">


                                        <button type="submit"
                                            class="btn btn-primary float-right"><?php echo e(__('Update Tawk Live Chat')); ?></button>

                                    </div>


                                </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\qaitrading\core\resources\views/backend/setting/twakto.blade.php ENDPATH**/ ?>