<?php
if (isset($_REQUEST["controller"])) {
    if ($_REQUEST["controller"] == "article") {
        require_once ("../controllers/article.controller.php");
    } elseif ($_REQUEST["controller"] == "type") {
        require_once ("../controllers/type.controller.php");
    } elseif ($_REQUEST["controller"] == "categorie") {
        require_once ("../controllers/categorie.controller.php");
    }
} else {
    require_once ("../controllers/article.controller.php");

}

?>