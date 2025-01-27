<?php

use App\Http\Controllers\MeasurementController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::view('/authorization', 'User.auth')->name('auth');
Route::post('/authorization', [UserController::class, 'auth_post']);

Route::get('/create_order', [OrderController::class,'showStatus'])->name('show_status');
Route::post('/create_order', [OrderController::class,'Create_order'])->name('create_order');
Route::get('/list_order', [OrderController::class, 'OrderView'])->name('list_order');
Route::view('/list_order_full', 'Orders.list_order_full')->name('list_order_full');

Route::get('/create_user', [userController::class,'showForm'])->name('show');
Route::post('/create_user', [userController::class,'registr_post'])->name('create_user');
Route::get('/list_user', [userController::class, 'UserView'])->name('list_user');
Route::post('/list_user/delete/{user}', [userController::class, 'delete_user'])->name('delete');

Route::get('/measurement',[MeasurementController::class, 'MeasurementView'] )->name('measurement');
Route::post('/measurement',[MeasurementController::class, 'create_measurement'] )->name('measurement_create');

Route::get('/specification',[SpecificationController::class, 'SpecificationView'] )->name('specification');
Route::post('/specification',[SpecificationController::class, 'create_specification'] )->name('specification_create');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [userController::class, 'logout'])->name('logout');
});
