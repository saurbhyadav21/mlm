<?php $__env->startSection('content'); ?>
    <!-- START Pricing Section -->
    <section class="pricing-section bg-white sp-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title mb-5">
                        <h3><?php echo e($frontDetail->price_title); ?></h3>
                        <p><?php echo e($frontDetail->price_description); ?></p>
                    </div>
                    <?php if(isset($packageSetting) && isset($trialPackage) && $packageSetting && !is_null($trialPackage)): ?>
                        <h4 class="text-center mb-5"><?php echo e($packageSetting->trial_message); ?></h4>
                    <?php endif; ?>


                </div>
            </div>
            <div class="text-center mb-5">
                <div class="nav price-tabs justify-content-center" role="tablist">
                    <a class="nav-link active" href="#monthly" role="tab" data-toggle="tab"><?php echo app('translator')->get('app.monthly'); ?></a>
                    <a class="nav-link " href="#yearly"  role="tab" data-toggle="tab"><?php echo app('translator')->get('app.annual'); ?></a>
                </div>
            </div>
            <div class="tab-content wow fadeIn">
                <div role="tabpanel" class="tab-pane fade " id="yearly">
                    <div class="container">
                        <div class="price-wrap border row no-gutters">
                            <div class="diff-table col-6 col-md-3">
                                <div class="price-top">
                                    <div class="price-top title">
                                        <h3><?php echo app('translator')->get('app.pickUp'); ?> <br> <?php echo app('translator')->get('app.yourPlan'); ?></h3>
                                        
                                    </div>
                                    <div class="price-content">

                                        <ul>
                                            <li>
                                                <?php echo app('translator')->get('app.max'); ?> <?php echo app('translator')->get('app.menu.employees'); ?>
                                            </li>
                                            <?php $__currentLoopData = $packageFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <?php echo e(__('modules.module.'.$packageFeature)); ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                                <div class="all-plans col-6 col-md-9">
                                <div class="row no-gutters flex-nowrap flex-wrap overflow-x-auto row-scroll">
                                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-md-3">
                                            <div class="pricing-table price-<?php if($key == 1): ?>pro <?php endif; ?>">
                                                <div class="price-top">
                                                    <div class="price-head text-center">
                                                        <h5 class="mb-0"><?php echo e(ucwords($item->name)); ?></h5>
                                                    </div>
                                                    <div class="rate">
                                                        <h2 class="mb-2"><sup><?php echo e($global->currency->currency_symbol); ?></sup> <span
                                                                    class="font-weight-bolder"><?php echo e(round($item->annual_price)); ?></span>
                                                        </h2>
                                                        <p class="mb-0"><?php echo app('translator')->get('app.billedAnnually'); ?></p>
                                                    </div>
                                                </div>
                                                <div class="price-content">
                                                    <ul>
                                                        <li>
                                                            <?php echo e($item->max_employees); ?>

                                                        </li>
                                                        <?php
                                                            $packageModules = (array)json_decode($item->module_in_package);
                                                        ?>
                                                        <?php $__currentLoopData = $packageFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <?php if(in_array($packageFeature, $packageModules)): ?>
                                                                    <i class="zmdi zmdi-check-circle blue"></i>
                                                                <?php else: ?>
                                                                    <i class="zmdi zmdi-close-circle"></i>
                                                                <?php endif; ?>
                                                                &nbsp;
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                                
                                                    
                                                
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade show active" id="monthly">
                        <div class="container">
                            <div class="price-wrap border row no-gutters">
                                <div class="diff-table col-6 col-md-3">
                                    <div class="price-top">
                                        <div class="price-top title">
                                            <h3><?php echo app('translator')->get('app.pickUp'); ?> <br> <?php echo app('translator')->get('app.yourPlan'); ?></h3>
                                            
                                        </div>
                                        <div class="price-content">

                                            <ul>
                                                <li>
                                                    <?php echo app('translator')->get('app.max'); ?> <?php echo app('translator')->get('app.menu.employees'); ?>
                                                </li>
                                                <?php $__currentLoopData = $packageFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <?php echo e(__('modules.module.'.$packageFeature)); ?>

                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                    <div class="all-plans col-6 col-md-9">
                                    <div class="row no-gutters flex-nowrap flex-wrap overflow-x-auto row-scroll">
                                        <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3">
                                                <div class="pricing-table price-<?php if($key == 1): ?>pro <?php endif; ?> ">
                                                    <div class="price-top">
                                                        <div class="price-head text-center">
                                                            <h5 class="mb-0"><?php echo e(ucwords($item->name)); ?></h5>
                                                        </div>
                                                        <div class="rate">
                                                            <h2 class="mb-2"><sup><?php echo e($global->currency->currency_symbol); ?></sup> <span
                                                                        class="font-weight-bolder"><?php echo e(round($item->monthly_price)); ?></span>
                                                            </h2>
                                                            <p class="mb-0"><?php echo app('translator')->get('app.billedMonthly'); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="price-content">
                                                        <ul>
                                                            <li>
                                                                <?php echo e($item->max_employees); ?>

                                                            </li>
                                                            <?php
                                                                $packageModules = (array)json_decode($item->module_in_package);
                                                            ?>
                                                            <?php $__currentLoopData = $packageFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $packageFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li>
                                                                    <?php if(in_array($packageFeature, $packageModules)): ?>
                                                                        <i class="zmdi zmdi-check-circle blue"></i>
                                                                    <?php else: ?>
                                                                        <i class="zmdi zmdi-close-circle"></i>
                                                                    <?php endif; ?>
                                                                    &nbsp;
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                    
                                                        
                                                    
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- END Pricing Section -->

    <!-- START Section FAQ -->
    <section class="bg-white sp-100-70 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title mb-60">
                        <h3><?php echo e($frontDetail->faq_title); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div id="accordion" class="theme-accordion">
                        <?php $__empty_1 = true; $__currentLoopData = $frontFaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frontFaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="card border-0 mb-30">
                                <div class="card-header border-bottom-0 p-0" id="acc<?php echo e($frontFaq->id); ?>">
                                    <h5 class="mb-0">
                                        <button class="position-relative text-decoration-none w-100 text-left collapsed"
                                                data-toggle="collapse" data-target="#collapse<?php echo e($frontFaq->id); ?>"
                                                aria-controls="collapse<?php echo e($frontFaq->id); ?>">
                                           <?php echo e($frontFaq->question); ?>

                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse<?php echo e($frontFaq->id); ?>" class="collapse" aria-labelledby="acc<?php echo e($frontFaq->id); ?>" data-parent="#accordion">
                                    <div class="card-body">
                                        <p><?php echo $frontFaq->answer; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section FAQ -->

<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sass-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/softwarestore22/public_html/mlm/resources/views/saas/pricing.blade.php ENDPATH**/ ?>