<?php
require "../vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'].'/session_manager.php';
$isLoggedIn = isset($_SESSION['kakao_id']);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<?php echo \Utils\Asset::loadCss(); ?>
    <title>G식인 - 질문하기</title>
</head>
<body>
<?php
if ($isLoggedIn == false)
{
    echo "<script>alert('로그인 회원만 이용 가능합니다.')</script>";
    header('Location: http://localhost:2222');
}
?>
<nav class="justify-center bg-white" style="width: 100% !important;">
    <div class="container flex p-6 justify-between rounded-lg mx-auto" style="width:1200px;">
        <div class="flex self-base">
            <div class="font-bold text-lg color-white mr-4">
                <a href="/" class="text-2xl">G지식인 - with ChatGPT</a>
            </div>
            <ul class="ml-2 self-center flex" style="margin-top: 5px;">
                <li class="px-2">
                    <a href="#" class="text-md font-bold hover:text-teal-600">전체글 보기</a>
                </li>
                <li class="px-2">
                    <a href="#" class="text-md font-bold text-teal-600">질문하기</a>
                </li>
            </ul>
        </div>
        <div class="flex">
            <ul class="ml-2 self-center flex">
                <li class="px-2">
                    <?php
                    if ($isLoggedIn == true)
                    {
                        echo "<a>로그인 되었습니다.</a>";
                    }
                    else
                    {
                        echo '<a href="'.PageLoader::load(null,"login").'" class="text-md font-bold">로그인</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mx-auto" style="width: 800px;">
    <form class="container mx-auto bg-white mt-8 p-4 rounded-lg" action="/pages/posts/save_question.php" method="post">
        <label for="question_title" class="font-bold text-lg" style="">
            제목
        </label>
        <br>
        <input type="text" name="question_title" class="bg-gray-100 p-1 rounded mt-1" style="width: 100%;" placeholder="질문 제목을 입력해주세요." required>
        <br>
        <br>
        <label for="question_story" class="font-bold text-lg" style="">
            내용
        </label>
        <br>
        <textarea name="question_story" class="bg-gray-100 p-1 rounded mt-1" placeholder="질문 내용을 입력해주세요." style="width: 100%;height: 100px;resize:none;" /></textarea>
        <button type="submit" class="p-2 mt-2 bg-sky-500 text-white rounded" style="width: 100%">
            작성하기
        </button>
    </form>
</div>
<?php echo \Utils\Asset::loadJs(); ?>
</body>
</html>