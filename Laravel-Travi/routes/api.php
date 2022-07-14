<?php

use App\Http\Controllers\API\AdminDestinationController;
use App\Http\Controllers\API\AdminEventFestivalController;
use App\Http\Controllers\API\TourPackageController;
use App\Http\Controllers\API\EventFestivalController;
use App\Http\Controllers\API\DestinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/tour-package', [TourPackageController::class, 'index']);
Route::post('/tour-package', [TourPackageController::class, 'store']);

Route::get('/event-festival', [EventFestivalController::class, 'index']);
Route::post('/admin/event-festival', [AdminEventFestivalController::class, 'store']);
Route::get('/admin/event-festival', [AdminEventFestivalController::class, 'index']);
Route::post('/admin/event-festival/{id}', [AdminEventFestivalController::class, 'update']);
Route::delete('/admin/event-festival/{id}', [AdminEventFestivalController::class, 'destroy']);

Route::get('/destination', [DestinationController::class, 'index']);
Route::post('/admin/destination', [AdminDestinationController::class, 'store']);
Route::delete('/admin/destination/{id}', [AdminDestinationController::class, 'destroy']);
Route::post('/admin/destination/{id}', [AdminDestinationController::class, 'update']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
