<?php $__env->startPush('head-script'); ?>
<style>
    .fc-event{
        font-size: 10px !important;
    }
    #calendar .fc-view-container .fc-view .fc-more-popover{
        top: 136px !important;
        left: 105px !important;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>


    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <div class="col-md-3 pull-right hidden-xs hidden-sm">
            <?php echo Form::open(['id'=>'createProject','class'=>'ajax-form','method'=>'POST']); ?>

            <div class="btn-group dropdown keep-open pull-right m-l-10">
                <button aria-expanded="true" data-toggle="dropdown"
                        class="btn b-all dropdown-toggle waves-effect waves-light"
                        type="button"><i class="icon-settings"></i>
                </button>
                <ul role="menu" class="dropdown-menu  dropdown-menu-right dashboard-settings">
                    <li class="b-b"><h4><?php echo app('translator')->get('modules.dashboard.dashboardWidgets'); ?></h4></li>

                    <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $wname = \Illuminate\Support\Str::camel($widget->widget_name);
                        ?>
                        <li>
                            <div class="checkbox checkbox-info ">
                                <input id="<?php echo e($widget->widget_name); ?>" name="<?php echo e($widget->widget_name); ?>" value="true"
                                       <?php if($widget->status): ?>
                                       checked
                                       <?php endif; ?>
                                       type="checkbox">
                                <label for="<?php echo e($widget->widget_name); ?>"><?php echo app('translator')->get('modules.dashboard.' . $wname); ?></label>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <li>
                        <button type="button" id="save-form" class="btn btn-success btn-sm btn-block"><?php echo app('translator')->get('app.save'); ?></button>
                    </li>

                </ul>
            </div>
            <?php echo Form::close(); ?>


            <select class="selectpicker language-switcher  pull-right" data-width="fit">
                <option value="en" <?php if($global->locale == "en"): ?> selected <?php endif; ?> data-content='<span class="flag-icon flag-icon-us"></span>'>En</option>
                <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($language->language_code); ?>" <?php if($global->locale == $language->language_code): ?> selected <?php endif; ?>  data-content='<span class="flag-icon <?php if($language->language_code == 'zh-CN'): ?> flag-icon-cn <?php elseif($language->language_code == 'zh-TW'): ?> flag-icon-tw <?php else: ?> flag-icon-<?php echo e($language->language_code); ?> <?php endif; ?>"></span>'><?php echo e($language->language_code); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            </div>

        <!-- .breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        <!-- /.breadcrumb -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/calendar/dist/fullcalendar.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/morrisjs/morris.css')); ?>"><!--Owl carousel CSS -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/owl.carousel/owl.carousel.min.css')); ?>"><!--Owl carousel CSS -->
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/owl.carousel/owl.theme.default.css')); ?>"><!--Owl carousel CSS -->

<style>.col-in {
    padding: 0 20px !important;

}

.fc-event {
    font-size: 10px !important;
}

