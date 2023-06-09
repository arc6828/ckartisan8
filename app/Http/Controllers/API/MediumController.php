<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Medium;
use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;

class MediumController extends Controller
{
    public function feed($publication = "ckartisan", $tagname = "")
    {
        $data = Medium::fetch($publication, $tagname);
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function feedNoCache($publication = "ckartisan", $tagname = "")
    {
        $data = Medium::fetchNoCache($publication, $tagname);
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }
}
