<?php

use App\Core\Session;
use App\Core\Autorisation;

function add_class_invalid(string $fieldName, string $mauvais = "block", string $bien = "hidden"): void
{
    echo isset(Session::get("errors")["$fieldName"]) ? "$mauvais" : "$bien";
}

function has_role(string $roleName): void
{
    echo !Autorisation::hasRole($roleName)? "hidden":"";
}

function dd(mixed $data)
{
    // var_dump($_SESSION);
    dump($data);
    die;
}

function dump(mixed $data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

?>