<?php
require "../vendor/autoload.php";
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php echo \Utils\Asset::loadCss(); ?>
    <title>블랙박스 배선 호환문의 - G지식인</title>
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
                    <a href="<?php echo \Utils\PageLoader::load(null,'ask') ?>" class="text-md font-bold hover:text-teal-600">질문하기</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md font-bold hover:text-teal-600">답변하기</a>
                </li>
            </ul>
        </div>
        <div class="flex">
            <ul class="ml-2 self-center flex">
                <li class="px-2">
                    <a href="<?php echo $_SERVER['REQUEST_URI'] ?>" class="text-md font-bold hover:text-teal-600">로그인</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mx-auto bg-white rounded mt-4 p-4" style="width: 800px;">
    <span class="bg-gray-500 p-1 text-white text-center rounded font-bold text-xl" style="">질문</span> <h2 class="text-xl font-bold" style="display: inline">블랙박스 배선 호환문의</h2>
    <p class="mt-4">니즈 x600 블랙박스와 파인뷰 TR20R 제품 배선이 호환 가능할까요? 오래된거라 둘다 모두 설명서도없고..</p>
</div>
<div class="container mx-auto bg-white rounded mt-4 p-4" style="width: 800px;">
    <span class="p-1 text-white text-center rounded font-bold text-xl px-2 bg-lime-500" style="">GPT 답변</span>
    <p class="mt-4">fdsadfsadfafsd</p>
</div>
<!--TODO:// 답변은 반복-->
<div class="container mx-auto bg-white rounded mt-4 p-4" style="width: 800px;">
    <span class="p-1 text-white text-center rounded font-bold text-xl px-2 bg-cyan-800" style="">User의 답변</span>
    <span class="p-1 text-white text-center rounded font-bold text-xl px-2 bg-rose-700" style="">채택</span>
    <p class="mt-4">fdsadfsadfafsd</p>
</div>
<div class="container mx-auto bg-white rounded mt-4 p-4" style="width: 800px;">
    <span class="p-1 text-white text-center rounded font-bold text-xl px-2 bg-cyan-800" style="">User2의 답변</span>
    <p class="mt-4">fdsadfsadfafsd</p>
</div>

<!--TODO: 페이지네이션 추가-->
<?php echo \Utils\Asset::loadJs(); ?>
</body>
</html>
