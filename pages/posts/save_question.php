<?php
require $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'].'/session_manager.php';
use App\GptController;
use Database\DB;
$isLoggedIn = isset($_SESSION['kakao_id']);
var_dump($isLoggedIn);
if ($isLoggedIn == false)
{
    header("Location: http://localhost:2222");
}
$kakao_id = $_SESSION['kakao_id'];
var_dump($kakao_id);
$title = $_POST['question_title'];
$story = $_POST['question_story'];
//$gptController = new GptController();
//$result = $gptController->sendGpt($title,$story);
//var_dump($result);
$db = new DB();

//$user_id = $db->queryResult("SELECT user_id FROM users where kakao_user_id = {$kakao_id}");
$result = mysqli_query($db->connection,"SELECT user_id FROM users where kakao_user_id = {$kakao_id}");
$row = mysqli_fetch_assoc($result);
var_dump($row['user_id']);
$user_id = $row['user_id'];
mysqli_query($db->connection,"insert into questions values (null,'{$title}','{$story}',{$user_id})");
//if ($isWrite == true)
//{
//    header("Location: http://localhost:2222");
//}

?>