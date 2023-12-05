<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Models\Tambon;
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

Route::get('/tambon', function () {
    $provinces = Tambon::select('province')->distinct()->get();
    $amphoes = Tambon::select('amphoe')->distinct()->get();
    $tambons = Tambon::select('tambon')->distinct()->get();
    return view("tambon/index", compact('provinces','amphoes','tambons'));
});


Route::get('/cache', function () {
    $provinces = Tambon::select('province')->distinct()->get();
    $amphoes = Tambon::select('amphoe')->distinct()->get();
    $tambons = Tambon::select('tambon')->distinct()->get();
    return view("tambon/index", compact('provinces','amphoes','tambons'));
});


// Route::resource('article', 'ArticleController');
Route::resource('article', ArticleController::class);