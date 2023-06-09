<?php

use App\Http\Controllers\API\MediumController;
use App\Http\Controllers\API\PublicationController;
use App\Http\Controllers\API\TambonController;
use App\Http\Controllers\API\WongnaiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('/publication', PublicationController::class);
Route::prefix('medium')->group(function () {
    Route::get('/feed/{publication?}', [MediumController::class, 'feed']);
    Route::get('/feed/{publication?}/tagged/{tagname?}', [MediumController::class, 'feed']);
    Route::get('/feednocache/{publication?}', [MediumController::class, 'feedNoCache']);
    Route::get('/feednocache/{publication?}/tagged/{tagname?}', [MediumController::class, 'feedNoCache']);
    // tagged/[tag-name]
    Route::get('/ckartisan', [MediumController::class, 'ckartisan']);
    Route::get('/ckartisan2', [MediumController::class, 'ckartisan2']);
});

// PROVINCE - AMPHOE - TAMBON
Route::get('/provinces', [ TambonController::class , 'getProvinces' ]);
Route::get('/amphoes', [TambonController::class , 'getAmphoes' ]);
Route::get('/tambons', [ TambonController::class , 'getTambons' ]);
Route::get('/zipcodes', [TambonController::class, 'getZipcodes'] );

// https://3166-202-29-39-124.ngrok-free.app
Route::apiResource('/mywongnai/webhook', WongnaiController::class);
// Route::post('/mywongnai/webhook', [WongnaiController::class, 'store'] );