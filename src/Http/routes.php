<?php

use liumenggit\Calendar\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('calendar', Controllers\CalendarController::class.'@index');
