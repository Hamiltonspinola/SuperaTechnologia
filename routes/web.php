<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\DetailPlanController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::prefix('admin')
        ->group(function(){
            /**
             * Route Details Plan
             */

            Route::put('plans/{url}/details/{idDetail}',[DetailPlanController::class, 'update'])->name('plans.details.update');
            Route::get('plans/{url}/details/{idDetail}/edit',[DetailPlanController::class, 'edit'])->name('plans.details.edit');
            Route::get('plans/{url}/details/create',[DetailPlanController::class, 'create'])->name('plans.details.create');
            Route::post('plans/{url}/details/create',[DetailPlanController::class, 'store'])->name('plans.details.store');
            Route::get('plans/{url}/details',[DetailPlanController::class, 'index'])->name('plans.details.index');

            /**
             * Route Plans
             */
    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('plans/create', [PlanController::class, 'store'])->name('plans.store');

    /*
    *Home
     */
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
});