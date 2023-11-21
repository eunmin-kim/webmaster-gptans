<?php
namespace Utils;

define("ASSET_PATH",$_SERVER['DOCUMENT_ROOT']."assets/");

class Asset
{
    private static string $ASSET_PATH;

    public static function loadCss(): void
    {
//        TODO: 배포시 https로 변경
        self::$ASSET_PATH = "http://".$_SERVER['HTTP_HOST']."/assets/";
        echo '<link rel="stylesheet" type="text/css" href= "'.self::$ASSET_PATH.'style.css">'.PHP_EOL;
        echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />'.PHP_EOL;
        echo '<script src="https://cdn.tailwindcss.com"></script>';
    }

    public static function loadJs(): void
    {
        echo '<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>'.PHP_EOL;
        echo '<script type="text/javascript" src="'.self::$ASSET_PATH.'main.js"></script>';
    }
}