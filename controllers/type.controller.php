<?php
require_once("../model/type.model.php");

if (isset($_REQUEST["action"])) {
    if($_REQUEST["action"]=="liste-type"){
        listerType();
    }elseif ($_REQUEST["action"]=="save-type") {
        unset($_REQUEST["action"]);
        unset($_REQUEST["controller"]);
        // var_dump($_REQUEST);
        storeType($_REQUEST);
        header("location:".WEBROOT."?controller=type&action=liste-type");
        exit;
    }
}else {
    
}

function listerType() {
    $types = findAllType();
    require_once("../views/types/liste.html.php");
}
function storeType(array $types) {
    saveType($types);
}
?>