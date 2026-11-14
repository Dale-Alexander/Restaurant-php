<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [User\HomeController::class, 'index'])->name('index');
Route::get('/menu', [User\MenuItemController::class, 'index'])->name('menu.index');
Route::resource('reservations', User\ReservationController::class)->only('index', 'store', 'create');

Route::prefix('admin')->name('admin.')->group(function(){
Route::get('/', Admin\DashboardController::class, 'index')->name('index');
Route::resource('items', Admin\MenuItemController::class);
Route::resource('orders', Admin\OrderController::class);
Route::resource('reservations', Admin\ReservationController::class);
});
