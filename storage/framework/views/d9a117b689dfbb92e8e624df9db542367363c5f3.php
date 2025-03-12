<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <span id="timer-section">
                <?php if(!is_null($timer)): ?>
                    <div class="nav navbar-top-links navbar-right pull-right m-t-10">
                        <a class="btn btn-rounded btn-default stop-timer-modal" href="javascript:;" data-timer-id="<?php echo e($timer->id); ?>">
                            <i class="ti-alarm-clock"></i>
                            <span id="active-timer"><?php echo e($timer->timer); ?></span>
                            <label class="label label-danger"><?php echo app('translator')->get("app.stop"); ?></label></a>
                    </div>
                <?php else: ?>
                    <div class="nav navbar-top-links navbar-right pull-right m-t-10">
                        <a class="btn btn-outline btn-inverse timer-modal" href="javascript:;"><?php echo app('translator')->get("modules.timeLogs.startTimer"); ?> <i class="fa fa-check-circle text-success"></i></a>
                    </div>
                <?php endif; ?>
            </span>
            <?php if(isset($activeTimerCount) && $user->can('view_timelogs')): ?>
            <span id="timer-section">
                <div class="nav navbar-top-links navbar-right m-t-10 m-r-10">
                    <a class="btn btn-rounded btn-default active-timer-modal" href="javascript:;"><?php echo app('translator')->get("modules.projects.activeTimers"); ?>
                        <span class="label label-danger" id="activeCurrentTimerCount"><?php if($activeTimerCount > 0): ?> <?php echo e($activeTimerCount); ?> <?php else: ?> 0 <?php endif; ?></span>
                    </a>
                </div>
            </span>
            <?php endif; ?>

            <div class="col-md-3 pull-right hidden-xs hidden-sm">

                <select class="selectpicker language-switcher m-t-10  pull-right" data-width="fit">
                    <option value="en" <?php if($user->locale == "en"): ?> selected <?php endif; ?> data-content='<span class="flag-icon flag-icon-us"></span>'>En</option>
                    <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($language->language_code); ?>"
                                <?php if($user->locale == $language->language_code): ?> selected
                                <?php endif; ?>  data-content='<span class="flag-icon <?php if($language->language_code == 'zh-CN'): ?> flag-icon-cn <?php elseif($language->language_code == 'zh-TW'): ?> flag-icon-tw <?php else: ?> flag-icon-<?php echo e($language->language_code); ?> <?php endif; ?>"></span>'><?php echo e($language->language_code); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
            </div>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
    <style>
        .col-in {
            padding: 0 20px !important;

        }

        .fc-event{
            font-size: 10px !important;
        }

        @media (min-width: 769px) {
            #wrapper .panel-wrapper{
                height: 530px;
                overflow-y: auto;
            }
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<div class="white-box">
    <div class="row dashboard-stats front-dashboard">
        <?php if(in_array('projects',$modules)): ?>
        <div class="col-md-3 col-sm-6">
            <a href="<?php echo e(route('member.projects.index')); ?>">
                <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-info-gradient"><i class="icon-layers"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalProjects'); ?></span><br>
                            <span class="counter"><?php echo e($totalProjects); ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>

        <?php if(in_array('timelogs',$modules)): ?>
        <div class="col-md-3 col-sm-6">
            <a href="<?php echo e(route('member.all-time-logs.index')); ?>">
                <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-warning-gradient"><i class="icon-clock"></i></span>
                            </div>
                        </div>
                        <div class="col-xs-9 text-right">
                            <span class="widget-title"> <?php echo app('translator')->get('modules.dashboard.totalHoursLogged'); ?></span><br>
                            <span class="counter"><?php echo e($counts->totalHoursLogged); ?></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>

        <?php if(in_array('tasks',$modules)): ?>
        <div class="col-md-3 col-sm-6">
            <a href="<?php echo e(route('member.all-tasks.index')); ?>">
                <div class="white-box">
                    <div class="row">
                        <div class="col-xs-3">
                            <div>
                                <span class="bg-danger-gradient"><i class="ti-alert"></i></span>
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

        <div class="col-md-3 col-sm-6">
            <a href="<?php echo e(route('member.all-tasks.index')); ?>">
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

    </div>
    <!-- .row -->

    <div class="row">

        <?php if(in_array('attendance',$modules)): ?>
        <div class="col-md-6">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('app.menu.attendance'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">

                        <input type="hidden" id="current-latitude">
                        <input type="hidden" id="current-longitude">

                        <?php if(!isset($noClockIn)): ?>

                            <?php if(!$checkTodayHoliday): ?>
                                <?php if($todayTotalClockin < $maxAttandenceInDay): ?>
                                    <div class="col-xs-6">
                                        <h3><?php echo app('translator')->get('modules.attendance.clock_in'); ?></h3>
                                    </div>
                                    <div class="col-xs-6">
                                        <h3><?php echo app('translator')->get('modules.attendance.clock_in'); ?> IP</h3>
                                    </div>
                                    <div class="col-xs-6">
                                        <?php if(is_null($currenntClockIn)): ?>
                                            <?php echo e(\Carbon\Carbon::now()->timezone($global->timezone)->format($global->time_format)); ?>

                                        <?php else: ?>
                                            <?php echo e($currenntClockIn->clock_in_time->timezone($global->timezone)->format($global->time_format)); ?>

                                        <?php endif; ?>
                                    </div>
                                    <div class="col-xs-6">
                                        <?php echo e($currenntClockIn->clock_in_ip ?? request()->ip()); ?>

                                    </div>

                                    <?php if(!is_null($currenntClockIn) && !is_null($currenntClockIn->clock_out_time)): ?>
                                        <div class="col-xs-6 m-t-20">
                                            <label for=""><?php echo app('translator')->get('modules.attendance.clock_out'); ?></label>
                                            <br><?php echo e($currenntClockIn->clock_out_time->timezone($global->timezone)->format($global->time_format)); ?>

                                        </div>
                                        <div class="col-xs-6 m-t-20">
                                            <label for=""><?php echo app('translator')->get('modules.attendance.clock_out'); ?> IP</label>
                                            <br><?php echo e($currenntClockIn->clock_out_ip); ?>

                                        </div>
                                    <?php endif; ?>

                                    <div class="col-xs-8 m-t-20">
                                        <label for=""><?php echo app('translator')->get('modules.attendance.working_from'); ?></label>
                                        <?php if(is_null($currenntClockIn)): ?>
                                            <input type="text" class="form-control" id="working_from" name="working_from">
                                        <?php else: ?>
                                            <br> <?php echo e($currenntClockIn->working_from); ?>

                                        <?php endif; ?>
                                    </div>

                                    <div class="col-xs-4 m-t-20">
                                        <label class="m-t-30">&nbsp;</label>
                                        <?php if(is_null($currenntClockIn)): ?>
                                            <button class="btn btn-success btn-sm" id="clock-in"><?php echo app('translator')->get('modules.attendance.clock_in'); ?></button>
                                        <?php endif; ?>
                                        <?php if(!is_null($currenntClockIn) && is_null($currenntClockIn->clock_out_time)): ?>
                                            <button class="btn btn-danger btn-sm" id="clock-out"><?php echo app('translator')->get('modules.attendance.clock_out'); ?></button>
                                        <?php endif; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="col-xs-12">
                                        <div class="alert alert-info"><?php echo app('translator')->get('modules.attendance.maxColckIn'); ?></div>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <div class="col-xs-12">
                                    <div class="alert alert-info alert-dismissable">
                                        <b><?php echo app('translator')->get('modules.dashboard.holidayCheck'); ?> <?php echo e(ucwords($checkTodayHoliday->occassion)); ?>.</b> </div>
                                </div>
                            <?php endif; ?>
                        <?php else: ?>
                            <div class="col-xs-12 text-center">
                                <h4><i class="ti-alert text-danger"></i></h4>
                                <h4><?php echo app('translator')->get('messages.officeTimeOver'); ?></h4>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(in_array('tasks',$modules)): ?>
        <div class="col-md-6">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('modules.dashboard.overdueTasks'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <ul class="list-task list-group" data-role="tasklist">
                            <li class="list-group-item" data-role="task">
                                <strong><?php echo app('translator')->get('app.title'); ?></strong> <span
                                        class="pull-right"><strong><?php echo app('translator')->get('app.dueDate'); ?></strong></span>
                            </li>
                            <?php $__empty_1 = true; $__currentLoopData = $pendingTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if((!is_null($task->project_id) && !is_null($task->project) ) || is_null($task->project_id)): ?>
                                <li class="list-group-item row" data-role="task">
                                    <div class="col-xs-8">
                                        <?php echo ($key+1).'. <a href="javascript:;" data-task-id="'.$task->id.'" class="show-task-detail">'.ucfirst($task->heading).'</a>'; ?>

                                        <?php if(!is_null($task->project_id) && !is_null($task->project)): ?>
                                            <a href="<?php echo e(route('member.projects.show', $task->project_id)); ?>"
                                                class="text-danger"><?php echo e(ucwords($task->project->project_name)); ?></a>
                                        <?php endif; ?>
                                    </div>
                                    <label class="label label-danger pull-right col-xs-4"><?php echo e($task->due_date->format($global->date_format)); ?></label>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li class="list-group-item" data-role="task">
                                    <div  class="text-center">
                                        <div class="empty-space" style="height: 200px;">
                                            <div class="empty-space-inner">
                                                <div class="icon" style="font-size:20px"><i
                                                            class="fa fa-tasks"></i>
                                                </div>
                                                <div class="title m-b-15"><?php echo app('translator')->get("messages.noOpenTasks"); ?>
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

        <?php if(in_array('projects',$modules)): ?>
        <div class="col-md-6" id="project-timeline">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('modules.dashboard.projectActivityTimeline'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="steamline">
                            <?php $__empty_1 = true; $__currentLoopData = $projectActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="sl-item">
                                    <div class="sl-left"><i class="fa fa-circle text-info"></i>
                                    </div>
                                    <div class="sl-right">
                                        <div><h6><a href="<?php echo e(route('member.projects.show', $activity->project_id)); ?>" class="font-bold"><?php echo e(ucwords($activity->project_name)); ?>:</a> <?php echo e($activity->activity); ?></h6> <span class="sl-date"><?php echo e($activity->created_at->timezone($global->timezone)->diffForHumans()); ?></span></div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center">
                                    <div class="empty-space" style="height: 200px;">
                                        <div class="empty-space-inner">
                                            <div class="icon" style="font-size:20px"><i
                                                        class="fa fa-history"></i>
                                            </div>
                                            <div class="title m-b-15"><?php echo app('translator')->get("messages.noProjectActivity"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(in_array('notices',$modules) && $user->can('view_notice')): ?>
        <div class="col-md-6" id="notices-timeline">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('modules.module.noticeBoard'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="steamline">
                            <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="sl-item">
                                    <div class="sl-left"><i class="fa fa-circle text-info"></i>
                                    </div>
                                    <div class="sl-right">
                                        <div>
                                            <h6>
                                                <a href="javascript:showNoticeModal(<?php echo e($notice->id); ?>);" class="text-danger">
                                                    <?php echo e(ucwords($notice->heading)); ?>

                                                </a>
                                            </h6>
                                            <span class="sl-date">
                                                <?php echo e($notice->created_at->timezone($global->timezone)->diffForHumans()); ?>

                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(in_array('employees',$modules)): ?>
        <div class="col-md-6">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('modules.dashboard.userActivityTimeline'); ?></div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="steamline">
                            <?php $__empty_1 = true; $__currentLoopData = $userActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="sl-item">
                                    <div class="sl-left">
                                        <img src="<?php echo e($activity->user->image_url); ?>" alt="user" class="img-circle">'
                                    </div>
                                    <div class="sl-right">
                                        <div class="m-l-40">
                                            <?php if($user->can('view_employees')): ?>
                                                <a href="<?php echo e(route('member.employees.show', $activity->user_id)); ?>" class="text-success"><?php echo e(ucwords($activity->user->name)); ?></a>
                                            <?php else: ?>
                                                <?php echo e(ucwords($activity->user->name)); ?>

                                            <?php endif; ?>
                                            <span  class="sl-date"><?php echo e($activity->created_at->timezone($global->timezone)->diffForHumans()); ?></span>
                                            <p><?php echo ucfirst($activity->activity); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php if(count($userActivities) > ($key+1)): ?>
                                    <hr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center">
                                    <div class="empty-space" style="height: 200px;">
                                        <div class="empty-space-inner">
                                            <div class="icon" style="font-size:20px"><i
                                                        class="fa fa-history"></i>
                                            </div>
                                            <div class="title m-b-15"><?php echo app('translator')->get("messages.noActivityByThisUser"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>



    </div>
</div>


<div class="modal fade bs-modal-lg in" id="projectTimerModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    $('#clock-in').click(function () {
        var workingFrom = $('#working_from').val();

        var currentLatitude = document.getElementById("current-latitude").value;
        var currentLongitude = document.getElementById("current-longitude").value;

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: '<?php echo e(route('member.attendances.store')); ?>',
            type: "POST",
            data: {
                working_from: workingFrom,
                currentLatitude: currentLatitude,
                currentLongitude: currentLongitude,
                _token: token
            },
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    })

    <?php if(!is_null($currenntClockIn)): ?>
    $('#clock-out').click(function () {

        var token = "<?php echo e(csrf_token()); ?>";
        var currentLatitude = document.getElementById("current-latitude").value;
        var currentLongitude = document.getElementById("current-longitude").value;

        $.easyAjax({
            url: '<?php echo e(route('member.attendances.update', $currenntClockIn->id)); ?>',
            type: "PUT",
            data: {
                currentLatitude: currentLatitude,
                currentLongitude: currentLongitude,
                _token: token
            },
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    })
    <?php endif; ?>

    function showNoticeModal(id) {
        var url = '<?php echo e(route('member.notices.show', ':id')); ?>';
        url = url.replace(':id', id);
        $.ajaxModal('#projectTimerModal', url);
    }

    $('.show-task-detail').click(function () {
            $(".right-sidebar").slideDown(50).addClass("shw-rside");

            var id = $(this).data('task-id');
            var url = "<?php echo e(route('member.all-tasks.show',':id')); ?>";
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

    $(function () {
        $('.selectpicker').selectpicker();
    });

    $('.language-switcher').change(function () {
        var lang = $(this).val();
        $.easyAjax({
            url: '<?php echo e(route("member.language.change-language")); ?>',
            data: {'lang': lang},
            success: function (data) {
                if (data.status == 'success') {
                    window.location.reload();
                }
            }
        });
    });

</script>

<?php if($attendanceSettings->radius_check == 'yes'): ?>
<script>
    var currentLatitude = document.getElementById("current-latitude");
    var currentLongitude = document.getElementById("current-longitude");
    var x = document.getElementById("current-latitude");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
           // x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        // x.innerHTML = "Latitude: " + position.coords.latitude +
        // "<br>Longitude: " + position.coords.longitude;

        currentLatitude.value = position.coords.latitude;
        currentLongitude.value = position.coords.longitude;
    }
    getLocation();
</script>
<?php endif; ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.member-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/softwarestore22/public_html/mlm/resources/views/member/dashboard/index.blade.php ENDPATH**/ ?>