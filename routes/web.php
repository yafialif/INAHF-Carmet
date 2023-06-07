<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider wit hin a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\Admin\ListPatientAdhfController;
use App\Http\Controllers\Admin\ListPatientCronicController;
use App\Http\Controllers\Admin\ManageDokterController;
use App\Http\Controllers\Admin\ChronicPatientMonthFollowUpController;
use App\Http\Controllers\ApiTokenController;
use App\Http\Controllers\GenerateDbandSeederController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/seeders', [GenerateDbandSeederController::class, 'index']);


Route::group(['middleware' => 'auth'], function () {
    // User needs to be authenticated to enter here.
    Route::get('/admin/listpatientadhf/{id}/show', [ListPatientAdhfController::class, 'show'])->name('admin.listpatientadhf.show');
    Route::get('/admin/listpatientcronic/{id}/show', [ListPatientCronicController::class, 'show'])->name('admin.listpatientcronic.show');
    Route::get('/admin/listpatientadhf/test', [ListPatientAdhfController::class, 'test'])->name('admin.listpatientadhf.test');
    Route::get('/admin/chronicpatientmonthfollowup/{id}/create', [ChronicPatientMonthFollowUpController::class, 'addnew'])->name('admin.chronicpatientmonthfollowup.addnew');
    Route::get('/admin/chronicpatientmonthfollowup/{id}/edit/{id_patient}', [ChronicPatientMonthFollowUpController::class, 'edit'])->name('admin.chronicpatientmonthfollowup.edit_mounthfollowup');
    Route::get('/admin/generatetoken', [ApiTokenController::class, 'update']);
    Route::post('/admin/listpatientadhf', [ListPatientAdhfController::class, 'update']);

    // Route::resource('/admin/managedokter', ManageDokterController::class);
});
// Route::resource()