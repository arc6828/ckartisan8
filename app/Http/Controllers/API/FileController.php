<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public function upload(Request $request)
    {
        // $requestData = $request->all();
        $url = "";
        if ($request->hasFile('image')) {
            $filename = $request->file('image')->store('uploads', 'public');
            $url = asset('storage/'.$filename);
            return ["success" => true, "uri" => $url];
        }else{
            return ["success" => false, "uri" => $url];
        }
    
        //ONLY CREATE -> https://laravel.com/docs/8.x/eloquent#mass-assignment
        // $location = Location::create($requestData);
        //CREATE OR UPDATE -> https://laravel.com/docs/8.x/eloquent#upserts
        // $user_id = $requestData["user_id"];
        // $item = Location::updateOrCreate(['user_id' => $user_id], $requestData);
        // return ["success" => true, "data" => $url];
    }
}
