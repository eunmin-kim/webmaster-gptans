<?php
require $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'].'/session_manager.php';
use App\KakaoLoginController;
use Database\DB;
$kakao = new KakaoLoginController();
$res = $kakao->getKakaoToken($_REQUEST['code']);
$a = $res->getBody();
$b = json_decode($a,true);
$accessToken = $b['access_token'];
$result = $kakao->getKakaoUserInfo($accessToken);
//var_dump($result['id']);
$kakao_nickname = $result['properties']['nickname'];
//var_dump($kakao_nickname);
$userId = $result['id'];
//TODO: id 저장, username 저장, email 저장
$_SESSION['kakao_id'] = $result['id'];
$db = new DB();
$res = $db->query("SELECT * FROM users WHERE kakao_user_id = {$userId}");
if ($res == true)
{
    header('Location: http://localhost:2222/');
}
else
{
    $db->query("insert into users values (null,'{$kakao_nickname}',{$userId},null)");
    header('Location: http://localhost:2222/');
}
?>