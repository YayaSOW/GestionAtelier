<?php
require_once "../model/user.model.php";
require_once "../core/Controller.php";

class SecuriteController extends Controller
{
    private UserModel $userModel;
    public function __construct()
    {
        parent::__construct();
        $this->userModel = new UserModel;
        // parent::$layout="connexion";
        $this->layout="connexion";
        $this->load();
    }

    private function load()
    {
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "connexion") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                $this->connexion($_REQUEST);
            } elseif ($_REQUEST["action"] == "show-form") {
                $this->showForm();
            } elseif ($_REQUEST["action"] == "logout") {
                $this->logout();
            }
        }else{
            $this->showForm();
        }
    }

    private function logout() : void {
        Session::fermer();
        parent::redirectToRoute("controller=securite&action=show-form");
    }
    private function showForm() : void {
        parent::renderView("securite/form");
    }
    private function connexion(array $data) : void {
        if(!Validator::isEmpty($data["login"], "login", "Le Login est Obligatoire")){
            Validator::isEmail($data["login"], "login","Le champ doit etre un Email");
        }
        Validator::isEmpty($data["password"], "password", "Le Password est Obligatoire");
        if (Validator::isValid()) {
            $userConnect=$this->userModel->findByLoginAndPassword($data["login"],$data["password"]);
            if ($userConnect) {
                Session::add("userConnect",$userConnect);
                parent::redirectToRoute("controller=article&action=liste-article");
            }else {
                Validator::add("erreur_connection", "Utilisateur introuvable");
                Session::add("errors", Validator::$errors);
            }
        }else {
            Session::add("errors", Validator::$errors);
        }
        parent::redirectToRoute("controller=securite&action=show-form");
    }
}