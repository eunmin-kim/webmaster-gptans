<?php

namespace App;
require $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
use Dotenv\Dotenv;
use GuzzleHttp\Client;
class GptController
{
    private string $gptKey;
    private $client;
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $dotenv->safeLoad();
        $this->gptKey = $_ENV['GPT_KEY'];
        $this->client = new Client(['verify'=>false]);
    }

    public function sendGpt($title, $story)
    {
        $question = $title.$story."내 질문에 답변해줘.";
        $allQuestion = [
        "model"=> "gpt-3.5-turbo",
        "messages"=>[
            "role"=>"user",
            "content"=>$question
        ]];
        $jsonQuestion = json_encode($allQuestion);
        var_dump($jsonQuestion);
        $res = $this->client->request('POST','https://api.openai.com/v1/chat/completions',
            [
                'headers'=> [
                    'Content-Type'=>'application/json',
                    'Authorization'=>'Bearer '.$this->gptKey
                ],
                'json'=>$allQuestion

        ],

        );
        $gptRes = $res->getBody();
        $decodeGptRes = json_decode($gptRes,true);
        return $decodeGptRes["choices"]["message"]["content"];
    }
}