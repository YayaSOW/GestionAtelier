<?php
namespace App\Core;

use App\Controllers\TypeController;
use App\Controllers\ArticleController;
use App\Controllers\SecuriteController;
use App\Controllers\CategorieController;

class Router
{
    public static function run()
    {
        if (isset($_REQUEST["controller"])) {
            if ($_REQUEST["controller"] == "article") {
                $controller = new ArticleController();
            } elseif ($_REQUEST["controller"] == "type") {
                $controller = new TypeController();
            } elseif ($_REQUEST["controller"] == "categorie") {
                $controller = new CategorieController();
            }elseif ($_REQUEST["controller"] == "securite") {
                $controller = new SecuriteController();
            }
        } else {
            $controller = new SecuriteController();
    }
    }
}
?>