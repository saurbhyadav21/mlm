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
                        <?php if(view()->exists('notifications.member.'.\Illuminate\Support\Str::snake(class_basename($notification->type)))): ?>
                            <?php echo $__env->make('notifications.member.'.\Illuminate\Support\Str::snake(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        <a class="logo hidden-xs hidden-sm text-center" href="<?php echo e(route('admin.dashboard')); ?>">
            <img src="<?php echo e($global->logo_url); ?>" alt="home" class=" admin-logo"/>
        </a>
    </div>
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <!-- .User Profile -->
        <ul class="nav" id="side-menu">
            
                
                
                    
                        
                        
                        
                
                
            

            <li class="user-pro  hidden-sm hidden-md hidden-lg">
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
                    <li><a href="<?php echo e(route('member.profile.index')); ?>"><i class="ti-user"></i> <?php echo app('translator')->get("app.menu.profileSettings"); ?></a></li>
                    <?php if($user->hasRole('admin')): ?>
                        <li>
                            <a href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="fa fa-sign-in"></i>  <?php echo app('translator')->get("app.loginAsAdmin"); ?>
                            </a>
                        </li>
                    <?php endif; ?>
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

            <li><a href="<?php echo e(route('member.dashboard')); ?>" class="waves-effect"><i class="icon-speedometer"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.dashboard"); ?> </span></a> </li>

            <?php if(in_array('clients',$modules)): ?>
            <?php if($user->can('view_clients')): ?>
            <li><a href="<?php echo e(route('member.clients.index')); ?>" class="waves-effect"><i class="icon-people"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.clients'); ?> </span></a> </li>
            <?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('employees',$modules)): ?>
            <?php if($user->can('view_employees')): ?>
                <li><a href="<?php echo e(route('member.employees.index')); ?>" class="waves-effect"><i class="icon-user"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.employees'); ?> </span></a> </li>
            <?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('projects',$modules)): ?>
            <li><a href="<?php echo e(route('member.projects.index')); ?>" class="waves-effect"><i class="icon-layers"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.projects"); ?> </span> <?php if($unreadProjectCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>

            <?php if(in_array('products',$modules) && $user->can('view_product')): ?>
                <li><a href="<?php echo e(route('member.products.index')); ?>" class="waves-effect"><i class="icon-basket"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.products'); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('tasks',$modules)): ?>
            <li><a href="<?php echo e(route('member.task.index')); ?>" class="waves-effect"><i class="ti-layout-list-thumb"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.tasks'); ?> <span class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(route('member.all-tasks.index')); ?>"><?php echo app('translator')->get('app.menu.tasks'); ?></a></li>
                    <li class="hidden-sm hidden-xs"><a href="<?php echo e(route('member.taskboard.index')); ?>"><?php echo app('translator')->get('modules.tasks.taskBoard'); ?></a></li>
                    <li><a href="<?php echo e(route('member.task-calendar.index')); ?>"><?php echo app('translator')->get('app.menu.taskCalendar'); ?></a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(in_array('leads',$modules)): ?>
                <li><a href="<?php echo e(route('member.leads.index')); ?>" class="waves-effect"><i class="icon-doc"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.lead'); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('timelogs',$modules)): ?>
                <li><a href="<?php echo e(route('member.all-time-logs.index')); ?>" class="waves-effect"><i class="icon-clock"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.timeLogs'); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('attendance',$modules)): ?>
                <?php if($user->can('view_attendance')): ?>
                    <li><a href="<?php echo e(route('member.attendances.summary')); ?>" class="waves-effect"><i class="icon-clock"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.attendance"); ?> </span></a> </li>
                <?php else: ?>
                    <li><a href="<?php echo e(route('member.attendances.index')); ?>" class="waves-effect"><i class="icon-clock"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.attendance"); ?> </span></a> </li>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(in_array('holidays',$modules)): ?>
            <li><a href="<?php echo e(route('member.holidays.index')); ?>" class="waves-effect"><i class="icon-calender"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.holiday"); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array('tickets',$modules)): ?>
            <li><a href="<?php echo e(route('member.tickets.index')); ?>" class="waves-effect"><i class="ti-ticket"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.tickets"); ?> </span></a> </li>
            <?php endif; ?>

            <?php if((in_array('estimates',$modules) && $user->can('view_estimates'))
            || (in_array('invoices',$modules)  && $user->can('view_invoices'))
            || (in_array('payments',$modules) && $user->can('view_payments'))
            || (in_array('expenses',$modules))): ?>
            <li><a href="<?php echo e(route('member.finance.index')); ?>" class="waves-effect"><i class="fa fa-money"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.finance'); ?> <?php if($unreadExpenseCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?> <span class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <?php if(in_array('estimates',$modules)): ?>
                    <?php if($user->can('view_estimates')): ?>
                        <li><a href="<?php echo e(route('member.estimates.index')); ?>"><?php echo app('translator')->get('app.menu.estimates'); ?></a> </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(in_array('invoices',$modules)): ?>
                    <?php if($user->can('view_invoices')): ?>
                        <li><a href="<?php echo e(route('member.all-invoices.index')); ?>"><?php echo app('translator')->get('app.menu.invoices'); ?></a> </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(in_array('payments',$modules)): ?>
                    <?php if($user->can('view_payments')): ?>
                        <li><a href="<?php echo e(route('member.payments.index')); ?>"><?php echo app('translator')->get('app.menu.payments'); ?></a> </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php if(in_array('expenses',$modules)): ?>
                        <li><a href="<?php echo e(route('member.expenses.index')); ?>"><?php echo app('translator')->get('app.menu.expenses'); ?> <?php if($unreadExpenseCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
                    <?php endif; ?>
                    <?php if(in_array('invoices',$modules)): ?>
                        <?php if($user->can('view_invoices')): ?>
                            <li><a href="<?php echo e(route('member.all-credit-notes.index')); ?>"><?php echo app('translator')->get('app.menu.credit-note'); ?> </a> </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(in_array('messages',$modules)): ?>
            <li><a href="<?php echo e(route('member.user-chat.index')); ?>" class="waves-effect"><i class="icon-envelope"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.messages"); ?> <?php if($unreadMessageCount > 0): ?><span class="label label-rouded label-custom pull-right"><?php echo e($unreadMessageCount); ?></span> <?php endif; ?>
                    </span>
                </a>
            </li>
            <?php endif; ?>

            <?php if(in_array('events',$modules)): ?>
            <li><a href="<?php echo e(route('member.events.index')); ?>" class="waves-effect"><i class="icon-calender"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.Events'); ?></span></a> </li>
            <?php endif; ?>

            <?php if(in_array('leaves',$modules)): ?>
            <li><a href="<?php echo e(route('member.leaves.index')); ?>" class="waves-effect"><i class="icon-logout"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.leaves'); ?></span></a> </li>
            <?php endif; ?>

            <?php if(in_array('notices',$modules)): ?>
                <li><a href="<?php echo e(route('member.notices.index')); ?>" class="waves-effect"><i class="ti-layout-media-overlay"></i> <span class="hide-menu"><?php echo app('translator')->get("app.menu.noticeBoard"); ?> </span></a> </li>
            <?php endif; ?>

            <?php $__currentLoopData = $worksuitePlugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(in_array(strtolower($item), $modules)): ?>
                    <?php if(View::exists(strtolower($item).'::sections.member_left_sidebar')): ?>
                        <?php echo $__env->make(strtolower($item).'::sections.member_left_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
                            <?php if($user->hasRole('admin')): ?>
                                <li>
                                    <a href="<?php echo e(route('admin.dashboard')); ?>">
                                        <i class="fa fa-sign-in"></i>  <?php echo app('translator')->get("app.loginAsAdmin"); ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('member.profile.index')); ?>"><i class="ti-user"></i> <?php echo app('translator')->get("app.menu.profileSettings"); ?></a></li>                            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
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
                                    <?php echo $__env->make('notifications.member.'.\Illuminate\Support\Str::snake(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php /**PATH /home/softwarestore22/public_html/mlm/resources/views/sections/member_left_sidebar.blade.php ENDPATH**/ ?>