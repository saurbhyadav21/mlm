<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title> <?php echo e(__(isset($seoDetail) ? $seoDetail->seo_title : $pageTitle)); ?> | <?php echo e(ucwords($setting->company_name)); ?></title>

    <meta name="description" content="<?php echo e(isset($seoDetail) ? $seoDetail->seo_description : ''); ?>">
    <meta name="author" content="<?php echo e(isset($seoDetail) ? $seoDetail->seo_author : ''); ?>">
    <meta name="keywords" content="<?php echo e(isset($seoDetail) ? $seoDetail->seo_keywords : ''); ?>">

    <meta property="og:title" content="<?php echo e(isset($seoDetail) ? $seoDetail->seo_title : ''); ?>">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(url('/')); ?>">
    <meta property="og:site_name" content="<?php echo e($setting->company_name); ?>" />
    <meta property="og:description" content="<?php echo e(isset($seoDetail) ? $seoDetail->seo_description : ''); ?>">


    <!-- Bootstrap CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('saas/vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('saas/vendor/animate-css/animate.min.css')); ?>">
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('saas/vendor/slick/slick.css')); ?>">
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('saas/vendor/slick/slick-theme.css')); ?>">
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('saas/fonts/flaticon/flaticon.css')); ?>">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <!-- Template CSS -->
    <link type="text/css" rel="stylesheet" media="all" href="<?php echo e(asset('saas/css/main.css')); ?>">
    <!-- Template Font Family  -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" media="all"
          href="<?php echo e(asset('saas/vendor/material-design-iconic-font/css/material-design-iconic-font.min.css')); ?>">

    <script src="https://www.google.com/recaptcha/api.js"></script>
    <style>
        :root {
            --main-color: <?php echo e($frontDetail->primary_color); ?>;
            --main-home-background: <?php echo e($frontDetail->light_color); ?>;
        }
        /*To be removed to next 3.6.8 update. Added so as cached main.css to show background image on load*/
        .section-hero .banner::after {
            position: absolute;
            content: '';
            left: 0;
            top: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background: #fff;
            background: linear-gradient(to bottom, #ffffff 0%,#fffdfd 50%, #fff2f3 100%);
            opacity: 0.95;
            padding-bottom: 400px;
        }
        .section-hero .banner {
            background: url("<?php echo e($setting->login_background_url); ?>") center center/cover no-repeat !important;
        }
        .breadcrumb-section::after {
            background: url("<?php echo e($setting->login_background_url); ?>") center center/cover no-repeat !important;
        }
        .help-block {
            color: #8a1f11 !important;
        }
        .js-cookie-consent{
            position: fixed;
            bottom: 0;
            z-index: 1000;
            width: 100%;
        }

    </style>

    <?php $__currentLoopData = $frontWidgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $item->widget_code; ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php echo $__env->yieldPushContent('head-script'); ?>

</head>

<body id="home">


<!-- Topbar -->
<?php echo $__env->make('sections.saas.saas_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- END Topbar -->

<!-- Header -->
<?php echo $__env->yieldContent('header-section'); ?>
<!-- END Header -->
<?php if(\Illuminate\Support\Facades\Route::currentRouteName() != 'front.home' && \Illuminate\Support\Facades\Route::currentRouteName() != 'front.get-email-verification'): ?>
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-uppercase mb-4"><?php echo e(ucfirst($pageTitle)); ?></h2>
                <ul class="breadcrumb mb-0 justify-content-center">
                    <li class="breadcrumb-item"><a href="#"> <?php echo app('translator')->get('app.menu.home'); ?></a></li>
                    <li class="breadcrumb-item active"><?php echo e(ucfirst($pageTitle)); ?></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>


<!-- Cta -->
<?php echo $__env->make('saas.section.cta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End Cta -->

<!-- Footer -->

<?php echo $__env->make('sections.saas.saas_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- END Footer -->



<!-- Scripts -->
<script src="<?php echo e(asset('saas/vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('saas/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('saas/vendor/slick/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('saas/vendor/wowjs/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('saas/js/main.js')); ?>"></script>
<script src="<?php echo e(asset('front/plugin/froiden-helper/helper.js')); ?>"></script>
<!-- Global Required JS -->

<?php echo $__env->yieldPushContent('footer-script'); ?>
</body>
</html>
<?php /**PATH /home/softwarestore22/public_html/mlm/resources/views/layouts/sass-app.blade.php ENDPATH**/ ?>