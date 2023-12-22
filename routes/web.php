<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->group(function () {
    // Route::middleware(['auth:admin_api,user_api', 'role:admin,superadmin,manager,doctor,hospital'])->group(function () {
        Route::view('/calendar', 'admin.pages.calendar');
        Route::view('/gallery', 'admin.pages.gallery');
        Route::view('/kanban', 'admin.pages.kanban');
        Route::view('/overview', 'admin.pages.overview');
        Route::view('/widgets', 'admin.pages.widgets');

        Route::prefix('/charts')->group(function () {
            Route::view('/chartjs', 'admin.pages.charts.chartjs');
            Route::view('/flot', 'admin.pages.charts.flot');
            Route::view('/inline', 'admin.pages.charts.inline');
            Route::view('/uplot', 'admin.pages.charts.uplot');
        });
        Route::prefix('/ui')->group(function () {
            Route::view('/buttons', 'admin.pages.ui.buttons');
            Route::view('/general', 'admin.pages.ui.general');
            Route::view('/icons', 'admin.pages.ui.icons');
            Route::view('/modals', 'admin.pages.ui.modals');
            Route::view('/navbar', 'admin.pages.ui.navbar');
            Route::view('/ribbons', 'admin.pages.ui.ribbons');
            Route::view('/sliders', 'admin.pages.ui.sliders');
            Route::view('/timeline', 'admin.pages.ui.timeline');
        });
    // });
});

