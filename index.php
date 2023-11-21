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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>G지식인</title>
</head>
<body>
<nav class="container mx-auto justify-center" style="width: 1200px;">
    <div class="container flex py-6 px-6 justify-between fluid" style="width:100%;">
        <div class="flex">
            <div class="font-bold text-lg color-white mr-4">
                <a href="/" class="text-2xl">G지식인 - with ChatGPT</a>
            </div>
            <ul class="ml-2 self-center flex">
                <li class="px-2">
                    <a href="#" class="text-md">질문하기</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md">답변하기</a>
                </li>
            </ul>
        </div>
        <div class="flex">
            <ul class="ml-2 self-center flex">
                <li class="px-2">
                    <a href="#" class="text-md">로그인</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md">회원가입</a>
                </li>
            </ul>
        </div>
    </div>

</nav>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->
<script type="text/javascript" src="assets/main.js"></script>
</body>
</html>