@media (min-width: 769px) {
    #wrapper .panel-wrapper {
        height: 530px;
        overflow-y: auto;
    }
}

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="white-box">


            <?php if(!is_null($global->licence_expire_on) && $global->status == 'license_expired'): ?>

                <div class="col-md-12 alert alert-danger ">
                    <div class="col-md-6">
                        <h5 class="text-white"><?php echo app('translator')->get('messages.licenseExpiredNote'); ?></h5>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="<?php echo e(route('admin.billing')); ?>" class="btn btn-success"><?php echo e(__('app.menu.billing')); ?>

                            <i class="fa fa-shopping-cart"></i></a>
                    </div>
                </div>
            <?php endif; ?>
                <?php if($company->package->default == 'yes' || $company->package->default == 'trial'): ?>
                    <?php if($packageSetting && !$packageSetting->all_packages): ?>
                        <div class="col-md-12 alert alert-danger ">
                            <div class="col-md-6">
                                <h5 class="text-white"><?php echo app('translator')->get('messages.purchasePackageMessage'); ?></h5>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo e(route('admin.billing')); ?>"
                                   class="btn btn-success"><?php echo e(__('app.menu.billing')); ?>

                                    <i class="fa fa-shopping-cart"></i></a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>


        <div class="row dashboard-stats front-dashboard">


            <?php if(in_array('clients',$modules)  && in_array('total_clients',$activeWidgets)): ?>
            <div class="col-md-3 col-sm-6">
                <a href="<?php echo e(route('admin.clients.index')); ?>">
                    <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-success-gradient"><i class="icon-user"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalClients'); ?></span><br>
                            <span class="counter"><?php echo e($counts->totalClients); ?></span>
                        </div>
                    </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>

            <?php if(in_array('employees',$modules)  && in_array('total_employees',$activeWidgets)): ?>
            <div class="col-md-3 col-sm-6">
                <a href="<?php echo e(route('admin.employees.index')); ?>">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-xs-3">
                                <div>
                                    <span class="bg-warning-gradient"><i class="icon-people"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-right">
                                <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalEmployees'); ?></span><br>
                                <span class="counter"><?php echo e($counts->totalEmployees); ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>

            <?php if(in_array('projects',$modules)  && in_array('total_projects',$activeWidgets)): ?>
            <div class="col-md-3 col-sm-6">
                <a href="<?php echo e(route('admin.projects.index')); ?>">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-xs-3">
                                <div>
                                    <span class="bg-danger-gradient"><i class="icon-layers"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-right">
                                <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalProjects'); ?></span><br>
                                <span class="counter"><?php echo e($counts->totalProjects); ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>

            <?php if(in_array('invoices',$modules)  && in_array('total_unpaid_invoices',$activeWidgets)): ?>
            <div class="col-md-3 col-sm-6">
                <a href="<?php echo e(route('admin.all-invoices.index')); ?>">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-xs-3">
                                <div>
                                    <span class="bg-inverse-gradient"><i class="ti-receipt"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-right">
                                <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalUnpaidInvoices'); ?></span><br>
                                <span class="counter"><?php echo e($counts->totalUnpaidInvoices); ?></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php if(in_array('tasks',$modules)  && in_array('total_pending_tasks',$activeWidgets)): ?>
                <div class="col-md-3 col-sm-6">
                    <a href="<?php echo e(route('admin.all-tasks.index')); ?>">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div>
                                        <span class="bg-warning-gradient"><i class="ti-alert"></i></span>
                                    </div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalPendingTasks'); ?></span><br>
                                    <span class="counter"><?php echo e($counts->totalPendingTasks); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            <?php if(in_array('timelogs',$modules)  && in_array('total_hours_logged',$activeWidgets)): ?>
                <div class="col-md-3 col-sm-6">
                    <a href="<?php echo e(route('admin.all-time-logs.index')); ?>">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-xs-3">
                                <div>
                                    <span class="bg-info-gradient"><i class="icon-clock"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-right">
                                <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalHoursLogged'); ?></span><br>
                                <span><?php echo e($counts->totalHoursLogged); ?></span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if(in_array('tasks',$modules) && in_array('completed_tasks',$activeWidgets)): ?>
                <div class="col-md-3 col-sm-6">
                    <a href="<?php echo e(route('admin.all-tasks.index')); ?>">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div>
                                        <span class="bg-success-gradient"><i class="ti-check-box"></i></span>
                                    </div>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalCompletedTasks'); ?></span><br>
                                    <span class="counter"><?php echo e($counts->totalCompletedTasks); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if(in_array('attendance',$modules)  && in_array('total_today_attendance',$activeWidgets)): ?>
                <div class="col-md-3 col-sm-6">
                    <a href="<?php echo e(route('admin.attendances.index')); ?>">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-xs-3">
                                <div>
                                    <span class="bg-danger-gradient"><i class="fa fa-percent" style="display: inherit;"></i></span>
                                </div>
                            </div>
                            <div class="col-xs-9 text-right">
                                <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalTodayAttendance'); ?></span><br>
                                <span class="counter"><?php if($counts->totalEmployees > 0): ?><?php echo e(round((($counts->totalTodayAttendance/$counts->totalEmployees)*100), 2)); ?><?php else: ?> 0 <?php endif; ?></span>%
                                <span class="text-muted">(<?php echo e($counts->totalTodayAttendance.'/'.$counts->totalEmployees); ?>)</span>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <!-- .row -->

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <?php if(in_array('tickets',$modules) && in_array('total_resolved_tickets',$activeWidgets)): ?>
                        <div class="col-md-6 col-sm-12 front-dashboard dashboard-stats">
                            <a href="<?php echo e(route('admin.tickets.index')); ?>">
                            <div class="white-box">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div>
                                            <span class="bg-success-gradient"><i class="ti-ticket"></i></span>
                                        </div>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <span class="widget-title"> <?php echo app('translator')->get('modules.tickets.totalResolvedTickets'); ?></span><br>
                                        <span class="counter"><?php echo e(floor($counts->totalResolvedTickets)); ?></span>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if(in_array('tickets',$modules)   && in_array('total_unresolved_tickets',$activeWidgets)): ?>
                        <div class="col-md-6 col-sm-12 front-dashboard dashboard-stats">
                            <a href="<?php echo e(route('admin.tickets.index')); ?>">
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div>
                                                <span class="bg-danger-gradient"><i class="ti-ticket"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <span class="widget-title"> <?php echo app('translator')->get('modules.tickets.totalUnresolvedTickets'); ?></span><br>
                                            <span class="counter"><?php echo e(floor($counts->totalUnResolvedTickets)); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
        <!-- .row -->
        <div class="row">
            <?php if(in_array('payments',$modules)  && in_array('recent_earnings',$activeWidgets)): ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"><?php echo app('translator')->get('modules.dashboard.recentEarnings'); ?></h3>

                            <div id="morris-area-chart" style="height: 190px;"></div>
                            <h6 style="line-height: 2em;"><span class=" label label-danger"><?php echo app('translator')->get('app.note'); ?>:</span> <?php echo app('translator')->get('messages.earningChartNote'); ?> <a href="<?php echo e(route('admin.settings.index')); ?>"><i class="fa fa-arrow-right"></i></a></h6>
                        </div>
                    </div>

                </div>

            </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <?php if(in_array('leaves',$modules)  && in_array('settings_leaves',$activeWidgets)): ?>
            <div class="col-md-6">
                <div class="panel panel-inverse">
                    <div class="panel-heading"><?php echo app('translator')->get('app.menu.leaves'); ?></div>
                    <div class="panel-wrapper collapse in" style="overflow: auto">
                        <div class="panel-body">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if(in_array('tickets',$modules)  && in_array('new_tickets',$activeWidgets)): ?>
            <div class="col-md-6">
                <div class="panel panel-inverse">
                    <div class="panel-heading"><?php echo app('translator')->get('modules.dashboard.newTickets'); ?></div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <ul class="list-task list-group" data-role="tasklist">
                                <?php $__empty_1 = true; $__currentLoopData = $newTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$newTicket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li class="list-group-item" data-role="task">
                                        <?php echo e(($key+1)); ?>. <a href="<?php echo e(route('admin.tickets.edit', $newTicket->id)); ?>" class="text-danger"> <?php echo e(ucfirst($newTicket->subject)); ?></a> <i><?php echo e(ucwords($newTicket->created_at->diffForHumans())); ?></i>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <li class="list-group-item" data-role="task">
                                        <div class="text-center">
                                            <div class="empty-space" style="height: 200px;">
                                                <div class="empty-space-inner">
                                                    <div class="icon" style="font-size:20px"><i
                                                                class="ti-ticket"></i>
                                                    </div>
                                                    <div class="title m-b-15"><?php echo app('translator')->get("messages.noTicketFound"); ?>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <div class="row" >
            <?php if(in_array('tasks',$modules)  && in_array('overdue_tasks',$activeWidgets)): ?>
                <div class="col-md-6">
                    <div class="panel panel-inverse">
                        <div class="panel-heading"><?php echo app('translator')->get('modules.dashboard.overdueTasks'); ?></div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <ul class="list-task list-group" data-role="tasklist">
                                    <li class="list-group-item" data-role="task">
                                        <strong><?php echo app('translator')->get('app.title'); ?></strong> <span
                                                class="pull-right"><strong><?php echo app('translator')->get('modules.dashboard.dueDate'); ?></strong></span>
                                    </li>
                                    <?php $__empty_1 = true; $__currentLoopData = $pendingTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if((!is_null($task->project_id) && !is_null($task->project) ) || is_null($task->project_id)): ?>
                                        <li class="list-group-item row" data-role="task">
                                            <div class="col-xs-9">
                                                <?php echo ($key+1).'. <a href="javascript:;" data-task-id="'.$task->id.'" class="show-task-detail">'.ucfirst($task->heading).'</a>'; ?>

                                                <?php if(!is_null($task->project_id) && !is_null($task->project)): ?>
                                                    <a href="<?php echo e(route('admin.projects.show', $task->project_id)); ?>" class="font-12"><?php echo e(ucwords($task->project->project_name)); ?></a>
                                                <?php endif; ?>
                                            </div>
                                            <label class="label label-danger pull-right col-xs-3"><?php echo e($task->due_date->format($global->date_format)); ?></label>
                                        </li>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <li class="list-group-item" data-role="task">
                                            <?php echo app('translator')->get("messages.noOpenTasks"); ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(in_array('leads',$modules)  && in_array('pending_follow_up',$activeWidgets)): ?>
                <div class="col-md-6">
                    <div class="panel panel-inverse">
                        <div class="panel-heading"><?php echo app('translator')->get('modules.dashboard.pendingFollowUp'); ?></div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <ul class="list-task list-group" data-role="tasklist">
                                    <li class="list-group-item" data-role="task">
                                        <strong><?php echo app('translator')->get('app.title'); ?></strong> <span
                                                class="pull-right"><strong><?php echo app('translator')->get('modules.dashboard.followUpDate'); ?></strong></span>
                                    </li>
                                    <?php $__empty_1 = true; $__currentLoopData = $pendingLeadFollowUps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$follows): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li class="list-group-item row" data-role="task">
                                            <div class="col-xs-9">
                                                <?php echo e(($key+1)); ?>


                                                <a href="<?php echo e(route('admin.leads.show', $follows->lead_id)); ?>" class="text-danger"><?php echo e(ucwords($follows->lead->company_name)); ?></a>

                                            </div>
                                            <label class="label label-danger pull-right col-xs-3"><?php echo e($follows->next_follow_up_date->format($global->date_format)); ?></label>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <li class="list-group-item" data-role="task">
                                            <div class="text-center">
                                                <div class="empty-space" style="height: 200px;">
                                                    <div class="empty-space-inner">
                                                        <div class="icon" style="font-size:20px"><i
                                                                    class="fa fa-user-plus"></i>
                                                        </div>
                                                        <div class="title m-b-15"><?php echo app('translator')->get("messages.noPendingLeadFollowUps"); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>


            <?php if(in_array('projects',$modules)  && in_array('project_activity_timeline',$activeWidgets)): ?>
            <div class="col-md-6" id="project-timeline">
                <div class="panel panel-inverse">
                    <div class="panel-heading"><?php echo app('translator')->get('modules.dashboard.projectActivityTimeline'); ?></div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="steamline">
                                <?php $__currentLoopData = $projectActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="sl-item">
                                        <div class="sl-left"><i class="fa fa-circle text-info"></i>
                                        </div>
                                        <div class="sl-right">
                                            <div><h6><a href="<?php echo e(route('admin.projects.show', $activ->project_id)); ?>" class="font-bold"><?php echo e(ucwords($activ->project->project_name)); ?>:</a> <?php echo e($activ->activity); ?></h6> <span class="sl-date"><?php echo e($activ->created_at->diffForHumans()); ?></span></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if(in_array('employees',$modules)  && in_array('user_activity_timeline',$activeWidgets)): ?>
            <div class="col-md-6">
                <div class="panel panel-inverse">
                    <div class="panel-heading"><?php echo app('translator')->get('modules.dashboard.userActivityTimeline'); ?></div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <div class="steamline">
                                <?php $__empty_1 = true; $__currentLoopData = $userActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="sl-item">
                                        <div class="sl-left">
                                            <img src="<?php echo e($activity->user->image_url); ?>" alt="user" width="30" height="30" class="img-circle">'
                                        </div>
                                        <div class="sl-right">
                                            <div class="m-l-40"><a href="<?php echo e(route('admin.employees.show', $activity->user_id)); ?>" class="text-success"><?php echo e(ucwords($activity->user->name)); ?></a> <span  class="sl-date"><?php echo e($activity->created_at->diffForHumans()); ?></span>
                                                <p><?php echo ucfirst($activity->activity); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(count($userActivities) > ($key+1)): ?>
                                        <hr>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div><?php echo app('translator')->get("messages.noActivityByThisUser"); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>

    
    <div class="modal fade bs-modal-md in" id="eventDetailModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

    
    <div class="modal fade bs-modal-md in"  id="subTaskModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="subTaskModelHeading">Sub Task e</span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->.
    </div>
    

