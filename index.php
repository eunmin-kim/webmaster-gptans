<?php
require "vendor/autoload.php";

session_start();
?>

<h1> 메인 페이지 입니다. </h1>

<a href="<?php echo \Utils\PageLoader::load(null,"login") ?>">dd</a>