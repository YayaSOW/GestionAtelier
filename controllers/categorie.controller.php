<?php
require_once "../model/categorie.model.php";
require_once "../core/Controller.php";
class CategorieController extends Controller
{
    private CategorieModel $categorieModel;
    public function __construct()
    {
        parent::__construct();
        $this->categorieModel = new CategorieModel;
        $this->load();
    }
    private function load()
    {
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "liste-categorie") {
                $this->listerCategorie();
            } elseif ($_REQUEST["action"] == "save-categorie") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                $this->store($_REQUEST);
            } elseif ($_REQUEST["action"] == "supprimer-categorie") {
                var_dump($_REQUEST["id"]);
            } elseif ($_REQUEST["action"] == "modifier-categorie") {
                var_dump($_REQUEST);
            }
        } else {
            $this->listerCategorie();
        }
    }

    private function listerCategorie(): void
    {
        $this->renderView("categories/liste", ["categories" => $this->categorieModel->findAll()]);
    }
    private function store(array $categorie): void
    {
        $this->categorieModel->save($categorie);
        $this->redirectToRoute("controller=categorie&action=liste-categorie");
    }

    private function supprimer(int $id)
    {
        $this->categorieModel->delete($id);
        $this->redirectToRoute("controller=categorie&action=liste-categorie");
    }
}
?>