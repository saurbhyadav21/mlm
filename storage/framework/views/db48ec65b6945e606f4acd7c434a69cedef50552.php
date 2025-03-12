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
                    <option value="en" <?php if($global->locale == "en"): ?> selected <?php endif; ?> data-content='<span class="flag-icon flag-icon-us"></span> En'>En</option>
                    <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($language->language_code); ?>" <?php if($global->locale == $language->language_code): ?> selected <?php endif; ?>  data-content='<span class="flag-icon flag-icon-<?php echo e($language->language_code); ?>"></span> <?php echo e($language->language_code); ?>'><?php echo e($language->language_code); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </li>

            <!-- .Task dropdown -->
            <li class="dropdown" id="top-notification-dropdown">
                <a class="dropdown-toggle waves-effect waves-light show-user-notifications" data-toggle="dropdown" href="#">
                    <i class="icon-bell"></i>
                    <?php if($unreadNotificationCount > 0): ?>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    <?php endif; ?>
                </a>
                <ul class="dropdown-menu  dropdown-menu-right mailbox animated slideInDown">
                    <li>
                        <a href="javascript:;">...</a>
                    </li>

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
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                            </span> </div>
                <!-- /input-group -->
            </li>

            <li class="user-pro hidden-sm hidden-md hidden-lg">
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
                    <li>
                        <a href="<?php echo e(route('member.dashboard')); ?>">
                            <i class="fa fa-sign-in"></i> <?php echo app('translator')->get('app.loginAsEmployee'); ?>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                        ><i class="fa fa-power-off"></i> <?php echo app('translator')->get('app.logout'); ?></a>

                    </li>
                </ul>
            </li>

            <li><a href="<?php echo e(route('admin.dashboard')); ?>" class="waves-effect"><i class="icon-speedometer"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.dashboard'); ?> </span></a> </li>

            <?php if(in_array('clients',$modules) || in_array('leads',$modules)): ?>
                <li><a href="<?php echo e(route('admin.clients.index')); ?>" class="waves-effect"><i class="icon-people"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.customers'); ?> <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <?php if(in_array('clients',$modules)): ?>
                            <li><a href="<?php echo e(route('admin.clients.index')); ?>" class="waves-effect"><?php echo app('translator')->get('app.menu.clients'); ?></a> </li>
                        <?php endif; ?>
                        <?php if(in_array('leads',$modules)): ?>
                            <li><a href="<?php echo e(route('admin.leads.index')); ?>" class="waves-effect"><?php echo app('translator')->get('app.menu.lead'); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(in_array('employees', $modules) || in_array('attendance', $modules) || in_array('holidays', $modules) || in_array('leaves', $modules)): ?>
                <li><a href="<?php echo e(route('admin.employees.index')); ?>" class="waves-effect"><i class="ti-user"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.hr'); ?> <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <?php if(in_array('employees',$modules)): ?>
                            <li><a href="<?php echo e(route('admin.employees.index')); ?>"><?php echo app('translator')->get('app.menu.employeeList'); ?></a></li>
                            <li><a href="<?php echo e(route('admin.teams.index')); ?>"><?php echo app('translator')->get('app.department'); ?></a></li>
                            <li><a href="<?php echo e(route('admin.designations.index')); ?>"><?php echo app('translator')->get('app.menu.designation'); ?></a></li>
                        <?php endif; ?>
                        <?php if(in_array('attendance',$modules)): ?>
                            <li><a href="<?php echo e(route('admin.attendances.summary')); ?>" class="waves-effect"><?php echo app('translator')->get('app.menu.attendance'); ?></a> </li>
                        <?php endif; ?>
                        <?php if(in_array('holidays',$modules)): ?>
                            <li><a href="<?php echo e(route('admin.holidays.index')); ?>" class="waves-effect"><?php echo app('translator')->get('app.menu.holiday'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(in_array('leaves',$modules)): ?>
                            <li><a href="<?php echo e(route('admin.leaves.pending')); ?>" class="waves-effect"><?php echo app('translator')->get('app.menu.leaves'); ?></a> </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(in_array('projects', $modules) || in_array('tasks', $modules) || in_array('timelogs', $modules) || in_array('contracts', $modules)): ?>
                <li><a href="<?php echo e(route('admin.task.index')); ?>" class="waves-effect"><i class="icon-layers"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.work'); ?> <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <?php if(in_array('contracts', $modules)): ?>
                            <li><a href="<?php echo e(route('admin.contracts.index')); ?>" class="waves-effect"><?php echo app('translator')->get('app.menu.contracts'); ?></a></li>
                        <?php endif; ?>
                        <?php if(in_array('projects',$modules)): ?>
                            <li><a href="<?php echo e(route('admin.projects.index')); ?>" class="waves-effect"><?php echo app('translator')->get('app.menu.projects'); ?> </a> </li>
                        <?php endif; ?>
                        <?php if(in_array('tasks',$modules)): ?>
                            <li><a href="<?php echo e(route('admin.all-tasks.index')); ?>"><?php echo app('translator')->get('app.menu.tasks'); ?></a></li>
                            <li class="hidden-sm hidden-xs"><a href="<?php echo e(route('admin.taskboard.index')); ?>"><?php echo app('translator')->get('modules.tasks.taskBoard'); ?></a></li>
                            <li><a href="<?php echo e(route('admin.task-calendar.index')); ?>"><?php echo app('translator')->get('app.menu.taskCalendar'); ?></a></li>
                        <?php endif; ?>
                        <?php if(in_array('timelogs',$modules)): ?>
                            <li><a href="<?php echo e(route('admin.all-time-logs.index')); ?>" class="waves-effect"><?php echo app('translator')->get('app.menu.timeLogs'); ?></a> </li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

            <?php if((in_array("estimates", $modules)  || in_array("invoices", $modules)  || in_array("payments", $modules) || in_array("expenses", $modules)  )): ?>
                <li><a href="<?php echo e(route('admin.finance.index')); ?>" class="waves-effect"><i class="fa fa-money"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.finance'); ?> <?php if($unreadExpenseCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?> <span class="fa arrow"></span> </span></a>
                    <ul class="nav nav-second-level">
                        <?php if(in_array("estimates", $modules)): ?>
                            <li><a href="<?php echo e(route('admin.estimates.index')); ?>"><?php echo app('translator')->get('app.menu.estimates'); ?></a> </li>
                        <?php endif; ?>

                        <?php if(in_array("invoices", $modules)): ?>
                            <li><a href="<?php echo e(route('admin.all-invoices.index')); ?>"><?php echo app('translator')->get('app.menu.invoices'); ?></a> </li>
                        <?php endif; ?>

                        <?php if(in_array("payments", $modules)): ?>
                            <li><a href="<?php echo e(route('admin.payments.index')); ?>"><?php echo app('translator')->get('app.menu.payments'); ?></a> </li>
                        <?php endif; ?>

                        <?php if(in_array("expenses", $modules)): ?>
                            <li><a href="<?php echo e(route('admin.expenses.index')); ?>"><?php echo app('translator')->get('app.menu.expenses'); ?> <?php if($unreadExpenseCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
                        <?php endif; ?>

                        <?php if(in_array("invoices", $modules)): ?>
                            <li><a href="<?php echo e(route('admin.all-credit-notes.index')); ?>"><?php echo app('translator')->get('app.menu.credit-note'); ?></a> </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <?php if(in_array("products", $modules)): ?>
                <li><a href="<?php echo e(route('admin.products.index')); ?>" class="waves-effect"><i class="icon-basket"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.products'); ?> </span></a> </li>
            <?php endif; ?>

            <?php if(in_array("tickets", $modules)): ?>
                <li><a href="<?php echo e(route('admin.tickets.index')); ?>" class="waves-effect"><i class="ti-ticket"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.tickets'); ?></span> <?php if($unreadTicketCount > 0): ?> <div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></a> </li>
            <?php endif; ?>


            <?php if(in_array("messages", $modules)): ?>
                <li><a href="<?php echo e(route('admin.user-chat.index')); ?>" class="waves-effect"><i class="icon-envelope"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.messages'); ?> <?php if($unreadMessageCount > 0): ?><span class="label label-rouded label-custom pull-right"><?php echo e($unreadMessageCount); ?></span> <?php endif; ?></span></a> </li>
            <?php endif; ?>

            <?php if(in_array("events", $modules)): ?>
                <li><a href="<?php echo e(route('admin.events.index')); ?>" class="waves-effect"><i class="icon-calender"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.Events'); ?></span></a> </li>
            <?php endif; ?>

            <?php if(in_array("notices", $modules)): ?>
                <li><a href="<?php echo e(route('admin.notices.index')); ?>" class="waves-effect"><i class="ti-layout-media-overlay"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.noticeBoard'); ?> </span></a> </li>
            <?php endif; ?>
            <?php if(in_array("reports", $modules)): ?>
            <li><a href="<?php echo e(route('admin.reports.index')); ?>" class="waves-effect"><i class="ti-pie-chart"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.reports'); ?> <span class="fa arrow"></span> </span></a>
                <ul class="nav nav-second-level">
                    <li><a href="<?php echo e(route('admin.task-report.index')); ?>"><?php echo app('translator')->get('app.menu.taskReport'); ?></a></li>
                    <li><a href="<?php echo e(route('admin.time-log-report.index')); ?>"><?php echo app('translator')->get('app.menu.timeLogReport'); ?></a></li>
                    <li><a href="<?php echo e(route('admin.finance-report.index')); ?>"><?php echo app('translator')->get('app.menu.financeReport'); ?></a></li>
                    <li><a href="<?php echo e(route('admin.income-expense-report.index')); ?>"><?php echo app('translator')->get('app.menu.incomeVsExpenseReport'); ?></a></li>
                    <li><a href="<?php echo e(route('admin.leave-report.index')); ?>"><?php echo app('translator')->get('app.menu.leaveReport'); ?></a></li>
                    <li><a href="<?php echo e(route('admin.attendance-report.index')); ?>"><?php echo app('translator')->get('app.menu.attendanceReport'); ?></a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if (\Entrust::hasRole('admin')) : ?>
            <li><a href="<?php echo e(route('admin.billing')); ?>" class="waves-effect"><i class="icon-book-open"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.billing'); ?></span></a>
            </li>
            <?php endif; // Entrust::hasRole ?>

            <?php $__currentLoopData = $worksuitePlugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(in_array(strtolower($item), $modules)): ?>
                    <?php if(View::exists(strtolower($item).'::sections.left_sidebar')): ?>
                        <?php echo $__env->make(strtolower($item).'::sections.left_sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <li><a href="<?php echo e(route('admin.faqs.index')); ?>" class="waves-effect"><i class="icon-docs"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.faq'); ?></span></a></li>
            <li><a href="<?php echo e(route('admin.settings.index')); ?>" class="waves-effect"><i class="ti-settings"></i> <span class="hide-menu"> <?php echo app('translator')->get('app.menu.settings'); ?></span></a>
            </li>

        </ul>

        <div class="menu-footer">
            <div class="menu-user row">
                <div class="col-lg-4 m-b-5">
                    <div class="btn-group dropup user-dropdown">

                            <img aria-expanded="false" data-toggle="dropdown" src="<?php echo e($user->image_url); ?>" alt="user-img" class="img-circle dropdown-toggle h-30 w-30">
                        <ul role="menu" class="dropdown-menu">
                            <li><a class="bg-inverse"><strong class="text-info"><?php echo e(ucwords($user->name)); ?></strong></a></li>
                            <li>
                                <a href="<?php echo e(route('member.dashboard')); ?>">
                                    <i class="fa fa-sign-in"></i> <?php echo app('translator')->get('app.loginAsEmployee'); ?>
                                </a>
                            </li>
                            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"
                                ><i class="fa fa-power-off"></i> <?php echo app('translator')->get('app.logout'); ?></a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 text-center  m-b-5">
                    <div class="btn-group dropup shortcut-dropdown">
                        <a class="dropdown-toggle waves-effect waves-light text-uppercase" data-toggle="dropdown" href="#">
                            <i class="fa fa-plus"></i>
                        </a>
                        <ul class="dropdown-menu">

                            <?php if(in_array('projects',$modules)): ?>
                            <li class="top-notifications">
                                <div class="message-center">
                                    <a href="<?php echo e(route('admin.projects.create')); ?>">
                                        <div class="mail-contnet">
                                            <span class="mail-desc m-0"><?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('app.project'); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if(in_array('tasks',$modules)): ?>
                            <li class="top-notifications">
                                <div class="message-center">
                                    <a href="<?php echo e(route('admin.all-tasks.create')); ?>">
                                        <div class="mail-contnet">
                                            <span class="mail-desc m-0"><?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('app.task'); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if(in_array('clients',$modules)): ?>
                            <li class="top-notifications">
                                <div class="message-center">
                                    <a href="<?php echo e(route('admin.clients.create')); ?>">
                                        <div class="mail-contnet">
                                            <span class="mail-desc m-0"><?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('app.client'); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if(in_array('employees',$modules)): ?>
                            <li class="top-notifications">
                                <div class="message-center">
                                    <a href="<?php echo e(route('admin.employees.create')); ?>">
                                        <div class="mail-contnet">
                                            <span class="mail-desc m-0"><?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('app.employee'); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if(in_array('payments',$modules)): ?>
                            <li class="top-notifications">
                                <div class="message-center">
                                    <a href="<?php echo e(route('admin.payments.create')); ?>">
                                        <div class="mail-contnet">
                                            <span class="mail-desc m-0"><?php echo app('translator')->get('modules.payments.addPayment'); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <?php endif; ?>

                            <?php if(in_array('tickets',$modules)): ?>
                            <li class="top-notifications">
                                <div class="message-center">
                                    <a href="<?php echo e(route('admin.tickets.create')); ?>">
                                        <div class="mail-contnet">
                                            <span class="mail-desc m-0"><?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('modules.tickets.ticket'); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 text-center m-b-5">
                    <div class="btn-group dropup notification-dropdown">
                        <a class="dropdown-toggle show-user-notifications" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>
                            <?php if($unreadNotificationCount > 0): ?>

                                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu mailbox ">
                            <li>
                                <a href="javascript:;">...</a>
                            </li>
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

<?php /**PATH /home/softwarestore22/public_html/mlm/resources/views/sections/left_sidebar.blade.php ENDPATH**/ ?>