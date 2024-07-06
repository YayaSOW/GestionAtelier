<?php
namespace App\Core;

use App\Api\TypeController as ApiTypeController;
use App\Controllers\TypeController;
use App\Controllers\ArticleController;
use App\Controllers\ApprovisionnementController;
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
            }elseif ($_REQUEST["controller"] == "appro") {
                $controller = new ApprovisionnementController();
            }elseif ($_REQUEST["controller"] == "api-type") {
                $controller = new ApiTypeController();
            }
        } else {
            $controller = new SecuriteController();
    }
    }
}
?>