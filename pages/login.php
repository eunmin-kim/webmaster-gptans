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
    <title>Document</title>
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
                    <a href="#" class="text-md font-bold text-teal-600">전체글 보기</a>
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
                    <a href="<?php echo $_SERVER['REQUEST_URI'] ?>" class="text-md font-bold">로그인</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md font-bold">회원가입</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php \Utils\Asset::loadJs(); ?>
</body>
</html>