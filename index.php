<?php
require "vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'].'/session_manager.php';
use Utils\PageLoader;
use Database\DB;
$isLoggedIn = isset($_SESSION['kakao_id']);
$db = new DB();



// 한 페이지 당 데이터 개수
$list_num = 6;
$page_num = 6;
$page = isset($_GET['page'])?$_GET['page']:1;

$start = ($page - 1) * $list_num;
$sql = "select * from questions inner join users on questions.user_id where kakao_nickname != 'GPT' order by questions.q_id desc;";
$posts_query = $db->query($sql);
$cnt = $start;
$sql2 = "SELECT * FROM questions;";
$total = $db->query($sql2);
$total_row = mysqli_fetch_array($total);


$num = ($total_row) == null ? 0 : count($total_row);
$total_page = ceil($num/ $list_num);
$total_block = ceil($total_page/$page_num);
$now_block = ceil($page / $page_num);
$s_page_num = ($now_block - 1) * $page_num + 1;
// 데이터가 0개인 경우
if($s_page_num <= 0){
    $s_page_num = 1;
};

/* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
$e_pageNum = $now_block * $page_num;
// 마지막 번호가 전체 페이지 수를 넘지 않도록
if($e_pageNum > $total_page){
    $e_pageNum = $total_page;
};
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
                    <a href="<?php echo PageLoader::load(null,'ask') ?>" class="text-md font-bold hover:text-teal-600">질문하기</a>
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
<!--            <a class="container p-4 border rounded mb-2" href="--><?php //echo PageLoader::load(null,'read') ?><!--" style="display: block">-->
<!--                <h3 class="font-bold mb-1 text-xl">블랙박스 배선 호환문의</h3>-->
<!--                <p class="font-light" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 20px;">-->
<!--                    니즈 x600 블랙박스와 파인뷰 TR20R 제품 배선이 호환 가능할까요?-->
<!--                    오래된거라 둘다 모두 설명서도없고..</p>-->
<!--                <div class="mt-2 flex self-center">-->
<!--                    <div class="flex self-center bg-black p-1 text-xs rounded justify-center text-white" style="width: 120px;">-->
<!--                        <span class="material-symbols-outlined mr-1 text-md">account_circle</span>-->
<!--                        <div class="self-center">작성자 : 닉네임</div>-->
<!--                    </div>-->
<!--                    <div class="ml-2 bg-green-500 p-2 text-white text-xs rounded self-center">-->
<!--                        GPT 답변완료-->
<!--                    </div>-->
<!--                    <div class="ml-2 p-2 bg-sky-400 text-xs rounded self-center text-white">-->
<!--                        답변 수 : 1-->
<!--                    </div>-->
<!--                </div>-->
<!--            </a>-->
            <?php
                while ($arr = mysqli_fetch_assoc($posts_query))
                {
                    $sql3 = "select count(*) as count from questions inner join users on questions.user_id = users.user_id left join answers a on questions.q_id = a.q_id where questions.q_id = ".$arr['q_id']." order by questions.q_id desc;";
                    $answerQuery = $db->query($sql3);
                    while ($aaa = mysqli_fetch_assoc($answerQuery))
                    {
            ?>
            <a class="container p-4 border rounded mb-2" href="pages/read.php?page=<?php echo $arr['q_id'] ?>" style="display: block">
                <h3 class="font-bold mb-1 text-xl"><?php echo $arr['q_title']; ?></h3>
                <p class="font-light" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 20px;">
                    <?php
                        echo $arr['q_story'];
                    ?></p>
                <div class="mt-2 flex self-center">
                    <div class="flex self-center bg-black p-1 text-xs rounded justify-center text-white" style="width: 120px;">
                        <span class="material-symbols-outlined mr-1 text-md">account_circle</span>
                        <div class="self-center">작성자 : <?php echo $arr['kakao_nickname'] ?></div>
                    </div>
                    <div class="ml-2 bg-green-500 p-2 text-white text-xs rounded self-center">
                        GPT 답변완료
                    </div>
                    <div class="ml-2 p-2 bg-sky-400 text-xs rounded self-center text-white">
                        답변 수 : <?php echo ($aaa['count'])? $aaa['count']: 0 ?>
                    </div>
                </div>
                <?php }
                }
            ?>
            </a>
        </div>
        <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
            <div class="flex flex-1 justify-between sm:hidden">
                <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
                <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
            </div>
            <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>

                </div>
                <div>
                    <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">

                        <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
<!--                        <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>-->
<!--                        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>-->
<!--                        <a href="#" class="relative hidden items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 md:inline-flex">3</a>-->
                        <?php
                        if ($page <= 1) {
                            ?>
                            <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php } else { ?>
                            <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                <span class="sr-only">Previous</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                </svg>
                            </a>
                        <?php };?>
                        <?php
                        for($print_page = $s_page_num; $print_page < $e_pageNum; $print_page++){
                            ?>
                            <a class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0" href="index.php?page=<?php echo $print_page; ?>"><?php echo $print_page; ?></a>
                        <?php };?>
                       <?php

                       if ($page >= $total_page) {
                           ?>
                        <a href="index.php?page=<?php echo $total_page; ?>" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                            <span class="sr-only">Next</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                            </svg>
                        </a>
                       <?php } else { ?>
                           <a href="index.php?page=<?php echo ($page+1); ?>" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                               <span class="sr-only">Next</span>
                               <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                   <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                               </svg>
                           </a>
                       <?php }?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
</div>
<?php \Utils\Asset::loadJs(); ?>
</body>
</html>