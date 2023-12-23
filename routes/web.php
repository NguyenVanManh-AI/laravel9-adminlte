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
    Route::view('/iframe', 'admin.pages.iframe');

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

    Route::prefix('/forms')->group(function () {
        Route::view('/advanced', 'admin.pages.forms.advanced');
        Route::view('/editors', 'admin.pages.forms.editors');
        Route::view('/general', 'admin.pages.forms.general');
        Route::view('/validation', 'admin.pages.forms.validation');
    });

    Route::prefix('/tables')->group(function () {
        Route::view('/data', 'admin.pages.tables.data');
        Route::view('/jsgrid', 'admin.pages.tables.jsgrid');
        Route::view('/simple', 'admin.pages.tables.simple');
    });

    Route::prefix('/mailbox')->group(function () {
        Route::view('/compose', 'admin.pages.mailbox.compose');
        Route::view('/mailbox', 'admin.pages.mailbox.mailbox');
        Route::view('/read-mail', 'admin.pages.mailbox.read-mail');
    });

    Route::prefix('/examples')->group(function () {
        Route::view('/404', 'admin.pages.examples.404');
        Route::view('/500', 'admin.pages.examples.500');
        Route::view('/blank', 'admin.pages.examples.blank');
        Route::view('/contact-us', 'admin.pages.examples.contact-us');
        Route::view('/contacts', 'admin.pages.examples.contacts');
        Route::view('/e-commerce', 'admin.pages.examples.e-commerce');
        Route::view('/faq', 'admin.pages.examples.faq');
        Route::view('/forgot-password-v2', 'admin.pages.examples.forgot-password-v2');
        Route::view('/forgot-password', 'admin.pages.examples.forgot-password');
        Route::view('/invoice-print', 'admin.pages.examples.invoice-print');
        Route::view('/invoice', 'admin.pages.examples.invoice');
        Route::view('/language-menu', 'admin.pages.examples.language-menu');
        Route::view('/legacy-user-menu', 'admin.pages.examples.legacy-user-menu');
        Route::view('/lockscreen', 'admin.pages.examples.lockscreen');
        Route::view('/login-v2', 'admin.pages.examples.login-v2');
        Route::view('/login', 'admin.pages.examples.login');
        Route::view('/pace', 'admin.pages.examples.pace');
        Route::view('/profile', 'admin.pages.examples.profile');
        Route::view('/project-add', 'admin.pages.examples.project-add');
        Route::view('/project-detail', 'admin.pages.examples.project-detail');
        Route::view('/project-edit', 'admin.pages.examples.project-edit');
        Route::view('/projects', 'admin.pages.examples.projects');
        Route::view('/recover-password-v2', 'admin.pages.examples.recover-password-v2');
        Route::view('/recover-password', 'admin.pages.examples.recover-password');
        Route::view('/register-v2', 'admin.pages.examples.register-v2');
        Route::view('/register', 'admin.pages.examples.register');
    });

    Route::prefix('/search')->group(function () {
        Route::view('/enhanced-results', 'admin.pages.search.enhanced-results');
        Route::view('/enhanced', 'admin.pages.search.enhanced');
        Route::view('/simple-results', 'admin.pages.search.simple-results');
        Route::view('/simple', 'admin.pages.search.simple');
    });

    // });
});
