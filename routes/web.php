<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//  HomeController;

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
    return redirect("home");
    // return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
// Route::middleware(['auth', 'user-access:user'])->group(function () {
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
// });

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Route::get('/admin/home', [AuthHomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Manager Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Route::get('/manager/home', [AuthHomeController::class, 'managerHome'])->name('manager.home');
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

// Documentation link:
// https://codeanddeploy.com/blog/laravel/laravel-8-logout-for-your-authenticated-user

Route::middleware(['auth'])->group(function () {
    /**
     * Logout Route
     */
    Route::post('/logout', [LogoutController::class, 'perform'])->name('logout');
});
