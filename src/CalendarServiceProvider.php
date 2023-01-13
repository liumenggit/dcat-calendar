<?php

namespace liumenggit\Calendar;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;

class CalendarServiceProvider extends ServiceProvider
{
    protected $js = [
        'js/index.js',
        'js/tui-code-snippet.min.js',
        'js/tui-time-picker.min.js',
        'js/tui-date-picker.min.js',
        'js/moment.min.js',
        'js/chance.min.js',
        'js/tui-calendar.js',
        'js/calendars.js',
        'js/schedules.js',
        'js/app.js',
    ];
    protected $css = [
        'css/index.css',
        'css/tui-time-picker.css',
        'css/tui-date-picker.css',
        'css/tui-calendar.css',
        'css/default.css',
        'css/icons.css',
        'css/bootstrap.min.css',
    ];
    protected $img = [
        'images/ic-arrow-line-left.png',
        'images/ic-view-day.png',
        'images/ic-view-week@2x.png',
        'images/ic-arrow-line-left@2x.png',
        'images/ic-view-day@2x.png',
        'images/ic-view-week@3x.png',
        'images/ic-arrow-line-left@3x.png',
        'images/ic-view-day@3x.png',
        'images/icon.png',
        'images/ic-arrow-line-right.png',
        'images/ic-view-month.png',
        'images/img-bi.png',
        'images/ic-arrow-line-right@2x.png',
        'images/ic-view-month@2x.png',
        'images/img-bi@2x.png',
        'images/ic-arrow-line-right@3x.png',
        'images/ic-view-month@3x.png',
        'images/img-bi@3x.png',
        'images/ic-traveltime-w.png',
        'images/ic-view-week.png',

    ];

    protected $fonts = [
        'fonts/icon.ttf',
        'fonts/icon.woff'
    ];

    public function register()
    {
        //
    }

    public function init()
    {
        parent::init();
//        Admin::requireAssets('@liumenggit.calendar');

        //

    }

    protected $menu = [
        [
            'title' => '日历',
            'uri'   => 'calendar',
            'icon'  => '', // 图标可以留空
        ],
    ];

//    protected $middleware = [
//        'middle' => [ // 注册中间件
//            LogOperation::class,
//        ],
//    ];

//    public function settingForm()
//    {
//        return new Setting($this);
//    }
}
