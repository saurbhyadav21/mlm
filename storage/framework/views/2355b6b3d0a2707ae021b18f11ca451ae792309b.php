<?php $__env->startSection('content'); ?>

    <!-- START Saas Features -->
    <section class="border-bottom bg-white sp-100 pb-3 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title mb-60">
                        <h3><?php echo e($frontDetail->task_management_title); ?></h3>
                        <p><?php echo e($frontDetail->task_management_detail); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $featureTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featureTask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-4 col-sm-6 col-12 mb-60">
                        <div class="saas-f-box">
                            <div class="align-items-center icon justify-content-center">
                                <i class="<?php echo e($featureTask->icon); ?>"></i>
                            </div>
                            <h5><?php echo e($featureTask->title); ?></h5>
                            <p class="mb-0"><?php echo $featureTask->description; ?> </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="border-bottom bg-white sp-100 pb-3 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title mb-60">
                        <h3><?php echo e($frontDetail->manage_bills_title); ?></h3>
                        <p><?php echo e($frontDetail->manage_bills_detail); ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $featureBills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featureBill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-md-4 col-sm-6 col-12 mb-60">
                        <div class="saas-f-box">
                            <div class="align-items-center icon justify-content-center">
                                <i class="<?php echo e($featureBill->icon); ?>"></i>
                            </div>
                            <h5><?php echo e($featureBill->title); ?></h5>
                            <p class="mb-0"><?php echo $featureBill->description; ?> </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- END Saas Features -->


    <!-- START SAAS Features -->
    <section class="sp-100-40 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title mb-60">
                        <h3><?php echo e($frontDetail->teamates_title); ?></h3>
                        <p><?php echo e($frontDetail->teamates_detail); ?></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center wow fadeIn" data-wow-delay="0.4s">
                <?php $__empty_1 = true; $__currentLoopData = $featureTeams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featureTeam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-60">
                        <div class="saas-f-box text-center">
                            <div class="align-items-center icon justify-content-center">
                                <i class="<?php echo e($featureTeam->icon); ?>"></i>
                            </div>
                            <h5><?php echo e($featureTeam->title); ?></h5>
                            <p class="mb-0"><?php echo $featureTeam->description; ?> </p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- END SAAS Features -->

    <!-- START Clients Section -->
    <?php echo $__env->make('saas.section.client', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- END Clients Section -->

    <!-- START Integration Section -->
    <section class="sp-100-70 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title mb-60">
                        <h3><?php echo e($frontDetail->favourite_apps_title); ?></h3>
                        <p><?php echo e($frontDetail->favourite_apps_detail); ?></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php $__empty_1 = true; $__currentLoopData = $featureApps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $featureApp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-30 wow fadeIn" data-wow-delay="0.4s">
                        <div class="integrate-box shadow">
                            <img src="<?php echo e($featureApp->image_url); ?>"   alt="<?php echo e($featureBill->title); ?>">
                            <h5 class="mb-0"><?php echo e(ucfirst($featureApp->title)); ?> </h5>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- END Integration Section -->


<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sass-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/softwarestore22/public_html/mlm/resources/views/saas/feature.blade.php ENDPATH**/ ?>