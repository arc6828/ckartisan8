<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Vedmant\FeedReader\Facades\FeedReader;

class MediumController extends Controller
{
    public function feed($publication = "ckartisan", $tagname = "")
    {
        // $url = "https://news.google.com/news/rss";
        $url = "https://medium.com/feed/{$publication}";
        if (!empty($tagname)) {
            $url = "https://medium.com/feed/{$publication}/tagged/{$tagname}";
        }

        $json = cache()->remember($url, now()->addDay(), function () use ($url) {
            $fileContents = file_get_contents($url);
            $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
            $fileContents = trim(str_replace('"', "'", $fileContents));
            $fileContents = str_replace("<content:encoded>", "<contentEncoded>", $fileContents);
            $fileContents = str_replace("</content:encoded>", "</contentEncoded>", $fileContents);
            $fileContents = str_replace("<dc:creator>", "<creator>", $fileContents);
            $fileContents = str_replace("</dc:creator>", "</creator>", $fileContents);
            $simpleXml = simplexml_load_string($fileContents, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($simpleXml, JSON_UNESCAPED_UNICODE);
            return $json;
        });
        // $fileContents = file_get_contents($url);
        // $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
        // $fileContents = trim(str_replace('"', "'", $fileContents));
        // $fileContents = str_replace("<content:encoded>", "<contentEncoded>", $fileContents);
        // $fileContents = str_replace("</content:encoded>", "</contentEncoded>", $fileContents);
        // $fileContents = str_replace("<dc:creator>", "<creator>", $fileContents);
        // $fileContents = str_replace("</dc:creator>", "</creator>", $fileContents);
        // $simpleXml = simplexml_load_string($fileContents, "SimpleXMLElement", LIBXML_NOCDATA);
        // $json = json_encode($simpleXml, JSON_UNESCAPED_UNICODE);
        return $json;
    }
}
