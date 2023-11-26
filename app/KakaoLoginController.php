<?php
namespace App;


require $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
use Dotenv\Dotenv;
use GuzzleHttp\Client;

class KakaoLoginController
{

    private $kakaoKey;
    private $kakaoCallBackUrl;
    private $kakaoAuthUrl;
    private $client;
    public function __construct()
    {
        $dotenv = Dotenv::createImmutable($_SERVER['DOCUMENT_ROOT']);
        $dotenv->safeLoad();
        $this->kakaoKey = $_ENV['KAKAO_KEY'];
        $this->kakaoCallBackUrl = $_ENV['KAKAO_CALLBACK_URL'];
        $this->client = new Client(['verify'=>false]);
    }

    public function getAuthorizeUrl()
    {
        return "https://kauth.kakao.com/oauth/authorize?response_type=code&client_id={$this->kakaoKey}&redirect_uri={$this->kakaoCallBackUrl}";
    }

    public function getKakaoToken(string $code)
    {
        $url = "https://kauth.kakao.com/oauth/token?grant_type=authorization_code&client_id=".$this->kakaoKey."&redirect_uri=".$this->kakaoCallBackUrl."&code=".$code."";
        $res = $this->client->request("POST",$url);
        return $res;
    }

    public function getKakaoUserInfo(string $token)
    {
        $url = "https://kapi.kakao.com".'/v2/user/me';
        $requestResult = $this->client->request("POST",$url,[
            'headers'=>[
                'Authorization'=>"Bearer {$token}"
            ]
        ]);
        $tmp = $requestResult->getBody();
        $returnData = json_decode($tmp,true);
        return $returnData;
    }
}