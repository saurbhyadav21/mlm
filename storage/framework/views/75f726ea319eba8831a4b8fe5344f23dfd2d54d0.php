<?php $__env->startSection('content'); ?>
    <!-- START Contact Section -->
    <section class="contact-section bg-white sp-100-70">
        <div class="container">


            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="contact-info">
                                <div class="mobile-device"><span class="fa fa-home fa-fw style"></span><span class="heading-info">Address</span>
                                    <div class="address-content"><?php echo e($frontDetail->address); ?></div>
                                </div>

                                <div class="mobile-device"><span class="fa fa-envelope fa-fw style"></span><span class="heading-info">Email</span>
                                    <div class="address-content"><?php echo e($frontDetail->email); ?></div>
                                </div>
                                <?php if($frontDetail->phone): ?>
                                    <div class="mobile-device"><span class="fa fa-phone fa-fw style"></span><span class="heading-info">Phone</span>
                                        <div class="address-content"><?php echo e($frontDetail->phone); ?></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                        </div>
                    </div>
                    <?php echo Form::open(['id'=>'contactUs', 'method'=>'POST']); ?>

                    <div class="row">
                        <div class="alert col-md-12 text-center" id="alert"></div>
                    </div>
                    <div class="row" id="contactUsBox">
                        <div class="form-group mb-4 col-lg-6 col-12">
                            <input type="text" name="name" class="form-control" placeholder="<?php echo app('translator')->get('modules.profile.yourName'); ?>"
                                   id="name">
                        </div>
                        <div class="form-group mb-4 col-lg-6 col-12">
                            <input type="email" class="form-control" placeholder="<?php echo app('translator')->get('modules.profile.yourEmail'); ?>"
                                   name="email" id="email">
                        </div>
                        <div class="form-group mb-4 col-12">
                            <textarea rows="6" name="message" class="form-control br-10"
                                      placeholder="<?php echo app('translator')->get('modules.messages.message'); ?>"
                                      id="message"></textarea>
                        </div>
                        <div class="g-recaptcha" data-sitekey="<?php echo e($global->google_recaptcha_key); ?>"></div>
                        <br>
                        <div class="col-12">
                            <button type="button" class="btn btn-lg btn-custom mt-1" id="contact-submit">
                                <?php echo e($frontMenu->contact_submit); ?>

                            </button>
                        </div>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>

        </div>
    </section>
    <!-- END Contact Section -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('footer-script'); ?>
    <script>
        $('#contact-submit').click(function () {

            <?php if(!is_null($global->google_recaptcha_key)): ?>
            if (grecaptcha.getResponse().length == 0) {
                alert('Please click the reCAPTCHA checkbox');
                return false;
            }
            <?php endif; ?>

            $.easyAjax({
                url: '<?php echo e(route('front.contact-us')); ?>',
                container: '#contactUs',
                type: "POST",
                data: $('#contactUs').serialize(),
                messagePosition: "inline",
                success: function (response) {
                    if (response.status === 'success') {
                        $('#contactUsBox').remove();
                    }
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.sass-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/softwarestore22/public_html/mlm/resources/views/saas/contact.blade.php ENDPATH**/ ?>