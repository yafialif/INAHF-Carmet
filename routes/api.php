<?php

use Illuminate\Http\Request;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/coba', function () {
    return 1;
});

// Route::get('chartadhf', [DashboardController::class, 'chartAdhf']);
Route::get('chartadhf', 'Admin\ChartadhfController@chartAdhf');
Route::get('notifmonthfollowup', 'Admin\DashboardController@notifMonthFollowUp');
