<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HealthcareFacilitiesController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/map', 'map');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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

    });
});

require __DIR__.'/auth.php';
