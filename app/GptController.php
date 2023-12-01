<?php

namespace App;
require $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
use Dotenv\Dotenv;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GptController
{
    private string $gptKey;
    private $client;
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $dotenv->safeLoad();
        $this->gptKey = $_ENV['GPT_KEY'];
//        $this->client = new Client(['verify'=>false,'connect_timeout'=>60]);
    }

    /**
     * @throws GuzzleException
     */
    public function sendGpt($title, $story)
    {
        $question = $title.$story."내 질문에 답변해줘.";
        $allQuestion = [
            "model"=> "gpt-3.5-turbo",
            "messages"=>[
                "role"=>"user",
                "content"=>$question
            ]
        ];
        $msg = [
            [


                "role"=>"user",
                "content"=>$question
            ]
        ];
        $client = new Client(['verify'=>false,'connect_timeo
        
        ut'=>60]);
//        $jsonQuestion = json_encode($allQuestion);
        $res = $client->request("POST",
            'https://api.openai.com/v1/chat/completions',
            [
                "headers"=>[
                    "Authorization"=>"Bearer ".$this->gptKey,
                    "Content-Type"=> "application/json"
                ],
                "json"=>[
                    "model"=>"gpt-3.5-turbo-1106",

                    "messages"=> $msg
                ]
            ]
        );
        $gptRes = $res->getBody();
//        var_dump($gptRes);
            $decodeGptRes = json_decode($gptRes,true);
            return $decodeGptRes["choices"][0]["message"]["content"];
//        var_dump($res);

    }
}