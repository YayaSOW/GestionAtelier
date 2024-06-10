<?php
class Session{

    // 1-Ouvrir session
    public static function ouvrir() {
        if (session_status()==PHP_SESSION_NONE) {
            session_start(); // $_SESSION
        }
    }

    // Ajouter des données dans la session
    public static function add(string $key, mixed $data) {
        $_SESSION[$key]=$data;
    }

    // supprimer des données de la session
    public static function remove(string $key):bool {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
    // Recuperer une valeur dans la session
    public static function get(string $key):mixed {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }
    // 2- Fermer la session
    public static function fermer() {
        // 1- Detruire les donnee de la session
        unset($_SESSION["userConnect"]);
        session_destroy();
    }

}
?>