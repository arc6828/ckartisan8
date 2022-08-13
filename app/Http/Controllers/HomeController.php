<?php

namespace App\Http\Controllers;

use App\Models\Medium;
use DOMDocument;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home()
    {
        $data = Medium::fetch("ckartisan");
        $laravel = Medium::fetch("ckartisan","laravel");
        $ubuntu = Medium::fetch("ckartisan","ubuntu-server");
        $git = Medium::fetch("ckartisan","git");
        
        return view('home', compact('data','laravel','ubuntu','git'));
    }
}
