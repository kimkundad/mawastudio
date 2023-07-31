<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api'
], function ($router) {

    Route::get('/get_event/{id}', [App\Http\Controllers\HomeController::class, 'get_event']);
    Route::get('/get_seats/{id}', [App\Http\Controllers\HomeController::class, 'get_seats']);
    Route::get('/create_roomsA', [App\Http\Controllers\HomeController::class, 'create_roomsA']);
    Route::get('/create_roomsB', [App\Http\Controllers\HomeController::class, 'create_roomsB']);
    Route::get('/create_roomsC', [App\Http\Controllers\HomeController::class, 'create_roomsC']);
    Route::get('/create_roomsD', [App\Http\Controllers\HomeController::class, 'create_roomsD']);
    Route::post('/useCheckSeasts/{id}', [App\Http\Controllers\HomeController::class, 'useCheckSeasts']);
    Route::post('/addOrder', [App\Http\Controllers\HomeController::class, 'addOrder']);
    Route::get('/getDataOrder/{id}', [App\Http\Controllers\HomeController::class, 'getDataOrder']);
    Route::post('/addPayment', [App\Http\Controllers\HomeController::class, 'addPayment']);
    Route::post('/addDonate', [App\Http\Controllers\HomeController::class, 'addDonate']);

});


