<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\TypeModel;
use App\Models\ArticleModel;
use App\Models\CategorieModel;

class ArticleController extends Controller
{
    private ArticleModel $articleModel;
    private TypeModel $typeModel;
    private CategorieModel $categorieModel;
    public function __construct()
    {
        parent::__construct();
        $this->articleModel = new ArticleModel;
        $this->typeModel = new TypeModel;
        $this->categorieModel = new CategorieModel;
        $this->load();
    }
    private function load()
    {
        ob_start();
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "liste-article") {
                $this->listerArticle($_REQUEST["page"]);
            } elseif ($_REQUEST["action"] == "nouvelle-article") {
                $this->chargerFormulaire();
            } elseif ($_REQUEST["action"] == "save-article") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["btnSave"]);
                $this->store($_REQUEST);
            } elseif ($_REQUEST["action"] == "modifier-article") {
                ob_start();
                $article = $this->articleModel->findById(intval($_REQUEST["id"]));
                $types = $this->typeModel->findAll();
                $categories = $this->categorieModel->findAll();
                require_once "../views/articles/update.html.php";
                $contentView = ob_get_clean();
                require_once "../views/layout/base.layout.php";
            } elseif ($_REQUEST["action"] == "valide-modification-article") {
                $this->chargerFormulaire();
                $article = ["article" => $_REQUEST];
                extract($article);
                $this->change(intval($article["id_article"]), $article);
            } elseif ($_REQUEST["action"] == "supprimer-article") {
                $this->supprimer(intval($_REQUEST["id"]));
            }
        } else {
            $this->listerArticle();
        }
        ob_end_flush();
    }

    private function listerArticle(int $page=0): void
    {
        parent::renderView("articles/liste", [
            "response" => $this->articleModel->findAll($page, OFFSET),
            "currentPage" => $page
        ]);
    }

    private function chargerFormulaire(): void
    {
        parent::renderView("articles/form", [
            "types" => $this->typeModel->findAll(),
            "categories" => $this->categorieModel->findAll(),
        ]);

    }

    private function store(array $articles): void
    {
        $this->articleModel->save($articles);
        parent::redirectToRoute("controller=article&action=liste-article&page=0");
    }
    private function change(int $id, array $articles)
    {
        $this->articleModel->update($id, $articles);
        parent::redirectToRoute("controller=article&action=liste-article&page=0");
    }

    private function supprimer(int $id)
    {
        $this->articleModel->delete($id);
        parent::redirectToRoute("controller=article&action=liste-article&page=0");
    }
}
?>