<?php
require "../vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'].'/session_manager.php';
use App\GptController;

$isLoggedIn = isset($_SESSION['kakao_id']);

$title = $_POST['question_title'];
$story = $_POST['question_story'];
$gptController = new GptController();
$result = $gptController->sendGpt($title,$story);

?>