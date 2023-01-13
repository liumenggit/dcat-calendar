<?php

namespace liumenggit\Calendar\Http\Controllers;

use Dcat\Admin\Layout\Content;
use Dcat\Admin\Admin;
use Illuminate\Routing\Controller;

class CalendarController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('日历')
            ->description('日历')
            ->body(Admin::view('liumenggit.calendar::index'));
    }
}
