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
            <div class="row gy-4">
                <div class="col-lg-8">
                    <div class="card bg-second">
                        <img src="<?php echo e(getFile('blog', @$data->data->image)); ?>" height="400px" width="100%" alt="blog">

                        <div class="p-3">
                            <h3 class="mt-3"><b><?php echo e(@$data->data->title); ?></b></h3>
                            <p class="text-justifys"> <?php echo clean(@$data->data->description); ?>
                            </p>
                        </div>

                        <div class="social-links my-3 ms-3">
                            <h5 class="d-inline me-2"><?php echo e(__('Share')); ?>:</h5>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(URL::current()); ?>" target="_blank"
                                class="social-links-btn btn-border btn-sm ">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.twitter.com/intent/tweet?text=blog;url=<?php echo e(URL::current()); ?>"
                                target="_blank" class="social-links-btn btn-border btn-sm"><i
                                    class="bx bxl-twitter"></i></a>
                        </div>
                    </div>

                    <div class="mt-5">
                        <h3><?php echo e(__('All Comments')); ?></h3>
                        <hr>
                        <?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="d-flex justify-content-between">
                                <div class="user-icon">
                                    <div>

                                        <?php if($comment->user->image): ?>
                                            <img src="<?php echo e(getFile('user', $comment->user->image)); ?>" alt="pp">
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('asset/frontend/img/user.png')); ?>" alt="pp">
                                        <?php endif; ?>



                                    </div>
                                    <h6><?php echo e($comment->user->fname); ?> <?php echo e($comment->user->lname); ?></h6>
                                </div>

                                <p><?php echo e($comment->created_at->format('d M Y')); ?></p>
                            </div>
                            <p class="comment text-justifys"><?php echo e($comment->comment); ?></p>

                            <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p><?php echo e(__('Comment Not Found')); ?></p>
                        <?php endif; ?>

                        <?php echo e($comments->links('backend.partial.paginate')); ?>



                    </div>

                    <?php if(Auth::user()): ?>
                        <div class=" mt-4">
                            <div class="card bg-second">
                                <div class="card-header">
                                    <h5 class="p-3"><?php echo e(__('Post a Comment')); ?></h5>
                                </div>
                                <form action="<?php echo e(route('blogcomment', @$data->id)); ?>" method="post" role="form"
                                    class="p-3">
                                    <?php echo csrf_field(); ?>
                                    <div class="mb-3">
                                        <textarea class="form-control" name="comment" rows="5" placeholder="Comment" required></textarea>
                                    </div>

                                    <button class="cmn-btn" type="submit"><?php echo e(__('Post Comemnt')); ?></button>
                                </form>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-4 ps-lg-5">
                    <div class="card bg-second">
                        <div class="card-header">
                            <h4 class="mb-0"><?php echo e(__('Recent Blogs')); ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="side-blog-list">
                                <?php $__empty_1 = true; $__currentLoopData = $recentblog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="side-blog">
                                        <div class="side-blog-thumb">
                                            <img src="<?php echo e(getFile('blog', @$item->data->image)); ?>" alt="image">
                                        </div>
                                        <div class="side-blog-content">
                                            <h6 class="mb-0"><a
                                                    href="<?php echo e(route('blog', [@$item->id, Str::slug(@$item->data->title)])); ?>"><?php echo e(@$item->data->title); ?></a>
                                            </h6>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template().'layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mrkgjcvi/public_html/core/resources/views/frontend/pages/blog.blade.php ENDPATH**/ ?>