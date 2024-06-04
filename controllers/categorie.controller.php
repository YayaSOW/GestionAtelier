<?php
require_once ("../model/categorie.model.php");

if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"] == "liste-categorie") {
        listerCategorie();
    } elseif ($_REQUEST["action"] == "save-categorie") {
        unset($_REQUEST["action"]);
        unset($_REQUEST["controller"]);
        // var_dump($_REQUEST);
        storeCategorie($_REQUEST);
    } elseif ($_REQUEST["action"] == "supprimer-categorie") {
        var_dump($_REQUEST["id"]);
        // echo "cool";
    }elseif ($_REQUEST["action"]=="modifier-categorie") {
        var_dump($_REQUEST);
    }
} else {
}

function listerCategorie()
{
    ob_start();
    $categories = findAllCategorie();
    require_once ("../views/categories/liste.html.php");
    $contentView = ob_get_clean();
    require_once ("../views/layout/base.layout.php");
}
function storeCategorie(array $categorie)
{
    saveCategorie($categorie);
    header("location:" . WEBROOT . "?controller=categorie&action=liste-categorie");
    exit;
}

function supprimerCategorie(int $id)
{
    deleteCategorie($id);
    header("location:" . WEBROOT . "?controller=categorie&action=liste-categorie");
    exit;
}
?>