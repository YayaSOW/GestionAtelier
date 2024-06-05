<?php
require_once ("../model/article.model.php");
require_once ("../model/type.model.php");
require_once ("../model/categorie.model.php");

// Commencer le contrôle de sortie
// ob_start();
if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"] == "liste-article") {
        listerArticle();
    } elseif ($_REQUEST["action"] == "nouvelle-article") {
        chargerFormulaire();
    } elseif ($_REQUEST["action"] == "save-article") {
        unset($_REQUEST["action"]);
        unset($_REQUEST["btnSave"]);
        store($_REQUEST);
    } elseif ($_REQUEST["action"] == "modifier-article") {
        ob_start();
        // var_dump($_REQUEST);
        $types = findAllType();
        $categories = findAllCategorie();
        $article = findById(intval($_REQUEST["id"]));
        // var_dump($article);
        require_once ("../views/articles/update.html.php");
        $contentView = ob_get_clean();
        require_once ("../views/layout/base1.layout.php");
    
    } elseif ($_REQUEST["action"] == "valide-modification-article") {
        chargerFormulaire();
        $article = ["article" => $_REQUEST];
        extract($article);
        change(intval($article["id_article"]), $article);
    } elseif ($_REQUEST["action"] == "supprimer-article") {
        // var_dump($_REQUEST);
        supprimer(intval($_REQUEST["id"]));
    }
} else {
    listerArticle();
}

// Fin du contrôle de sortie
// ob_end_flush();

function listerArticle()
{
    ob_start();
    $articles = ["articles" => findAll()];
    extract($articles);
    require_once ("../views/articles/liste.html.php");
    $contentView = ob_get_clean();
    require_once ("../views/layout/base.layout.php");
}

function chargerFormulaire()
{
    ob_start();
    $types = findAllType();
    $categories = findAllCategorie();
    require_once ("../views/articles/form.html.php");
    $contentView = ob_get_clean();
    require_once ("../views/layout/base.layout.php");

}

function store(array $articles)
{
    save($articles);
    header("location:" . WEBROOT . "?controller=article&action=liste-article");
    exit;
}
function change(int $id, array $articles)
{
    update($id, $articles);
    // header("location:" . WEBROOT . "?controller=article&action=liste-article");
    // exit;
}

function supprimer(int $id)
{
    delete($id);
    header("location:" . WEBROOT . "?controller=article&action=liste-article");
    exit;
}

?>