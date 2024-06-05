<?php
require_once "../model/type.model.php";
require_once "../core/Controller.php";

class TypeController extends Controller
{
    private TypeModel $typeModel;
    public function __construct()
    {
        parent::__construct();
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
        $this->renderView("types/liste", ["types" => $this->typeModel->findAll()]);
    }
    private function store(array $types): void
    {
        $this->typeModel->save($types);
        $this->redirectToRoute("controller=type&action=liste-type");
    }
}
?>