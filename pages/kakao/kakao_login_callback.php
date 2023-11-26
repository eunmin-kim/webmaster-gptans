<?php
require "../../vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'].'/session_manager.php';
use App\KakaoLoginController;

$kakao = new KakaoLoginController();
$res = $kakao->getKakaoToken($_REQUEST['code']);
$a = $res->getBody();
$b = json_decode($a,true);
$accessToken = $b['access_token'];
$result = $kakao->getKakaoUserInfo($accessToken);
var_dump($result['id']);
//TODO: id 저장, username 저장, email 저장
$_SESSION['kakao_id'] = $result['id'];
header('Location: http://localhost:2222/');
?>