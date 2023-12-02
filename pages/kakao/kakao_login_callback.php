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
$userId = (string)$result['id'];
//TODO: id 저장, username 저장, email 저장
$_SESSION['kakao_id'] = $result['id'];
$db = new DB();
$sql2 = "SELECT * FROM users where kakao_user_id = $userId";
$res = $db->query($sql2);
$row = mysqli_fetch_array($res);
if ($row === null)
{
    $sql = "insert into users (user_id,kakao_nickname,kakao_user_id,kakao_email) values (null,'$kakao_nickname','$userId',null)";
    $db->query($sql);
    header('Location: http://localhost:2222/');
}
else
{
    header('Location: http://localhost:2222/');
}
?>