<head>
    <link rel="stylesheet" href="{{ admin_asset("vendor/dcat-admin-extensions/liumenggit/calendar/css/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("vendor/dcat-admin-extensions/liumenggit/calendar/css/tui-time-picker.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("vendor/dcat-admin-extensions/liumenggit/calendar/css/tui-date-picker.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("vendor/dcat-admin-extensions/liumenggit/calendar/css/tui-calendar.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("vendor/dcat-admin-extensions/liumenggit/calendar/css/default.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("vendor/dcat-admin-extensions/liumenggit/calendar/css/icons.css") }}">
</head>

<div id="cale">
    <div id="lnb">
        <div class="lnb-new-schedule">
            <button id="btn-new-schedule" type="button" class="btn btn-default btn-block lnb-new-schedule-btn"
                    data-toggle="modal">
                新事件
            </button>
        </div>
        <div id="lnb-calendars" class="lnb-calendars">
            <div>
                <div class="lnb-calendars-item">
                    <label>
                        <input class="tui-full-calendar-checkbox-square" type="checkbox" value="all" checked>
                        <span></span>
                        <strong>查看所有</strong>
                    </label>
                </div>
            </div>
            <div id="calendarList" class="lnb-calendars-d1">
            </div>
            <button id="btn-new-event" type="button" class="btn btn-default btn-block lnb-new-schedule-btn"
                    data-toggle="modal">
                添加事件
            </button>
        </div>
    </div>
    <div id="right">
        <div id="menu">
            <span class="dropdown">
                <button id="dropdownMenu-calendarType" class="btn btn-default  dropdown-toggle" type="button"
                        data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="true">
                    <i id="calendarTypeIcon" class="calendar-icon ic_view_month" style="margin-right: 4px;"></i>
                    <span id="calendarTypeName">Dropdown</span>&nbsp;
{{--                    <i class="calendar-icon tui-full-calendar-dropdown-arrow"/>--}}
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu-calendarType">
                    <li role="presentation">
                        <a class="dropdown-menu-title" role="menuitem" data-action="toggle-daily">
                            <i class="calendar-icon ic_view_day"></i>今天
                        </a>
                    </li>
                    <li role="presentation">
                        <a class="dropdown-menu-title" role="menuitem" data-action="toggle-weekly">
                            <i class="calendar-icon ic_view_week"></i>每周
                        </a>
                    </li>
                    <li role="presentation">
                        <a class="dropdown-menu-title" role="menuitem" data-action="toggle-monthly">
                            <i class="calendar-icon ic_view_month"></i>每月
                        </a>
                    </li>
                    <li role="presentation">
                        <a class="dropdown-menu-title" role="menuitem" data-action="toggle-weeks2">
                            <i class="calendar-icon ic_view_week"></i>2 周
                        </a>
                    </li>
                    <li role="presentation">
                        <a class="dropdown-menu-title" role="menuitem" data-action="toggle-weeks3">
                            <i class="calendar-icon ic_view_week"></i>3 周
                        </a>
                    </li>
                    <li role="presentation" class="dropdown-divider"></li>
                    <li role="presentation">
                        <a role="menuitem" data-action="toggle-workweek">
                            <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-workweek"
                                   checked>
                            <span class="checkbox-title"></span>显示周末
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" data-action="toggle-start-day-1">
                            <input type="checkbox" class="tui-full-calendar-checkbox-square" value="toggle-start-day-1">
                            <span class="checkbox-title"></span>一周开始于周一
                        </a>
                    </li>
                    <li role="presentation">
                        <a role="menuitem" data-action="toggle-narrow-weekend">
                            <input type="checkbox" class="tui-full-calendar-checkbox-square"
                                   value="toggle-narrow-weekend">
                            <span class="checkbox-title"></span>窄视图
                        </a>
                    </li>
                </ul>
            </span>
            <span id="menu-navi">
{{--                <button type="button" class="btn btn-default  move-today" data-action="move-today">Today</button>--}}
                <button type="button" class="btn btn-default  move-day" data-action="move-prev">
                    <i class="calendar-icon ic-arrow-line-left" data-action="move-prev"></i>
                </button>
                <button type="button" class="btn btn-default  move-day" data-action="move-next">
                    <i class="calendar-icon ic-arrow-line-right" data-action="move-next"></i>
                </button>
            </span>
            <span id="renderRange" class="render-range"></span>
        </div>
        <div id="calendar"></div>
    </div>
</div>
<style>
    .extension-demo {
        color: @primary;
    }
</style>
<script src="{{ admin_asset('vendor/dcat-admin-extensions/liumenggit/calendar/js/tui-code-snippet.min.js')}}"></script>
<script src="{{ admin_asset('vendor/dcat-admin-extensions/liumenggit/calendar/js/tui-time-picker.min.js')}}"></script>
<script src="{{ admin_asset('vendor/dcat-admin-extensions/liumenggit/calendar/js/tui-date-picker.min.js')}}"></script>
<script src="{{ admin_asset('vendor/dcat-admin-extensions/liumenggit/calendar/js/moment.min.js')}}"></script>
<script src="{{ admin_asset('vendor/dcat-admin-extensions/liumenggit/calendar/js/chance.min.js')}}"></script>
<script src="{{ admin_asset('vendor/dcat-admin-extensions/liumenggit/calendar/js/tui-calendar.js')}}"></script>
<script src="{{ admin_asset('vendor/dcat-admin-extensions/liumenggit/calendar/js/calendars.js')}}"></script>
<script src="{{ admin_asset('vendor/dcat-admin-extensions/liumenggit/calendar/js/schedules.js')}}"></script>
<script src="{{ admin_asset('vendor/dcat-admin-extensions/liumenggit/calendar/js/app.js')}}"></script>
<script>
    Dcat.ready(function () {
        $('#btn-new-event').on('click', createNewEvent);

        function createNewEvent(event) {
            console.log('createNewEvent')
            let calendar = new CalendarInfo();
            calendar.id = String(8);
            calendar.name = 'tetetet';
            calendar.color = '#ffffff';
            calendar.bgColor = '#ff4040';
            calendar.dragBgColor = '#ff4040';
            calendar.borderColor = '#ff4040';
            console.log(calendar)
            addCalendar(calendar);
            $('#calendarList').append('<div class="lnb-calendars-item" style="display: flex;justify-content: space-between;"><label>' + '<input type="checkbox" class="tui-full-calendar-checkbox-round" value="' + calendar.id + '" checked>' + '<span style="border-color: ' + calendar.borderColor + '; background-color: ' + calendar.borderColor + ';"></span>' + '<span>' + calendar.name + '</span>' + '</label><i class="calendar-icon ic-arrow-line-right" data-action="move-next"></i></div>');
            console.log($('#calendarList'))
            // calendarList.innerHTML = html.join('\n');
        }
    });
</script>
