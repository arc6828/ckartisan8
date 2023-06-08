<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LineMessageAPI extends Model
{
    public $channel_access_token = "PZdTdgSxG19zoHcgkUC6yPkkgjyS+rk5M5OLVqsBY25R91BbFclMOYVSd0EXEno4kFL0WPTdvjEsE4AK5xh6xZvA6ByMpa5xRc312kRJIwdqhd6xfDLW1nXNvxpm7NYFeto2R3LL1l6je+NGw9GQZgdB04t89/1O/w1cDnyilFU=";

    use HasFactory;


    public  function replyUser($requestData)
    {
        // for verify only
        if (count($requestData["events"]) == 0)  return;
        $event = $requestData["events"][0];


        switch ($event["message"]["type"]) {
            case "text":
                // $this->textHandler($event);
                // $this->replyWithText($event, "Hello World");
                
                $this->replyWithFlexBubble($event);
                break;
            case "location":

                // $this->replyWithText($event, "Hello World2");
                $this->replyWithFlexBubble($event);
                // $this->locationHandler($event);
                break;
            case "image":
                // $this->imageHandler($event);
                break;
        }
    }

    public  function replyWithFlexBubble($event)
    {
        // $template_path = storage_path('../public/flex-templates/places.json');
        $template_path = storage_path('../public/flex-templates/bubble.json');
        $string_json = file_get_contents($template_path);
        // $message = json_decode($string_json, true);
        // $message = json_decode($string_json, true);
        $message = [
            "type" => "flex",
            "altText" => "This is a flex template",
            "contents" => json_decode($string_json, true),
        ];
        $message2 = [
            "type" => "template",
            "altText" => "This is a carousel template",
            "template" => json_decode($string_json, true),
        ];
        // $message2 = [
        //     "type" => "text",
        //     "text" => "HEY",
        // ];

        //GET ONLY FIRST EVENT
        $replyToken = $event["replyToken"];

        // echo $event;
        $channel_access_token = $this->channel_access_token;
        // $event['message'] = ['id' => ''.$data['msgocrid'] ];
        $body = [
            "replyToken" => $replyToken,
            "messages" => [$message2],
        ];

        $opts = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n" .
                    'Authorization: Bearer ' . $channel_access_token,
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];

        $context  = stream_context_create($opts);
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);
        file_put_contents('../storage/logs/log.txt', $result . PHP_EOL, FILE_APPEND);
    }

    public  function replyImage($event, $image)
    {
        $message = [
            "type" => "text",
            "text" => $image,
        ];
        //GET ONLY FIRST EVENT
        $replyToken = $event["replyToken"];

        // echo $event;
        $channel_access_token = $this->channel_access_token;
        // $event['message'] = ['id' => ''.$data['msgocrid'] ];
        $body = [
            "replyToken" => $replyToken,
            "messages" => [$message],
        ];

        $opts = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n" .
                    'Authorization: Bearer ' . $channel_access_token,
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];

        $context  = stream_context_create($opts);
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url = "https://api.line.me/v2/bot/message/reply";
        file_get_contents($url, false, $context);
    }

    public  function replyWithText($event, $text)
    {
        $message = [
            "type" => "text",
            "text" => $text,
        ];
        //GET ONLY FIRST EVENT
        $replyToken = $event["replyToken"];

        // echo $event;
        $channel_access_token = $this->channel_access_token;
        // $event['message'] = ['id' => ''.$data['msgocrid'] ];
        $body = [
            "replyToken" => $replyToken,
            "messages" => [$message],
        ];

        $opts = [
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n" .
                    'Authorization: Bearer ' . $channel_access_token,
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];

        $context  = stream_context_create($opts);
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);
        file_put_contents('../storage/logs/log.txt', $result . PHP_EOL, FILE_APPEND);
    }
}
