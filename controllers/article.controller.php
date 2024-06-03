<?php
require_once ("../model/article.model.php");
require_once ("../model/type.model.php");
require_once ("../model/categorie.model.php");

// Commencer le contrôle de sortie
ob_start();

if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"] == "liste-article") {
        listerArticle();
    } elseif ($_REQUEST["action"] == "nouvelle-article") {
        chargerFormulaire();
    } elseif ($_REQUEST["action"] == "save-article") {
        unset($_REQUEST["action"]);
        unset($_REQUEST["btnSave"]);
        store($_REQUEST);
        header("location:" . WEBROOT . "?controller=article&action=liste-article");
        exit;
    } elseif ($_REQUEST["action"] == "modifier-article") {
        // var_dump($_REQUEST);
        $types = findAllType();
        $categories = findAllCategorie();
        $article = findById(intval($_REQUEST["id"]));
        // var_dump($article);
        require_once ("../views/articles/update.html.php");
    } elseif ($_REQUEST["action"] == "valide-modification-article") {
        chargerFormulaire();
        $article=["article"=>$_REQUEST];
        extract($article);
        // var_dump($article["id_article"]);
        change(intval($article["id_article"]), $article);
        header("location:" . WEBROOT . "?controller=article&action=liste-article");
        exit;
    } elseif ($_REQUEST["action"] == "supprimer-article") {
        supprimer(intval($_REQUEST["id"]));
        header("location:" . WEBROOT . "?controller=article&action=liste-article");
        exit;
    }
} else {
    listerArticle();
}

// Fin du contrôle de sortie
ob_end_flush();

function listerArticle()
{
    $articles = ["articles" => findAll()];
    extract($articles);
    require_once ("../views/articles/liste.html.php");
}

function chargerFormulaire()
{
    $types = findAllType();
    $categories = findAllCategorie();
    require_once ("../views/articles/form.html.php");
}

function store(array $articles)
{
    save($articles);
}

function supprimer(int $id)
{
    delete($id);
}

function change(int $id, array $articles)
{
    update($id, $articles);
}
?>
