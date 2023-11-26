<?php

use Utils\PageLoader;

require "../vendor/autoload.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php \Utils\Asset::loadCss(); ?>
    <title>로그인 - G지식인</title>
</head>
<body>
<nav class="justify-center bg-white" style="width: 100% !important;">
    <div class="container flex p-6 justify-between rounded-lg mx-auto" style="width:1200px;">
        <div class="flex self-base">
            <div class="font-bold text-lg color-white mr-4">
                <a href="/" class="text-2xl">G지식인 - with ChatGPT</a>
            </div>
            <ul class="ml-2 self-center flex" style="margin-top: 5px;">
                <li class="px-2">
                    <a href="/" class="text-md font-bold hover:text-teal-600">전체글 보기</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md font-bold hover:text-teal-600">질문하기</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md font-bold hover:text-teal-600">답변하기</a>
                </li>
            </ul>
        </div>
        <div class="flex">
            <ul class="ml-2 self-center flex">
                <li class="px-2">
                    <a href="<?php echo $_SERVER['REQUEST_URI'] ?>" class="text-md font-bold text-teal-600">로그인</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mx-auto" style="width: 1200px;">
    <div class="container mx-auto mt-8 bg-white p-4 rounded-lg" style="width:500px;">
        <h2 class="font-bold text-xl">카카오 로그인</h2>
        <p class="font-light text-sm">현재 카카오 로그인만 지원 됩니다.</p>
        <a class="font-bold p-2 rounded-lg text-center mt-4" style="background-color: #FEE500; display: block;">카카오 로그인</a>
    </div>
</div>
<?php \Utils\Asset::loadJs(); ?>
</body>
</html>