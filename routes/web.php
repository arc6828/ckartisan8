<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class , "home"]);

Route::get('/about', function () {
    return view('comingsoon');
});
Route::get('/timeline', function () {
    return view('comingsoon');
});

Route::get('/cookies-policy', function () {
    return view('cookies-policy');
});

Route::get('/theme', function () {
    return view('components/magdesign/theme');
});