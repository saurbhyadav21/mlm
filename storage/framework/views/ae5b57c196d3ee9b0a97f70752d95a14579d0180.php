<footer class="bg-white footer">
    <div class="container border-bottom">
        <div class="footer__widgets">
            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget footer__about-us">
                        <a href="./" class="hover-logo d-inline-block">
                            <img src="<?php echo e($setting->logo_front_url); ?>" class="logo" style="max-height:35px">
                        </a>

                        <div class="socials mt-4">
                            <?php if($frontDetail->social_links): ?>
                                <?php $__currentLoopData = json_decode($frontDetail->social_links,true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(strlen($link['link']) > 0): ?>
                                        <a href="<?php echo e($link['link']); ?>" class="zmdi zmdi-<?php echo e($link['name']); ?>" target="_blank">
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                        </div>

                    </div>
                </div> <!-- end about us -->

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget widget-links">
                        <h5 class="widget-title"><?php echo e(__('app.main')); ?></h5>
                        <ul class="list-no-dividers">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('front.signup.index')); ?>"><?php echo app('translator')->get('modules.frontCms.getStarted'); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('front.feature')); ?>"><?php echo e($frontMenu->feature); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('front.pricing')); ?>"><?php echo e($frontMenu->price); ?></a>
                                </li>
                                <li class="nav-item">
                                    <?php if(module_enabled('Subdomain')): ?>
                                        <a href="<?php echo e(route('front.workspace')); ?>"
                                           class="nav-link"><?php echo e($frontMenu->login); ?></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>"
                                           class="nav-link"><?php echo e($frontMenu->login); ?></a>
                                    <?php endif; ?>
                                </li>
                            </ul>

                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget widget-links">
                        <h5 class="widget-title"><?php echo e(__('app.others')); ?></h5>
                        <ul class="navbar-nav ml-auto">
                            <?php $__currentLoopData = $footerSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footerSetting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item active"><a class="nav-link" href="<?php echo e(route('front.page', $footerSetting->slug)); ?>"><?php echo e($footerSetting->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('front.contact')); ?>"><?php echo e($frontMenu->contact); ?></a>
                                </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="widget widget-links">
                        <h5 class="widget-title"><?php echo e($frontMenu->contact); ?></h5>

                        <div class="socials mt-40">

                            <div class="f-contact-detail mt-20">
                                <i class="flaticon-email"></i>
                                <p class="mb-0"><?php echo e($frontDetail->email); ?></p>
                            </div>
                            <?php if($frontDetail->phone): ?>
                                <div class="f-contact-detail mt-20">
                                    <i class="flaticon-call"></i>
                                    <p class="mb-0"><?php echo e($frontDetail->phone); ?></p>
                                </div>
                            <?php endif; ?>

                            <div class="f-contact-detail mt-20">
                                <i class="flaticon-placeholder"></i>
                                <p class="mb-0"><?php echo e($frontDetail->address); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end container -->

    <div class="footer__bottom top-divider">
        <div class="container text-center ">
            <span class="copyright mr-3">
              <?php echo e(ucwords($frontDetail->footer_copyright_text)); ?>

            </span>
            <div class="input-group d-inline-flex lang-selector">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="zmdi zmdi-globe-alt"></i></span>
                </div>
                <select class="custom-select custom-select-sm" onchange="location = this.value;">
                    <option value="<?php echo e(route('front.language.lang', 'en')); ?>"
                            <?php if($locale == 'en'): ?> selected <?php endif; ?>>English
                    </option>
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e(route('front.language.lang', $language->language_code)); ?>"
                                <?php if($locale == $language->language_code): ?> selected <?php endif; ?>><?php echo e($language->language_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

        </div>
    </div> <!-- end footer bottom -->

</footer>

<?php /**PATH C:\wamp64\www\projects\mlm\resources\views/sections/saas/saas_footer.blade.php ENDPATH**/ ?>