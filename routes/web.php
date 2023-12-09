<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;

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

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::fallback(function() {
        return view('pages/utility/404');
    });
});

Route::get('/components/table-daftar-lahan', [DashboardController::class, 'table_daftar_lahan'])->name('table-daftar-lahan');
//Daftar Table//
Route::get('/pages/add/daftar-farmer', [DashboardController::class, 'daftar_farmer'])->name('daftar-farmer');
Route::get('/pages/add/daftar-lahan', [DashboardController::class, 'daftar_lahan'])->name('daftar-lahan');
Route::get('/pages/add/daftar-sensor', [DashboardController::class, 'daftar_sensor'])->name('daftar-sensor');
Route::get('/components/dashboard/information', [DashboardController::class, 'information'])->name('information');

//Search//
Route::get('/pages/search/search-farmer', [DashboardController::class, 'search_farmer'])->name('search-farmer');
Route::get('/pages/search/search-lahan', [DashboardController::class, 'search_lahan'])->name('search-lahan');
Route::get('/pages/search/search-sensor', [DashboardController::class, 'search_sensor'])->name('search-sensor');

//Create//
Route::post('/pages/add/daftar-lahan', [DashboardController::class, 'store_lahan'])->name('lahan-store');
Route::post('/pages/add/daftar-farmer', [DashboardController::class, 'store_farmer'])->name('farmer-store');
Route::post('/pages/add/daftar-sensor', [DashboardController::class, 'store_sensor'])->name('sensor-store');

//Edit-Delete//
Route::get('/pages/edit-delete/form-lahan/{id}', [DashboardController::class, 'form_lahan_edit'])->name('form-lahan.edit');
Route::delete('/pages/edit-delete/form-lahan/{id}', [DashboardController::class, 'form_lahan_destroy'])->name('form-lahan.destroy');






