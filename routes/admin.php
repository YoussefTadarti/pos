<?php

use App\Http\Controllers\Admin\Admin_panel_settingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TeasurieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

define("PAGINATION_COUNT", 10);

Route::prefix("admin")->namespace('Admin')->middleware(['auth:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name("admin.index");
    Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');
    Route::get('/adminpanelsetting', [Admin_panel_settingsController::class, 'index'])->name('admin.adminpanelsetting');
    Route::get('/adminpanelsetting/edit', [Admin_panel_settingsController::class, 'edit'])->name('admin.adminpanelsettingEdit');
    Route::post('/adminpanelsetting/update', [Admin_panel_settingsController::class, 'update'])->name('admin.adminpanelsettingUpdate');

    /*-------------- Start Treasuries -------------------*/
    Route::get('/treasuries', [TeasurieController::class, 'index'])->name('admin.treasuries');
    Route::get('/treasuries/create', [TeasurieController::class, 'create'])->name('admin.treasuries.create');
    Route::post('/treasuries/store', [TeasurieController::class, 'store'])->name('admin.treasuries.store');
    Route::get('/treasuries/edit/{id}', [TeasurieController::class, 'edit'])->name('admin.treasuries.edit');
    Route::post('/treasuries/update/{id}', [TeasurieController::class, 'update'])->name('admin.treasuries.update');
    Route::post('/treasuries/ajax_search', [TeasurieController::class, 'ajax_search'])->name('admin.treasuries.ajax_search');
    /*-------------- End Treasuries   -------------------*/
});
Route::prefix("admin")->namespace('Admin')->middleware(['guest:admin'])->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name("admin.show");
    Route::post('/login', [LoginController::class, 'store'])->name('admin.store');
});
