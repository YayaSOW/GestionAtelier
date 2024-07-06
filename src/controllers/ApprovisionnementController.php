<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\FournisseurModel;
use App\Models\PanierModel;
use App\Models\ArticleModel;
use App\Models\ApproModel;
use App\Core\Session;

class ApprovisionnementController extends Controller
{
    private ArticleModel $articleModel;
    private FournisseurModel $fournisseurModel;
    private ApproModel $approModel;
    public function __construct()
    {
        parent::__construct();
        $this->articleModel = new ArticleModel;
        $this->fournisseurModel = new FournisseurModel;
        $this->approModel = new ApproModel;
        $this->load();
    }
    private function load()
    {
        ob_start();
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "liste-appro") {
                $this->listerAppro();
            } elseif ($_REQUEST["action"] == "nouvelle-appro") {
                $this->chargerFormulaire();
            } elseif ($_REQUEST["action"] == "add-article") {
                $this->ajouterArticleDansAppro($_REQUEST);
            }  elseif ($_REQUEST["action"] == "add-appro") {
                $this->ajouterAppro();
            } 
        } else {
            $this->listerAppro();
        }
        ob_end_flush();
    }

    private function listerAppro(): void
    {
        parent::renderView("appros/liste", [
            "appros" => $this->approModel->findAll()
        ]);
    }

    private function chargerFormulaire(): void
    {
        parent::renderView("appros/form", [
            "fournisseurs" => $this->fournisseurModel->findAll(),
            "response" => $this->articleModel->findAll()
        ]);

    }

    private function ajouterArticleDansAppro(array $data): void
    {
        if (Session::get("panier")==false) {
            $panier=new PanierModel();
        }else{
            $panier=Session::get("panier");
        }
        $panier->addArticle($this->articleModel->getById($data["articleId"]),$data["fournisseurId"],$data["qteAppro"]);
        Session::add("panier",$panier);
        // dd(Session::get("panier"));
        parent::redirectToRoute("controller=appro&action=nouvelle-appro");
    }

    private function ajouterAppro(): void
    {
        $panier=Session::get("panier");
        $this->approModel->save($panier);
        // $panier->clear();
        Session::remove("panier");
        parent::redirectToRoute("controller=appro&action=liste-appro");
    }
}
?>