<?php $__env->stopSection(); ?>


<?php $__env->startPush('footer-script'); ?>
<script>
    var taskEvents = [
            <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
            id: '<?php echo e(ucfirst($leave->id)); ?>',
            title: '<?php echo e(ucfirst($leave->user->name)); ?>',
            start: '<?php echo e($leave->leave_date); ?>',
            end:  '<?php echo e($leave->leave_date); ?>',
            className: 'bg-<?php echo e($leave->type->color); ?>'
        },
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
];

    var getEventDetail = function (id) {
        var url = '<?php echo e(route('admin.leaves.show', ':id')); ?>';
        url = url.replace(':id', id);

        $('#modelHeading').html('Event');
        $.ajaxModal('#eventDetailModal', url);
    }

    var calendarLocale = '<?php echo e($global->locale); ?>';
    var firstDay = '<?php echo e($global->week_start); ?>';

    $('.leave-action').click(function () {
        var action = $(this).data('leave-action');
        var leaveId = $(this).data('leave-id');
        var url = '<?php echo e(route("admin.leaves.leaveAction")); ?>';

        $.easyAjax({
            type: 'POST',
            url: url,
            data: { 'action': action, 'leaveId': leaveId, '_token': '<?php echo e(csrf_token()); ?>' },
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        });
    })
