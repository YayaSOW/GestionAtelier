<?php
require_once "../core/Model.php";
class UserModel extends Model
{
    public function __construct()
    {
        $this->ouvrirConnection();
        $this->table = "user";
    }

    public function findByLoginAndPassword(string $login,string $password): array|false
    {
        return $this->executeSelect("SELECT * FROM $this->table u,role r where u.roleId=r.id and u.login like '$login' and u.password like '$password'",true);
    }

}