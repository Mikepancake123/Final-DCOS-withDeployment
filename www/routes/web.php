<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Route::resource('patients', PatientController::class);
Route::resource('sessions', SessionController::class);
Auth::routes();

// Route::get('/search/', 'PostsController@search')->name('search');
// Route::get('/patients', [App\Http\Controllers\PatientsController::class, 'index'])->name('patients');
// Route::get('/patients', [App\Http\Controllers\PatientsController::class, 'show'])->name('patients');


// Route::get('/patients', [App\Http\Controllers\PatientsController::class, 'show'])->name('sessions');

Route::get('/search', [App\Http\Controllers\PatientController::class, 'search'])->name('search');
Route::get('/patients', [App\Http\Controllers\PatientController::class, 'index'])->name('patients');
Route::get('reports/index', [App\Http\Controllers\HomeController::class, 'report']);
