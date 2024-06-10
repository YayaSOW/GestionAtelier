<?php
require_once "../model/categorie.model.php";
require_once "../core/Controller.php";
class CategorieController extends Controller
{
    private CategorieModel $categorieModel;
    public function __construct()
    {
        parent::__construct();
        if(!Autorisation::isConnect()){
            parent::redirectToRoute("controller=securite&action=show-form");
        }
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
        parent::renderView("categories/liste", ["categories" => $this->categorieModel->findAll()]);
    }
    private function store(array $categories): void
    {
        // Validation
        // 1-Obligatoire

        Validator::isEmpty($categories["nomCategorie"], "nomCategorie", "Le Nom du Categorie est Obligatoire");
        if (Validator::isValid()) {
            // 1-unicite
            $categorie = $this->categorieModel->findByName("nomCategorie", $categories["nomCategorie"]);
            if ($categorie) {
                Validator::add("nomCategorie", "Cette Categorie existe deja");
                Session::add("errors", Validator::$errors);
            } else {
                $this->categorieModel->save($categories);
            }
        } else {
            Session::add("errors", Validator::$errors);
        }
        parent::redirectToRoute("controller=categorie&action=liste-categorie");
    }

    private function supprimer(int $id)
    {
        $this->categorieModel->delete($id);
        parent::redirectToRoute("controller=categorie&action=liste-categorie");
    }
}
?>