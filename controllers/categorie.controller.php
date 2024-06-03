<?php
require_once("../model/categorie.model.php");

if (isset($_REQUEST["action"])) {
    if($_REQUEST["action"]=="liste-categorie"){
        listerCategorie();
    }elseif ($_REQUEST["action"]=="save-categorie") {
        unset($_REQUEST["action"]);
        unset($_REQUEST["controller"]);
        // var_dump($_REQUEST);
        storeCategorie($_REQUEST);
        header("location:".WEBROOT."?controller=categorie&action=liste-categorie");
        exit;
    }
}else {
    
}

function listerCategorie() {
    $categories = findAllCategorie();
    require_once("../views/categories/liste.html.php");
}
function storeCategorie(array $categorie) {
    saveCategorie($categorie);
}
?>