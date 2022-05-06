<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\CustomerController;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
//     return view('rest.profile');
// })->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile', [RestaurantController::class, 'profile'])->name('profile');

//Route::middleware(['auth:sanctum', 'verified'])->get('/profile/{id}', [RestaurantController::class, 'profile'])->name('profile');

Route::middleware(['auth:sanctum', 'verified'])->get('/message', function () {
    return view('message');
})->name('message');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//worker
Route::middleware(['auth:sanctum', 'verified'])->get('/update/{id}', [RestaurantController::class, 'update']);

Route::middleware(['auth:sanctum', 'verified'])->get('/worker', [RestaurantController::class, 'worker']);

Route::middleware(['auth:sanctum', 'verified'])->get('/call/{id}', [RestaurantController::class, 'call']);

Route::middleware(['auth:sanctum', 'verified'])->get('/remove/{id}', [RestaurantController::class, 'remove']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/worker', function () {
//     return view('rest.worker');
// })->name('worker');

Route::view('/reservation', 'rest.reservation');

Route::POST('/save', [RestaurantController::class, 'save']);

//admin
Route::middleware(['auth:sanctum', 'verified'])->get('/pending', [AdminController::class, 'pending'])->name('pending');

Route::middleware(['auth:sanctum', 'verified'])->get('/users', [AdminController::class, 'list'])->name('users');

Route::middleware(['auth:sanctum', 'verified'])->get('/profile/{id}', [AdminController::class, 'profile']);

Route::middleware(['auth:sanctum', 'verified'])->get('/delete/{id}', [AdminController::class, 'delete']);

Route::middleware(['auth:sanctum', 'verified'])->get('/accept/{id}', [AdminController::class, 'accept']);

//cust
//Route::view('queue/{id}', 'cust.queue'); //rest id, data calculation call rest table for the table data calculate time then display 
Route::get('/queue/{id}', [CustomerController::class, 'queueID'])->name('queue');

//Route::view('queue/{id}/form', 'cust.form'); //controller send id of the qr?
Route::get('/queue/{id}/form', [CustomerController::class, 'queueForm']);

Route::POST('/queue/{id}/save', [CustomerController::class, 'save']);

Route::get('/queue/{id}/{custid}', [CustomerController::class, 'queueCust'])->name('cust.queue');

