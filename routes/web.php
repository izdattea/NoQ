<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;

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

//redirect
Route::get('/redirect', [Controller::class, 'redirectFx']);

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
    return view('rest.profile');
})->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/message', function () {
    return view('message');
})->name('message');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//worker
Route::middleware(['auth:sanctum', 'verified'])->get('/update', [RestaurantController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/worker', function () {
    return view('rest.worker');
})->name('worker');

Route::view('/reservation', 'rest.reservation');

//admin
Route::middleware(['auth:sanctum', 'verified'])->get('/pending', [AdminController::class, 'pending'])->name('pending');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', [AdminController::class, 'list'])->name('users');

Route::middleware(['auth:sanctum', 'verified'])->get('/delete/{id}', [AdminController::class, 'delete']);

Route::middleware(['auth:sanctum', 'verified'])->get('/accept/{id}', [AdminController::class, 'accept']);
