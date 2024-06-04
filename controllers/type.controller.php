<?php
require_once ("../model/type.model.php");

if (isset($_REQUEST["action"])) {
    if ($_REQUEST["action"] == "liste-type") {
        listerType();
    } elseif ($_REQUEST["action"] == "save-type") {
        unset($_REQUEST["action"]);
        unset($_REQUEST["controller"]);
        // var_dump($_REQUEST);
        storeType($_REQUEST);
    }elseif ($_REQUEST["action"] == "supprimer-type") {
        var_dump($_REQUEST);
        // supprimer(intval($_REQUEST["id"]));
    }
} else {

}

function listerType()
{
    ob_start();
    $types = findAllType();
    require_once ("../views/types/liste.html.php");
    $contentView=ob_get_clean();
    require_once ("../views/layout/base.layout.php");
}
function storeType(array $types)
{
    saveType($types);
    header("location:" . WEBROOT . "?controller=type&action=liste-type");
    exit;
}
?>