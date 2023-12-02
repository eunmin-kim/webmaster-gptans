<?php

require $_SERVER["DOCUMENT_ROOT"]."/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'].'/session_manager.php';
use Database\DB;

$answerText = $_POST['answer_story'];
$postId = $_POST['post_id'];
$kakaoId = $_SESSION['kakao_id'];
$db = new DB();
$searchSql = "SELECT user_id FROM users where kakao_user_id = '$kakaoId'";
$searchResult = $db->query($searchSql);
$searchRow = mysqli_fetch_assoc($searchResult);
$userId = $searchRow['user_id'];
$sql = "insert into answers values (null,'$answerText',$postId,$userId)";
$db->query($sql);
header("Location: http://localhost:2222/pages/read.php?page=".$postId);
?>