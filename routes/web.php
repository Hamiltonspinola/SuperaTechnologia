<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\DetailPlanController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\TipVehicleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Auth;
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
        ->middleware('auth')
        ->group(function(){

            /**
             * Route tips vehicle
             */

            Route::get('vehicles/{url}/tips/create',[TipVehicleController::class, 'create'])->name('vehicles.tips.create');
            Route::put('vehicles/{url}/tips/{idTip}',[TipVehicleController::class, 'update'])->name('vehicles.tips.update');
            Route::get('vehicles/{url}/tips/{idTip}/edit',[TipVehicleController::class, 'edit'])->name('vehicles.tips.edit');
            Route::any('vehicles/{url}/search', [TipVehicleController::class, 'search'])->name('vehicles.tips.search');
            Route::delete('vehicles/{url/tips/{idTip}', [TipVehicleController::class, 'destroy'])->name('vehicles.tips.destroy');
            Route::get('vehicles/{url/tips/{idTip}', [TipVehicleController::class, 'show'])->name('vehicles.tips.show');
            Route::post('vehicles/{url}/tips/create',[TipVehicleController::class, 'store'])->name('vehicles.tips.store');
            Route::get('vehicles/{url}/tips',[TipVehicleController::class, 'index'])->name('vehicles.tips.index');

            /**
             * Route vehicles
             */
            Route::get('vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
            Route::put('vehicles/{url}', [VehicleController::class, 'update'])->name('vehicles.update');
            Route::get('vehicles/{url}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
            Route::any('vehicles/search', [VehicleController::class, 'search'])->name('vehicles.search');
            Route::delete('vehicles/{url}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
            Route::get('vehicles/{url}', [VehicleController::class, 'show'])->name('vehicles.show');
            Route::post('vehicles/create', [VehicleController::class, 'store'])->name('vehicles.store');
});

/*
            *Home
            */
            Route::get('/', [VehicleController::class, 'index'])->name('admin.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\VehicleController::class, 'index'])->name('home');
