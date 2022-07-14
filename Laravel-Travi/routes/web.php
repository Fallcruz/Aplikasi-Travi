<?php

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TourPackageController;
use App\Http\Controllers\EventFestivalController;
use App\Http\Controllers\AdminEventFestivalController;
use App\Http\Controllers\AdminDestinationController;
use App\Http\Controllers\AdminLoginController;

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
    return view('index');
});

Route::get('/admin/login', function(){
    return view('login');
});

Route::post('/admin/logout', function(){
    session()->forget('islogin');
    return view('login');
});

Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::resource('destination', DestinationController::class);
Route::resource('event-festival', EventFestivalController::class);
Route::resource('admin/event-festival', AdminEventFestivalController::class);
Route::resource('admin/destination', AdminDestinationController::class);

// Tour Package
Route::get('/tour-package', [TourPackageController::class, 'index']);
Route::get('/tour-package/create', [TourPackageController::class, 'create']);
Route::get('/tour-package/{package:slug}', [TourPackageController::class, 'show']);
Route::post('/tour-package', [TourPackageController::class, 'store']);

