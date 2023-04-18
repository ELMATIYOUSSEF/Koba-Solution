<?php

use App\Enums\PermissionType;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\CamionTypeController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/homepage', function () {
        return view('welcome');
    });
    
});


Route::middleware(['auth', 'role:admin|driver'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    // camion
    Route::resource('camions',CamionController::class);
    Route::get('/camions/edit/{camion}', [CamionController::class, 'getCamionById']);
    Route::post('camions/changestatus', [CamionController::class, 'updateStatus'])->name('changestatus');


    //Customers
    Route::resource('Customers',AuthController::class);

    
    // Price
    Route::resource('prices',PriceController::class)->only('update');

    // Settings
    Route::resource('settings',SettingController::class);

    // TYPECAMION 
    Route::post('/store/camiontypes',[CamionTypeController::class ,'store'])->name('Storecamiontypes');
    Route::delete('/destroy/camiontypes/{id}',[CamionTypeController::class ,'destroy'])->name('destroycamiontypes');
    // change role
    Route::post('/changeRole', [AuthController::class,'changeRole'])->name('changeRole');
    Route::post('/changeSatatusOrder', [OrderController::class,'changeSatatusOrder'])->name('changeSatatusOrder');
    Route::resource('/roles', RoleController::class);
});








// checkoutPage
 Route::get('/checkoutPage',[OrderController::class,'create']);

// ORDER

Route::group(['controller' => OrderController::class, 'prefix'=>'orders' ], function () {
    Route::get('', 'index')->name('orders.index')->middleware(['permission:'.PermissionType::GESTIONORDER]);
    Route::post('', 'store')->name('orders.store')->middleware(['permission:'.PermissionType::CREATEORDER]);
    Route::get('/{order}', 'show')->name('orders.show')->middleware(['permission:'.PermissionType::GESTIONORDER]);
    Route::put('/{order}', 'update')->name('orders.update')->middleware(['permission:'.PermissionType::GESTIONORDER]);
    Route::delete('/{order}', 'destroy')->name('orders.destroy')->middleware(['permission:'.PermissionType::GESTIONORDER]);
});



// feedbacks

Route::group(['controller' => FeedBackController::class, 'prefix'=>'feedbacks' ], function () {
    Route::get('', 'index')->name('feedbacks.index')->middleware(['permission:'.PermissionType::GESTIONFEEDBACK]);
    Route::post('', 'store')->name('feedbacks.store')->middleware(['permission:'.PermissionType::CREATEFEEDBACK]);
    Route::get('/{feedback}', 'show')->name('feedbacks.show')->middleware(['permission:'.PermissionType::GESTIONFEEDBACK]);
    Route::put('/{feedback}', 'update')->name('feedbacks.update')->middleware(['permission:'.PermissionType::GESTIONFEEDBACK]);
    Route::delete('/{feedback}', 'destroy')->name('feedbacks.destroy')->middleware(['permission:'.PermissionType::GESTIONFEEDBACK]);
});

Route::get('/Mycamion',[CamionController::class,'getMycamion'])->name('Mycamion');

Route::post('/camions/Remplire',[CamionController::class,'getRemplire']);