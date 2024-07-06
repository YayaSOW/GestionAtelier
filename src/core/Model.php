<?php
namespace App\Core;

class Model
{
    protected \PDO|null $pdo=null;
    protected $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    protected $username = "root";
    protected $password = "";
    protected string $table;
    protected string $colonne="id";
    public function ouvrirConnection():void
    {
        //Connecter a la BD
        try {
            if ($this->pdo==null) {
                $this->pdo = new \PDO($this->dsn, $this->username, $this->password);
            }
        } catch (\PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }

    public function fermerConnection():void
    {
        try {
            if ($this->pdo!=null) {
                $this->pdo = null;
            }
        } catch (\PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }

    // select , find
    protected function executeSelect(string $sql, bool $fetch=false ):array|false{
        try {
            $stm = $this->pdo->query($sql);
            return $fetch? $stm->fetch(\PDO::FETCH_ASSOC): $stm->fetchAll(\PDO::FETCH_ASSOC)  ;
        } catch (\PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }

    // insert(save),update,delete
    public function executeUpdate(string $sql):int|null
    {
        try {
            return $this->pdo->exec($sql);
        } catch (\PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
            return null;
        }
    }

    public function findAll(): array
    {
        return $this->executeSelect("SELECT * FROM $this->table");
    }

    public function getById(int $id): array
    {
        return $this->executeSelect("SELECT * FROM $this->table where $this->colonne=$id",true);
    }

    public function findByName(string $nameColonne,string $value): array|false
    {
        return $this->executeSelect("SELECT * FROM $this->table where $nameColonne like '$value'", true);
    }
}

?>