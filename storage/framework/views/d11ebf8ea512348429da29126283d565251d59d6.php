<div class="navbar-default sidebar" role="navigation">
    <div class="navbar-header">
        <!-- Toggle icon for mobile view -->
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
            data-target=".navbar-collapse"><i class="ti-menu"></i></a>

        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo hidden-xs text-center" href="<?php echo e(route('admin.dashboard')); ?>">
                <span class="visible-md"><img src="<?php echo e($global->logo_url); ?>" alt="home" class=" admin-logo"/></span>
                <span class="visible-sm"><img src="<?php echo e($global->logo_url); ?>" alt="home" class=" admin-logo"/></span>
            </a>

        </div>
        <!-- /Logo -->

        <!-- This is the message dropdown -->
        <ul class="nav navbar-top-links navbar-right pull-right visible-xs">
            <?php if(isset($activeTimerCount)): ?>
            <li class="dropdown hidden-xs">
            <span id="timer-section">
                <div class="nav navbar-top-links navbar-right pull-right m-t-10">
                    <a class="btn btn-rounded btn-default timer-modal" href="javascript:;"><?php echo app('translator')->get("modules.projects.activeTimers"); ?>
                        <span class="label label-danger" id="activeCurrentTimerCount"><?php if($activeTimerCount > 0): ?> <?php echo e($activeTimerCount); ?> <?php else: ?> 0 <?php endif; ?></span>
                    </a>
                </div>
            </span>
            </li>
            <?php endif; ?>


            <li class="dropdown">
                <select class="selectpicker language-switcher" data-width="fit">
                    <option value="en" <?php if($user->locale == "en"): ?> selected
                        <?php endif; ?> data-content='<span class="flag-icon flag-icon-us"></span> En'>En
                    </option>
                    <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($language->language_code); ?>"
                                <?php if($user->locale == $language->language_code): ?> selected
                                <?php endif; ?>  data-content='<span class="flag-icon <?php if($language->language_code == 'zh-CN'): ?> flag-icon-cn <?php elseif($language->language_code == 'zh-TW'): ?> flag-icon-tw <?php else: ?> flag-icon-<?php echo e($language->language_code); ?> <?php endif; ?>"></span>'><?php echo e($language->language_code); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </li>
            <?php if($company_details->count() > 1): ?>
                <li class="dropdown">
                    <select class="selectpicker company-switcher" data-width="fit" name="companies" id="companies">
                        <?php $__currentLoopData = $company_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php echo e($company_detail->company->id === $global->id ? 'selected' : ''); ?> value="<?php echo e($company_detail->company->id); ?>"><?php echo e(ucfirst($company_detail->company->company_name)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </li>
            <?php endif; ?>

            <!-- .Task dropdown -->
            <li class="dropdown" id="top-notification-dropdown">
                <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                    <i class="icon-bell"></i>
                    <?php if(count($user->unreadNotifications) > 0): ?>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    <?php endif; ?>
                </a>
                <ul class="dropdown-menu  dropdown-menu-right mailbox animated slideInDown">
                    <li>
                        <div class="drop-title"><?php echo app('translator')->get('app.newNotifications'); ?> <span
                                    class="top-notification-count"><?php echo e(count($user->unreadNotifications)); ?></span>
                        </div>
                    </li>
                    <?php $__currentLoopData = $user->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(view()->exists('notifications.client.'.\Illuminate\Support\Str::snake(class_basename($notification->type)))): ?>
                            <?php echo $__env->make('notifications.client.'.\Illuminate\Support\Str::snake(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(count($user->unreadNotifications) > 0): ?>
                        <li>
                            <a class="text-center mark-notification-read"
                                href="javascript:;"> <?php echo app('translator')->get('app.markRead'); ?> <i class="fa fa-check"></i> </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
            <!-- /.Task dropdown -->


            <li class="dropdown">
                <a href="<?php echo e(route('logout')); ?>" title="Logout" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"
                ><i class="fa fa-power-off"></i>
                </a>
            </li>



        </ul>

    </div>
    <!-- /.navbar-header -->

    <div class="top-left-part">
        <a class="logo hidden-xs hidden-sm text-center" href="<?php echo e(route('client.dashboard.index')); ?>">
            <img src="<?php echo e($global->logo_url); ?>" alt="home" class=" admin-logo"/>
        </a>
    </div>
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">

        <ul class="nav" id="side-menu">


            <li class="user-pro hidden-md  hidden-sm  hidden-lg">
                <?php if(is_null($user->image)): ?>
                    <a href="#" class="waves-effect"><img src="<?php echo e(asset('img/default-profile-3.png')); ?>" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo e((strlen($user->name) > 24) ? substr(ucwords($user->name), 0, 20).'..' : ucwords($user->name)); ?>

                            <span class="fa arrow"></span></span>
                    </a>
                <?php else: ?>
                    <a href="#" class="waves-effect"><img src="<?php echo e(asset_url('avatar/'.$user->image)); ?>" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo e(ucwords($user->name)); ?>

                            <span class="fa arrow"></span></span>
                    </a>
                <?php endif; ?>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(route('client.profile.index')); ?>"><i class="ti-user"></i> <?php echo app('translator')->get("app.menu.profileSettings"); ?></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        ><i class="fa fa-power-off"></i> <?php echo app('translator')->get('app.logout'); ?></a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </li>
                </ul>
            </li>


            <li><a href="<?php echo e(route('client.dashboard.index')); ?>" class="waves-effect"><i class="icon-speedometer"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.dashboard'); ?> </span></a> </li>

            <?php if(in_array('projects',$modules)): ?>
                <li><a href="<?php echo e(route('client.projects.index')); ?>" class="waves-effect"><i class="icon-layers"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.projects'); ?> </span> <?php if($unreadProjectCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>
            <?php if(in_array('products',$modules)): ?>
                <li><a href="<?php echo e(route('client.products.index')); ?>" class="waves-effect"><i class="icon-layers"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.products'); ?> </span> <?php if($unreadProjectCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>

            <?php if(in_array('tickets',$modules)): ?>
                <li><a href="<?php echo e(route('client.tickets.index')); ?>" class="waves-effect"><i class="ti-ticket"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.tickets"); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('invoices',$modules)): ?>
                <li><a href="<?php echo e(route('client.invoices.index')); ?>" class="waves-effect"><i class="ti-receipt"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.invoices'); ?> </span> <?php if($unreadInvoiceCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>

            <?php if(in_array('estimates',$modules)): ?>
                <li><a href="<?php echo e(route('client.estimates.index')); ?>" class="waves-effect"><i class="icon-doc"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.estimates'); ?> </span> <?php if($unreadEstimateCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>

            <?php if(in_array('payments',$modules)): ?>
                <li><a href="<?php echo e(route('client.payments.index')); ?>" class="waves-effect"><i class="fa fa-money"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.payments'); ?> </span> <?php if($unreadPaymentCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>

            <?php if(in_array('events',$modules)): ?>
                <li><a href="<?php echo e(route('client.events.index')); ?>" class="waves-effect"><i class="icon-calender"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.Events'); ?></span></a> </li>
            <?php endif; ?>

            <?php if(in_array('contracts',$modules)): ?>
                <li><a href="<?php echo e(route('client.contracts.index')); ?>" class="waves-effect"><i class="fa fa-file"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.contracts'); ?></span></a> </li>
            <?php endif; ?>

            <?php if($gdpr->enable_gdpr): ?>
                <li><a href="<?php echo e(route('client.gdpr.index')); ?>" class="waves-effect"><i class="icon-lock"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.gdpr'); ?></span></a> </li>
            <?php endif; ?>

            <?php if(in_array('notices',$modules)): ?>
                <li><a href="<?php echo e(route('client.notices.index')); ?>" class="waves-effect"><i class="ti-layout-media-overlay"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.noticeBoard"); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('messages',$modules)): ?>
                <?php if($messageSetting->allow_client_admin == 'yes' || $messageSetting->allow_client_employee == 'yes'): ?>
                    <li><a href="<?php echo e(route('client.user-chat.index')); ?>" class="waves-effect"><i class="icon-envelope"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.messages'); ?> <?php if($unreadMessageCount > 0): ?><span class="label label-rouded label-custom pull-right"><?php echo e($unreadMessageCount); ?></span> <?php endif; ?></span></a> </li>
                <?php endif; ?>
            <?php endif; ?>

        </ul>

        <div class="menu-footer">
            <div class="menu-user row">
                <div class="col-lg-6 m-b-5">
                    <div class="btn-group dropup user-dropdown">
                        <?php if(is_null($user->image)): ?>
                            <img  aria-expanded="false" data-toggle="dropdown" src="<?php echo e(asset('img/default-profile-3.png')); ?>" alt="user-img" class="img-circle dropdown-toggle h-30 w-30">

                        <?php else: ?>
                            <img aria-expanded="false" data-toggle="dropdown" src="<?php echo e(asset_url('avatar/'.$user->image)); ?>" alt="user-img" class="img-circle dropdown-toggle h-30 w-30">

                        <?php endif; ?>
                        <ul role="menu" class="dropdown-menu">
                            <li><a class="bg-inverse"><strong class="text-info"><?php echo e(ucwords($user->name)); ?></strong></a></li>
                            <li><a href="<?php echo e(route('client.profile.index')); ?>"><i class="ti-user"></i> <?php echo app('translator')->get("app.menu.profileSettings"); ?></a></li>

                            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"
                                ><i class="fa fa-power-off"></i> <?php echo app('translator')->get('app.logout'); ?></a>

                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 text-center m-b-5">
                    <div class="btn-group dropup notification-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>
                            <?php if(count($user->unreadNotifications) > 0): ?>

                                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu mailbox ">
                            <li>
                                <div class="drop-title"><?php echo app('translator')->get('app.newNotifications'); ?> <span class="badge badge-success top-notification-count"><?php echo e(count($user->unreadNotifications)); ?></span>
                                </div>
                            </li>
                            <div class="notificationSlimScroll">
                                <?php $__currentLoopData = $user->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(view()->exists('notifications.client.'.\Illuminate\Support\Str::snake(class_basename($notification->type)))): ?>
                                        <?php echo $__env->make('notifications.client.'.\Illuminate\Support\Str::snake(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php if(count($user->unreadNotifications) > 0): ?>
                                <li>
                                    <a class="text-center mark-notification-read"
                                        href="javascript:;"> <?php echo app('translator')->get('app.markRead'); ?> <i class="fa fa-check"></i> </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="menu-copy-right">
                <a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="ti-angle-double-right ti-angle-double-left"></i> <span class="collapse-sidebar-text"><?php echo app('translator')->get('app.collapseSidebar'); ?></span></a>
            </div>

        </div>



    </div>


</div>
<?php /**PATH /home/softwarestore22/public_html/mlm/resources/views/sections/client_left_sidebar.blade.php ENDPATH**/ ?>