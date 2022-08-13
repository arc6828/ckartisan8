<?php

namespace App\Models;

use DOMDocument;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    public static function fetch($publication, $tagname=""){

        $url = "api/medium/feed/{$publication}";
        if(!empty($tagname)){
            $url = "api/medium/feed/{$publication}/tagged/{$tagname}";
        }
        $client = new Client();
        $response = $client->get(url($url));
        $data = json_decode($response->getBody()->getContents());
        for ($i=0; $i<count($data->channel->item); $i++)
        {
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
        // $response = json_decode($response);
        // return view('home', compact('data'));

    }
}
