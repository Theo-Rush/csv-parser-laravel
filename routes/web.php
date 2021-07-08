<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\CsvControlller;

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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/csv/uploadErrors', [CsvControlller::class, 'errors'])->name('csv.errors');
    Route::get('/csv/download', [CsvControlller::class, 'download'])->name('csv.download');
    Route::get('/csv/filter', [CsvControlller::class, 'filter'])->name('csv.filter');
    Route::resource('/csv', CsvControlller::class)->only([
        'index', 'store'
    ]);
    // Route::view('/csv/errors', 'csv.errors')->name('csv.errors');
});
