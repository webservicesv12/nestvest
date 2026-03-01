


<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__($pageTitle)); ?></h1>
            </div>

            <div class="row">


                <div class="col-md-12">
                    <div class="card">

                        <div class="card-header bg-primary">

                            <h6 class="text-white"><?php echo e(__('KYC Form')); ?></h6>

                            <button type="button" class="btn btn-success ml-auto payment"> <i
                                    class="fa fa-plus text-white"></i>
                                <?php echo e(__('Add KYC Requirements')); ?></button>

                        </div>

                        <div class="card-body">

                            <form action="" method="post">
                                <?php echo csrf_field(); ?>

                                <div class="row payment-instruction">

                                    <div class="col-md-12 user-data">
                                        <div class="row">


                                            <?php if(@$general->kyc != null): ?>
                                                <?php $__currentLoopData = $general->kyc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-md-12 user-data">
                                                        <div class="form-group">
                                                            <div class="input-group mb-md-0 mb-4">
                                                                <div class="col-md-4">
                                                                    <label><?php echo e(__('Field Name')); ?></label>
                                                                    <input name="kyc[<?php echo e($key); ?>][field_name]"
                                                                        class="form-control form_control" type="text"
                                                                        value="<?php echo e($param['field_name']); ?>" required>
                                                                </div>
                                                                <div class="col-md-3 mt-md-0 mt-2">
                                                                    <label><?php echo e(__('Field Type')); ?></label>
                                                                    <select name="kyc[<?php echo e($key); ?>][type]"
                                                                        class="form-control selectric">
                                                                        <option value="text"
                                                                            <?php echo e($param['type'] == 'text' ? 'selected' : ''); ?>>
                                                                            <?php echo e(__('Input Text')); ?>

                                                                        </option>
                                                                        <option value="textarea"
                                                                            <?php echo e($param['type'] == 'textarea' ? 'selected' : ''); ?>>
                                                                            <?php echo e(__('Textarea')); ?>

                                                                        </option>
                                                                        <option value="file"
                                                                            <?php echo e($param['type'] == 'file' ? 'selected' : ''); ?>>
                                                                            <?php echo e(__('File upload')); ?>

                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3 mt-md-0 mt-2">
                                                                    <label><?php echo e(__('Field Validation')); ?></label>
                                                                    <select name="kyc[<?php echo e($key); ?>][validation]"
                                                                        class="form-control selectric">
                                                                        <option value="required"
                                                                            <?php echo e($param['validation'] == 'required' ? 'selected' : ''); ?>>
                                                                            <?php echo e(__('Required')); ?>

                                                                        </option>
                                                                        <option value="nullable"
                                                                            <?php echo e($param['validation'] == 'nullable' ? 'selected' : ''); ?>>
                                                                            <?php echo e(__('Optional')); ?>

                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-2 text-right my-auto ">

                                                                    <button class="btn btn-danger btn-lg remove w-100 mt-4"
                                                                        type="button">
                                                                        <i class="fa fa-times"></i>
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Update Kyc')); ?></button>
                                </div>
                            </form>


                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>


<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            var i = <?php echo e(count($general->kyc ?? [])); ?>;

            $('.payment').on('click', function() {

                var html = `
                <div class="col-md-12 user-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <label><?php echo e(__('Field Name')); ?></label>
                                <input name="kyc[${i}][field_name]" class="form-control form_control" type="text" value="" required >
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <label><?php echo e(__('Field Type')); ?></label>
                                <select name="kyc[${i}][type]" class="form-control selectric">
                                    <option value="text" > <?php echo e(__('Input Text')); ?> </option>
                                    <option value="textarea" > <?php echo e(__('Textarea')); ?> </option>
                                    <option value="file"> <?php echo e(__('File upload')); ?> </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <label><?php echo e(__('Field Validation')); ?></label>
                                <select name="kyc[${i}][validation]"
                                        class="form-control selectric">
                                    <option value="required"> <?php echo e(__('Required')); ?> </option>
                                    <option value="nullable">  <?php echo e(__('Optional')); ?> </option>
                                </select>
                            </div>
                            <div class="col-md-2 text-right my-auto">
                              
                                    <button class="btn btn-danger btn-lg remove w-100 mt-4" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                
                            </div>
                        </div>
                    </div>
                </div>`;
                $('.payment-instruction').append(html);

                i++;

            })

            $(document).on('click', '.remove', function() {
                $(this).closest('.user-data').remove();
            });

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/sites/nestvest-mgmt/core/resources/views/backend/users/kyc.blade.php ENDPATH**/ ?>