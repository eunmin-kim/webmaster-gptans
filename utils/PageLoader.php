<?php

namespace Utils;

class PageLoader
{
    public static function load(?string $path,string $pageName): string
    {
        if (isset($path) == false)
        {
            return "pages/{$pageName}.php";
        }
        return "pages/{$path}/{$pageName}.php";
    }
}