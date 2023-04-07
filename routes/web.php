<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\FeedBackController;

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
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
});

// camion
Route::resource('camions',CamionController::class)->middleware('auth');
Route::get('/camions/edit/{camion}', [CamionController::class, 'getCamionById']);
Route::post('camions/changestatus', [CamionController::class, 'updateStatus'])->name('changestatus');



// feedback
Route::resource('feedbacks',FeedBackController::class)->middleware('auth');


//Customers
Route::resource('Customers',AuthController::class)->middleware('auth');