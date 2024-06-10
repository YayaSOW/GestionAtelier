<?php 
final class Autorisation
{
    //isConnect
    public static function isConnect():bool{
        return Session::get("userConnect")!=false;
    }

    //hasRole()
    public static function hasRole(string $roleName):bool{
        $userConnect=Session::get("userConnect");
        // var_dump($userConnect);
        // var_dump($_SESSION);
        if ($userConnect) {
            // var_dump($userConnect=["name"]==$roleName);
            return $userConnect=["name"]==$roleName;
        } 
        return false;
    }
}
