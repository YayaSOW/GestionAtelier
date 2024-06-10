<?php
namespace App\Controllers;

use App\Core\Session;
use App\Core\Validator;
use App\Core\Controller;
use App\Models\TypeModel;
use App\Core\Autorisation;

class TypeController extends Controller
{
    private TypeModel $typeModel;
    public function __construct()
    {
        parent::__construct();
        if(!Autorisation::isConnect()){
            parent::redirectToRoute("controller=securite&action=show-form");
        }
        $this->typeModel = new TypeModel;
        $this->load();
    }
    private function load()
    {
        // $this->layout="base1";
        if (isset($_REQUEST["action"])) {
            if ($_REQUEST["action"] == "liste-type") {
                $this->listerType();
            } elseif ($_REQUEST["action"] == "save-type") {
                unset($_REQUEST["action"]);
                unset($_REQUEST["controller"]);
                // var_dump($_REQUEST);
                $this->store($_REQUEST);
            } elseif ($_REQUEST["action"] == "supprimer-type") {
                var_dump($_REQUEST);
                // supprimer(intval($_REQUEST["id"]));
            }
        } else {
            $this->listerType();
        }
    }

    private function listerType(): void
    {
        parent::renderView("types/liste", ["types" => $this->typeModel->findAll()]);
    }
    private function store(array $types): void
    {
        // Validation
        // 1-Obligatoire
        Validator::isEmpty($types["nomType"], "nomType", "Le Nom de Type est Obligatoire");
        if (Validator::isValid()) {
            // 1-unicite
            $type = $this->typeModel->findByName("nomType", $types["nomType"]);
            if ($type) {
                Validator::add("nomType", "Type existe deja");
                Session::add("errors", Validator::$errors);
            } else {
                $this->typeModel->save($types);
            }
        } else {
            Session::add("errors", Validator::$errors);
        }

        parent::redirectToRoute("controller=type&action=liste-type");
    }
}
?>