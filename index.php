<?php
require "vendor/autoload.php";
use Utils\PageLoader;
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/style.css">
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>G지식인</title>
</head>
<body>
<nav class="container mx-auto justify-center" style="width: 1200px;">
    <div class="container flex py-6 px-6 justify-between" style="width:100%;">
        <div class="flex self-base">
            <div class="font-bold text-lg color-white mr-4">
                <a href="/" class="text-2xl">G지식인 - with ChatGPT</a>
            </div>
            <ul class="ml-2 self-center flex" style="margin-top: 5px;">
                <li class="px-2">
                    <a href="#" class="text-md font-bold text-teal-600">전체글 보기</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md font-bold">질문하기</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md font-bold">답변하기</a>
                </li>
            </ul>
        </div>
        <div class="flex">
            <ul class="ml-2 self-center flex">
                <li class="px-2">
                    <a href="<?php echo PageLoader::load(null,"login") ?>" class="text-md">로그인</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md">회원가입</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- 메인 화면-->
<div class="container mx-auto p-6" style="width: 1200px;">
    <div class="container bg-white mx-auto p-12 rounded-lg">
<!--        실시간 질문글 헤더-->
        <div class="container flex">
            <span class="material-symbols-outlined" style="font-size: 30px;">inventory_2</span>
            <h3 class="font-bold ml-2 text-lg">💥실시간 질문글</h3>
        </div>
<!--        실시간 질문글 본문-->
        <div class="mt-4">
<!--            질문글 박스-->
            <div class="container p-2">
                <h3 class="font-bold mb-2">블랙박스 배선 호환문의</h3>
                <p>니즈 x600 블랙박스와 파인뷰 TR20R 제품 배선이 호환 가능할까요?
                    오래된거라 둘다 모두 설명서도없고..</p>
                <div class="bg-grey">
                    답변 : 0
                </div>
            </div>
        </div>
    </div>
    
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->
<script type="text/javascript" src="assets/main.js"></script>
</body>
</html>