<?php $__env->startPush('name'); ?>
    <style>
        .card-footer {
            padding: 0.5rem, 0rem !important;
        }

    </style>
<?php $__env->stopPush(); ?>
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



    <section class="s-pt-100 s-pb-100">
        <div class="container">
            <div class="row gy-4">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $comment = App\Models\Comment::where('blog_id', $blog->id)->count();
                    ?>

                    <div class="col-md-6 col-lg-4">
                        <div class="blog-box">
                            <div class="blog-box-thumb">
                                <img src="<?php echo e(getFile('blog', @$blog->data->image)); ?>" alt="image">
                            </div>
                            <div class="blog-box-content">
                                <span class="blog-category"><?php echo e(@$blog->data->tag); ?></span>
                                <h3 class="title"><a
                                        href="<?php echo e(route('blog', [@$blog->id, Str::slug(@$blog->data->title)])); ?>"><?php echo e(@$blog->data->title); ?></a>
                                </h3>
                                <ul class="blog-meta">
                                    <li><i class="fas fa-clock"></i> <?php echo e(@$blog->created_at->diffforhumans()); ?></li>
                                    <li><i class="fas fa-comment"></i> <?php echo e($comment); ?> <?php echo e(__('comments')); ?></li>
                                </ul>
                                <p class="mb-0 mt-3"><?php echo e(@$blog->data->short_description); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php echo e($blogs->links('backend.partial.paginate')); ?>

        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrkgjcvi/public_html/core/resources/views/frontend/pages/allblog.blade.php ENDPATH**/ ?>