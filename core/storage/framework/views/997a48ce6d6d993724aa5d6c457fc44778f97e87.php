

<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">


            <div class="row">

                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body d-flex flex-wrap">
                            <h5><?php echo e(__($pageTitle)); ?></h5>
                            <div class="input-group w-25 ml-auto">
                                <select class="custom-select" id="currency">
                                    <?php $__currentLoopData = $currency; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($cur['currency']); ?>" data-currency="<?php echo e($cur['currency']); ?>">
                                            <?php echo e(Str::ucfirst($key)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="button" id="addNew"> <i
                                            class="fa fa-plus"></i>
                                        <?php echo e(__('Add New')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">

                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <?php $__currentLoopData = $gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row" id="appear">

                                        <div class="form-group col-md-3 mb-3">
                                            <label class="col-form-label"><?php echo e(__('Gourl Image')); ?></label>

                                            <div id="image-preview-<?php echo e($gateway->gateway_parameters->gateway_currency); ?>" class="image-preview"
                                                style="background-image:url(<?php echo e(getFile('gateways', @$gateway->gateway_image)); ?>);">
                                                <label for="image-upload-<?php echo e($gateway->gateway_parameters->gateway_currency); ?>"
                                                    id="image-label-<?php echo e($gateway->gateway_parameters->gateway_currency); ?>"><?php echo e(__('Choose File')); ?></label>
                                                <input type="file" name="gateway_parameter[<?php echo e($gateway->gateway_parameters->gateway_currency); ?>][gourl_image]"
                                                    id="image-upload-<?php echo e($gateway->gateway_parameters->gateway_currency); ?>" data-id="<?php echo e($gateway->gateway_parameters->gateway_currency); ?>" class="imageUploader" />
                                            </div>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="row">

                                                <div class="form-group col-md-12">

                                                    <label for=""><?php echo e(__('Public Key')); ?></label>
                                                    <input type="text" name="gateway_parameter[<?php echo e($gateway->gateway_parameters->gateway_currency); ?>][public_key]"
                                                        class="form-control" value="<?php echo e($gateway->gateway_parameters->public_key); ?>">
                                                </div>

                                                <div class="form-group col-md-12">

                                                    <label for=""><?php echo e(__('Private Key')); ?></label>
                                                    <input type="text" name="gateway_parameter[<?php echo e($gateway->gateway_parameters->gateway_currency); ?>][private_key]"
                                                        class="form-control" value="<?php echo e($gateway->gateway_parameters->private_key); ?>">
                                                </div>


                                                <div class="form-group col-md-3">
                                                    <label for=""><?php echo e(__('Gateway Currency')); ?></label>

                                                    <input type="text" name="gateway_parameter[<?php echo e($gateway->gateway_parameters->gateway_currency); ?>][gateway_currency]"
                                                        class="form-control site-currency"
                                                        value="<?php echo e($gateway->gateway_parameters->gateway_currency); ?>" readonly>
                                                </div>

                                                <div class="form-group col-md-5 col-12">
                                                    <label><?php echo e(__('Conversion Rate')); ?></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <?php echo e('1 ' . @$general->site_currency . ' = '); ?>

                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control form_control currency"
                                                            name="gateway_parameter[<?php echo e($gateway->gateway_parameters->gateway_currency); ?>][rate]" value="<?php echo e($gateway->rate); ?>">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text append_currency">
                                                                <?php echo e($gateway->gateway_parameters->gateway_currency); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-4 col-12">
                                                    <label for=""><?php echo e(__('Allow as payment method')); ?></label>
                                                    <select name="gateway_parameter[<?php echo e($gateway->gateway_parameters->gateway_currency); ?>][status]" id=""
                                                        class="form-control selectric">
                                                        <option value="1" <?php echo e(@$gateway->status ? 'selected' : ''); ?>>
                                                            <?php echo e(__('Yes')); ?>

                                                        </option>
                                                        <option value="0" <?php echo e(@$gateway->status ? '' : 'selected'); ?>>
                                                            <?php echo e(__('No')); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn btn-primary float-right"><?php echo e(__('Update GoUrl.io Information')); ?></button>
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


            $(document).on('change', '.imageUploader', function() {
                showImagePreview(this, "#image-preview-" + $(this).data('id'));
            })

            function showImagePreview(input, id) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(id).css('background-image', "url(" + e.target.result + ")");
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }



            let currencyAdded = <?php echo json_encode($gateways->pluck('gateway_parameters.gateway_currency')->toArray(), 15, 512) ?>;

            $('#addNew').on('click', function() {
                let currency = $('#currency option:selected').val();

                if (currencyAdded.includes(currency)) {
                    iziToast.error({
                        message: "Already Added This Currency",
                        position: 'topRight'
                    });

                    return
                }


                let html = `
                

                <div class="row removeEl" >

                    <div class="col-md-12 text-right">
                        <button class="btn btn-danger remove" data-currncy="${currency}"><i class="fa fa-times"></i></button>
                    </div>

                    <div class="form-group col-md-3 mb-3">
                        <label class="col-form-label"><?php echo e(__('Gourl Image')); ?></label>

                        <div id="image-preview-${currency}" class="image-preview">
                            <label for="image-upload-${currency}" id="image-label-${currency}"><?php echo e(__('Choose File')); ?></label>
                            <input type="file" name="gateway_parameter[${currency}][gourl_image]" id="image-upload-${currency}" data-id="${currency}" class="imageUploader"/>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            



                            <div class="form-group col-md-12">

                                <label for=""><?php echo e(__('Public Key')); ?></label>
                                <input type="text" name="gateway_parameter[${currency}][public_key]" class="form-control">
                            </div>

                            <div class="form-group col-md-12">

                                <label for=""><?php echo e(__('Private Key')); ?></label>
                                <input type="text" name="gateway_parameter[${currency}][private_key]" class="form-control">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><?php echo e(__('Gateway Currency')); ?></label>

                                <input type="text" name="gateway_parameter[${currency}][gateway_currency]"
                                    class="form-control site-currency"
                                    value="${currency}" readonly>
                            </div>

                            <div class="form-group col-md-5 col-12">
                                <label><?php echo e(__('Conversion Rate')); ?></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <?php echo e('1 ' . @$general->site_currency . ' = '); ?>

                                        </div>
                                    </div>
                                    <input type="text" class="form-control form_control currency"
                                        name="gateway_parameter[${currency}][rate]" >
                                    <div class="input-group-append">
                                        <div class="input-group-text append_currency">
                                            ${currency}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-4 col-12">
                                <label for=""><?php echo e(__('Allow as payment method')); ?></label>
                                <select name="gateway_parameter[${currency}][status]" id="" class="form-control selectric">
                                    <option value="1" <?php echo e(@$gateway->status ? 'selected' : ''); ?>>
                                        <?php echo e(__('Yes')); ?>

                                    </option>
                                    <option value="0" <?php echo e(@$gateway->status ? '' : 'selected'); ?>>
                                        <?php echo e(__('No')); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>


                   
                </div>
                
                `;


                currencyAdded.push(currency);
                $('#appear').after(html)
            })



            $(document).on('click', '.remove', function(e) {
                e.preventDefault();


                currencyAdded.splice(currencyAdded.indexOf($(this).data('currency')), 1);


                $(this).parents().find('.removeEl').remove()
            })



            $(document).on('keyup', '.site-currency', function() {
                $('.append_currency').text($(this).val())
            })

            
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hyip_v7\core\resources\views/backend/gateways/gourl.blade.php ENDPATH**/ ?>