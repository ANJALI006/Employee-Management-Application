<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DesignationController;

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

Auth::routes();

Route::controller(HomeController::class)->prefix('/home')->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(DesignationController::class)->middleware(['auth', 'isAdmin'])->prefix('admin/designation')->name('admin.designation.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('list', 'list')->name('list');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::get('destroy/{id}', 'destroy')->name('destroy');
});

Route::controller(EmployeeController::class)->middleware(['auth', 'isAdmin'])->prefix('admin/employee')->name('admin.employee.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('list', 'list')->name('list');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update', 'update')->name('update');
    Route::get('destroy/{id}', 'destroy')->name('destroy');
});
