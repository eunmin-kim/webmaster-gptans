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
    <?php \Utils\Asset::loadCss(); ?>
    <title>G지식인</title>
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
                    <a href="<?php echo PageLoader::load(null,"login") ?>" class="text-md font-bold">로그인</a>
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
            <span class="material-symbols-outlined" style="font-size: 28px;">inventory_2</span>
            <h3 class="font-bold ml-2 text-xl">💥 실시간 질문글</h3>
        </div>
<!--        실시간 질문글 본문-->
        <div class="mt-4">
<!--            질문글 박스-->
            <a class="container p-4 border rounded mb-2" href="#" style="display: block">
                <h3 class="font-bold mb-1 text-xl">블랙박스 배선 호환문의</h3>
                <p class="font-light" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 20px;">
                    니즈 x600 블랙박스와 파인뷰 TR20R 제품 배선이 호환 가능할까요?
                    오래된거라 둘다 모두 설명서도없고..</p>
                <div class="mt-2 flex self-center">
                    <div class="flex self-center bg-black p-1 text-xs rounded justify-center text-white" style="width: 120px;">
                        <span class="material-symbols-outlined mr-1 text-md">account_circle</span>
                        <div class="self-center">작성자 : 닉네임</div>
                    </div>
                    <div class="ml-2 bg-green-500 p-2 text-white text-xs rounded self-center">
                        GPT 답변완료
                    </div>
                    <div class="ml-2 p-2 bg-sky-400 text-xs rounded self-center text-white">
                        답변 수 : 1
                    </div>
                </div>
            </a>
            <a class="container p-4 border rounded" href="#" style="display: block">
                <h3 class="font-bold mb-1 text-xl">임신 중 가슴이 너무 가려운데 어떻게 해야하나요?</h3>
                <p class="font-light" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 24px;">곧 출산 예정인 37주차 임산부입니다. 임신하고 몸 여기저기가 간지러운데, 다른데는 참을만한데 가슴 특히 유두부분이 너무 심하게 간지러워요. 너무 간지러워서 보면 유두부분에 각질처럼 생겨있고, 긁어서 피도 나는데 원래 임신하면 다들 그런건가요? 유두부분이 너무 가려워서, 나중에 모유수유를 못할까봐 걱정인데, 가슴이나 유두부분이 가려운건 대체 왜그런건가요?</p>
                <div class="mt-2 flex self-center">
                    <div class="flex self-center bg-black p-1 text-xs rounded justify-center text-white" style="width: 120px;">
                        <span class="material-symbols-outlined mr-1 text-md">account_circle</span>
                        <div class="self-center">작성자 : 닉네임</div>
                    </div>
                    <div class="ml-2 bg-green-500 p-2 text-white text-xs rounded self-center">
                        GPT 답변완료
                    </div>
                    <div class="ml-2 p-2 bg-sky-400 text-xs rounded self-center text-white">
                        답변 수 : 1
                    </div>
                </div>
            </a>
        </div>
    </div>
    
</div>
<?php \Utils\Asset::loadJs(); ?>
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>-->

</body>
</html>