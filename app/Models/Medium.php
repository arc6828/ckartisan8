<?php

namespace App\Models;

use DOMDocument;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    public static function fetch($publication, $tagname = "")
    {
        // $url = "https://news.google.com/news/rss";
        $url = "https://medium.com/feed/{$publication}";
        if (!empty($tagname)) {
            $url = "https://medium.com/feed/{$publication}/tagged/{$tagname}";
        }

        $data = cache()->remember($url, now()->addDay(), function () use ($url) {
            //FETCH DATA
            $fileContents = file_get_contents($url);
            $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
            $fileContents = trim(str_replace('"', "'", $fileContents));
            $fileContents = str_replace("<content:encoded>", "<contentEncoded>", $fileContents);
            $fileContents = str_replace("</content:encoded>", "</contentEncoded>", $fileContents);
            $fileContents = str_replace("<dc:creator>", "<creator>", $fileContents);
            $fileContents = str_replace("</dc:creator>", "</creator>", $fileContents);
            $simpleXml = simplexml_load_string($fileContents, "SimpleXMLElement", LIBXML_NOCDATA);
            $data = $simpleXml;
            //ENHANCED DATA
            for ($i = 0; $i < count($data->channel->item); $i++) {
                $item = $data->channel->item[$i];
                // echo $item->contentEncoded;
                $doc = new DOMDocument();
                libxml_use_internal_errors(true);
                $html_data = mb_convert_encoding($item->contentEncoded, 'HTML-ENTITIES', 'UTF-8');
                $doc->loadHTML('<div>' . $html_data . '</div>');
                $data->channel->item[$i]->image_url = '';
                $data->channel->item[$i]->first_paragraph = '';
                try {
                    $data->channel->item[$i]->image_url = $doc->getElementsByTagName('img')[0]->getAttribute('src');
                    $data->channel->item[$i]->first_paragraph = $doc->getElementsByTagName('p')[0]->nodeValue;
                } catch (\Throwable $th) {
                    //
                }
            }
            return $data;
        });

        return $data;
    }
}
