<?php
require $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'].'/session_manager.php';
use App\GptController;
use Database\DB;
$isLoggedIn = isset($_SESSION['kakao_id']);
//var_dump($isLoggedIn);
if ($isLoggedIn == false)
{
    header("Location: http://localhost:2222");
}
$kakao_id = $_SESSION['kakao_id'];
//var_dump($kakao_id);
$title = $_POST['question_title'];
$story = $_POST['question_story'];
$gptController = new GptController();
$gptResult = $gptController->sendGpt($title,$story);
//var_dump($result);
$db = new DB();

//$user_id = $db->queryResult("SELECT user_id FROM users where kakao_user_id = {$kakao_id}");
$result = $db->query("SELECT user_id FROM users where kakao_user_id = {$kakao_id}");
$row = mysqli_fetch_assoc($result);
//var_dump($row['user_id']);
$user_id = $row['user_id'];
$db->query("insert into questions values (null,'{$title}','{$story}',{$user_id})");
$question_id = $db->connection->insert_id;
// GPT 답변 저장
$gptId = mysqli_query($db->connection, "select user_id from users where kakao_nickname = 'GPT' ");
$gptIdRow = mysqli_fetch_assoc($gptId);
$gptId = $gptIdRow['user_id'];
mysqli_query($db->connection,"insert into answers values (null,'{$gptResult}',{$question_id},{$gptId})");
header("Location: http://localhost:2222/pages/read.php?page=$question_id");
?>