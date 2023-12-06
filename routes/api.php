<?php

use App\Http\Controllers\API\MediumController;
use App\Http\Controllers\API\PublicationController;
use App\Http\Controllers\API\TambonController;
use App\Http\Controllers\API\WongnaiController;
use App\Models\Article;
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

Route::get('/article', function(){
    $articles = Article::get();
    return json_encode($articles, JSON_UNESCAPED_UNICODE);
});

Route::get('/article/tagged/{tagname}', function($tagname){
    $articles = Article::where('category','like',"%$tagname%")->get();
    return json_encode($articles, JSON_UNESCAPED_UNICODE);
});

Route::get('/article/{id}', function($id){
    
    $article = Article::findOrFail($id);
    $latest = Article::orderBy('pubDate','desc')->limit(5)->get();
    $tag = json_decode($article->category)[0];
    $tagged = Article::where('category','like',"%$tag%")->orderBy('pubDate','desc')->limit(3)->get();
    $article_set = [
        "article" => $article ,
        "latest" => $latest ,
        "tagged" => $tagged ,
    ];
    return json_encode($article_set, JSON_UNESCAPED_UNICODE);
});


