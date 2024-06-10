<?php
namespace App\Core;
class Validator{
    public static array $errors = [];

    public static function isValid():bool{
        return count(self::$errors)==0;
    }

    public static function add(string $key, mixed $data) {
        self::$errors[$key]=$data;
    }
    // Regle de Validation
        // obligatoire
    public static function isEmpty (string $valueField,string $nameField,string $message="Champ est obligatoire"):bool{
        if (empty($valueField)) {
            self::$errors[$nameField]=$message;
            return true;
        }
        return false;
    }
        // email
        public static function isEmail (string $valueField,string $nameField,string $message="Champ est obligatoire"){
            if (!filter_var($valueField, FILTER_VALIDATE_EMAIL)) {
                self::$errors[$nameField]=$message;
            }
        }
        // tel
}
?>