</script>


<script src="<?php echo e(asset('plugins/bower_components/raphael/raphael-min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/morrisjs/morris.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/counterup/jquery.counterup.min.js')); ?>"></script>

<!-- jQuery for carousel -->
<script src="<?php echo e(asset('plugins/bower_components/owl.carousel/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/owl.carousel/owl.custom.js')); ?>"></script>

<!--weather icon -->
<script src="<?php echo e(asset('plugins/bower_components/skycons/skycons.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/bower_components/calendar/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/calendar/dist/fullcalendar.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/calendar/dist/jquery.fullcalendar.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/calendar/dist/locale-all.js')); ?>"></script>
<script src="<?php echo e(asset('js/event-calendar.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>

<script>
     <?php if(in_array('payments',$modules)  && in_array('recent_earnings',$activeWidgets)): ?>
        $(document).ready(function () {
            var chartData = <?php echo $chartData; ?>;
            function barChart() {

                Morris.Bar({
                    element: 'morris-area-chart',
                    data: chartData,
                    xkey: 'date',
                    ykeys: ['total'],
                    labels: ['Earning'],
                    pointSize: 3,
                    fillOpacity: 0,
                    barColors: ['#6fbdff'],
                    behaveLikeLine: true,
                    gridLineColor: '#e0e0e0',
                    lineWidth: 2,
                    hideHover: 'auto',
                    lineColors: ['#e20b0b'],
                    resize: true

                });

            }

            <?php if(in_array('payments',$modules)): ?>
            barChart();
            <?php endif; ?>

            $(".counter").counterUp({
                delay: 100,
                time: 1200
            });

            $('.vcarousel').carousel({
                interval: 3000
            })


            var icons = new Skycons({"color": "#ffffff"}),
                    list  = [
                        "clear-day", "clear-night", "partly-cloudy-day",
                        "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
                        "fog"
                    ],
                    i;
            for(i = list.length; i--; ) {
                var weatherType = list[i],
                        elements = document.getElementsByClassName( weatherType );
                for (e = elements.length; e--;){
                    icons.set( elements[e], weatherType );
                }
            }
            icons.play();
        })
    <?php endif; ?>
    $('.show-task-detail').click(function () {
        $(".right-sidebar").slideDown(50).addClass("shw-rside");

        var id = $(this).data('task-id');
        var url = "<?php echo e(route('admin.all-tasks.show',':id')); ?>";
        url = url.replace(':id', id);

        $.easyAjax({
            type: 'GET',
            url: url,
            success: function (response) {
                if (response.status == "success") {
                    $('#right-sidebar-content').html(response.view);
                }
            }
        });
    })

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.dashboard.widget')); ?>',
            container: '#createProject',
            type: "POST",
            redirect: true,
            data: $('#createProject').serialize()
        })
    });

</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/softwarestore22/public_html/mlm/resources/views/admin/dashboard/index.blade.php ENDPATH**/ ?>