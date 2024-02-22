<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeacherController;
use App\Models\Article;
use App\Models\Medium;
use App\Models\Tambon;
use App\Models\Teacher;
use Illuminate\Http\Request;
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

Route::get('/', [HomeController::class, "home"]);

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
    return view("tambon/index", compact('provinces', 'amphoes', 'tambons'));
});


Route::get('/cache', function () {
    $provinces = Tambon::select('province')->distinct()->get();
    $amphoes = Tambon::select('amphoe')->distinct()->get();
    $tambons = Tambon::select('tambon')->distinct()->get();
    return view("tambon/index", compact('provinces', 'amphoes', 'tambons'));
});


// Route::resource('article', 'ArticleController');
Route::resource('article', ArticleController::class);


Route::get('scraping/medium-feed', function () {
    return view("scraping/medium-feed");
})->name("scraping.medium-feed");

Route::post('scraping/medium-feed', function (Request $request) {
    $publication = $request->get('publication');
    $tagname = $request->get('tagname', "");

    $data = Medium::fetch($publication, $tagname);

    foreach ($data->channel->item as $item) {
        if(!isset($item->category)){
            $item->category = json_encode([]);
        }else if(is_string($item->category)){
            $item->category = json_encode([$item->category]);
        }else{
            $item->category = json_encode($item->category, JSON_UNESCAPED_UNICODE);
        }
        Article::updateOrCreate(
            ['guid' => $item->guid],
            [
                'title' => $item->title,
                'link' => $item->link,
                // 'guid' => $item->guid,
                'category' => $item->category,
                'creator' => $item->creator,
                'pubDate' => date("Y-m-d H:i:s", strtotime($item->pubDate)),
                'contentEncoded' => $item->contentEncoded,
                'image_url' => $item->image_url,
                'first_paragraph' => $item->first_paragraph,
                // 'credit' => '',
            ]
        );
        // break;
    }

    // update slug with id
    $articles = Article::whereNull('slug')->get();
    foreach($articles as $item){      
        $requestData = ["slug"=>$item->id];
        $item->update($requestData);
    }

    return redirect()->route("scraping.medium-feed");
})->name("scraping.medium-feed.store");

Route::resource('teacher', TeacherController::class);

Route::get('scraping/teacher', function () {
    $data = json_decode(file_get_contents("http://cs.vru.ac.th/json/teacher.json"));
    $teachers = $data ->people;


    foreach ($teachers as $item) {
        
        Teacher::updateOrCreate(
            ['email' => $item->email],
            [
                'name' => $item->name,
                'education' => $item->education,
                'role' => $item->role,
                // 'email' => $item->email,
                'phone' => $item->phone,
                'image' => $item->image,
                'office' => $item->office
            ]
        );
        // break;
    }
    echo "Import Teachers successfully";

})->name("scraping.teacher");

