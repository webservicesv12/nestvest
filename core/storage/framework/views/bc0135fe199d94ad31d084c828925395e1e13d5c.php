

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
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="form-group col-md-3 mb-3">
                                        <label class="col-form-label"><?php echo e(__('PayTm Image')); ?></label>

                                        <div id="image-preview" class="image-preview"
                                            style="background-image:url(<?php echo e(getFile('gateways', @$gateway->gateway_image)); ?>);">
                                            <label for="image-upload" id="image-label"><?php echo e(__('Choose File')); ?></label>
                                            <input type="file" name="paytm_image" id="image-upload" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for=""><?php echo e(__('Gateway Currency')); ?></label>
                                                <input type="text" name="gateway_currency"
                                                    class="form-control site-currency"
                                                    value="<?php echo e(@$gateway->gateway_parameters->gateway_currency ?? old('gateway_currency')); ?>">
                                            </div>


                                            <div class="form-group col-md-6">
                                                <label for=""><?php echo e(__('Payment Mode')); ?></label>
                                                <select name="mode" id="" class="form-control">
                                                    <option value="0" <?php echo e(@$gateway->gateway_parameters->mode ? '' : 'selected'); ?>><?php echo e(__('Sandbox')); ?></option>
                                                    <option value="1" <?php echo e(@$gateway->gateway_parameters->mode ? 'selected' : ''); ?>><?php echo e(__('Live')); ?></option>
                                                </select>
                                                
                                            </div>



                                            <div class="form-group col-md-6">

                                                <label for=""><?php echo e(__('Merchant Id')); ?></label>
                                                <input type="text" name="merchant_id" class="form-control"
                                                    value="<?php echo e(@$gateway->gateway_parameters->merchant_id ?? old('merchant_id')); ?>">
                                            </div>  
                                            
                                            
                                            <div class="form-group col-md-6">

                                                <label for=""><?php echo e(__('Merchant Key')); ?></label>
                                                <input type="text" name="merchant_key" class="form-control"
                                                    value="<?php echo e(@$gateway->gateway_parameters->merchant_key ?? old('merchant_key')); ?>">
                                            </div> 
                                            
                                            
                                            <div class="form-group col-md-6">

                                                <label for=""><?php echo e(__('Merchant Website')); ?></label>
                                                <input type="text" name="merchant_website" class="form-control"
                                                    value="<?php echo e(@$gateway->gateway_parameters->merchant_website ?? old('merchant_website')); ?>">
                                            </div> 
                                            
                                            <div class="form-group col-md-6">

                                                <label for=""><?php echo e(__('Merchant Channel')); ?></label>
                                                <input type="text" name="merchant_channel" class="form-control"
                                                    value="<?php echo e(@$gateway->gateway_parameters->merchant_channel ?? old('merchant_channel')); ?>">
                                            </div> 
                                            
                                            <div class="form-group col-md-6">

                                                <label for=""><?php echo e(__('Merchant Industry Type')); ?></label>
                                                <input type="text" name="merchant_industry" class="form-control"
                                                    value="<?php echo e(@$gateway->gateway_parameters->merchant_industry ?? old('merchant_industry')); ?>">
                                            </div> 
                                            
                                           

                                            <div class="form-group col-md-6 col-12">
                                                <label><?php echo e(__('Conversion Rate')); ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <?php echo e('1 ' . @$general->site_currency . ' = '); ?>

                                                        </div>
                                                    </div>
                                                    <input type="text" class="form-control form_control currency"
                                                        name="rate" value="<?php echo e(number_format($gateway->rate?? 0, 4) ?? 0); ?>">

                                                    <div class="input-group-append">
                                                        <div class="input-group-text append_currency">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-6 col-12">
                                                <label for=""><?php echo e(__('Allow as payment method')); ?></label>
                                                <select name="status" id="" class="form-control selectric">
                                                    <option value="1" <?php echo e(@$gateway->status ? 'selected' : ''); ?>>
                                                        <?php echo e(__('Yes')); ?>

                                                    </option>
                                                    <option value="0" <?php echo e(@$gateway->status ? '' : 'selected'); ?>>
                                                        <?php echo e(__('No')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary float-right"><?php echo e(__('Update Paytm Information')); ?></button>
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


<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "<?php echo e(__('Choose File')); ?>", // Default: Choose File
                label_selected: "<?php echo e(__('Update Image')); ?>", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });

            $('.site-currency').on('keyup', function() {
                $('.append_currency').text($(this).val())
            })

            $('.append_currency').text($('.site-currency').val())
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hyip_v7\core\resources\views/backend/gateways/paytm.blade.php ENDPATH**/ ?>