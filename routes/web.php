<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HealthcareFacilitiesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WebController::class, 'index'])->name('web.home');
Route::get('/diseases', [WebController::class, 'diseases'])->name('web.diseases.index');
Route::get('/diseases/{id}', [WebController::class, 'diseases_detail'])->name('web.diseases.detail');
Route::get('/cases/{id}', [WebController::class, 'cases'])->name('web.cases');

Route::view('/map', 'map');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'admin-panel'], function () {
    Route::get('/get-all-districts', [AdminPanelController::class, 'getAllDistricts']);
    Route::get('/get-all-healthcares', [AdminPanelController::class, 'getAllHealthcares']);
    Route::get('/polygon-except-one/{id}', [DistrictController::class, 'polygonExceptOne']);
    Route::get('/diseases-by-district', [AdminPanelController::class, 'getAllDiseasesByDistrict']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::group(['prefix' => 'admin-panel'], function () {
        Route::get('/dashboard', [AdminPanelController::class, 'index'])->name('admin-panel.dashboard');

        Route::resource('diseases', DiseaseController::class, ['as' => 'admin-panel']);

        Route::resource('districts', DistrictController::class, ['as' => 'admin-panel']);

        Route::get('/district-polygon/{id}', [HealthcareFacilitiesController::class, 'getDistrictPolygon']);
        Route::resource('healthcare-facilities', HealthcareFacilitiesController::class, ['as' => 'admin-panel']);

        Route::resource('cases', CasesController::class, ['as' => 'admin-panel']);
    });
});

require __DIR__.'/auth.php';
