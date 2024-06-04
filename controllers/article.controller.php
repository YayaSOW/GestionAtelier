<?php
require_once "../model/article.model.php";
require_once "../model/type.model.php";
require_once "../model/categorie.model.php";
require_once "../core/Controller.php";

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
                $this->listerArticle();
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

    private function listerArticle(): void
    {
        // ob_start();
        // $articles = $this->articleModel->findAll();
        // extract($articles);
        // require_once "../views/articles/liste.html.php";
        // $contentView = ob_get_clean();
        // require_once "../views/layout/base.layout.php";
        $this->renderView("articles/liste", ["articles" => $this->articleModel->findAll()]);
    }

    private function chargerFormulaire(): void
    {
        // ob_start();
        // $types = $this->typeModel->findAll();
        // $categories = $this->categorieModel->findAll();
        // require_once "../views/articles/form.html.php";
        // $contentView = ob_get_clean();
        // require_once "../views/layout/base.layout.php";
        $this->renderView("articles/form", [
            "types" => $this->articleModel->findAll(),
            "categories" => $this->categorieModel->findAll(),
        ]);

    }

    private function store(array $articles): void
    {
        $this->articleModel->save($articles);
        $this->redirectToRoute("controller=article&action=liste-article");
    }
    private function change(int $id, array $articles)
    {
        $this->articleModel->update($id, $articles);
        $this->redirectToRoute("controller=article&action=liste-article");
    }

    private function supprimer(int $id)
    {
        $this->articleModel->delete($id);
        $this->redirectToRoute("controller=article&action=liste-article");
    }
}
?>