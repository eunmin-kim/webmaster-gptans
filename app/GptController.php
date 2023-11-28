<?php

namespace App;
require "../vendor/autoload.php";
use Dotenv\Dotenv;
use GuzzleHttp\Client;
class GptController
{
    private string $gptKey;
    private Client $client;
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
        $res = $this->client('POST','https://api.openai.com/v1/chat/completions',[
            "model"=> "gpt-3.5-turbo",
            "messages"=>[
                "role"=>"user",
                "content"=>$question
            ]
        ],
            ['Content-Type'=>'application/json'],
            ['Authorization'=>'Bearer '.$this->gptKey]
        );
        $gptRes = $res->getBody();
        $decodeGptRes = json_decode($gptRes,true);
        return $decodeGptRes["choices"]["message"]["content"];
    }
}