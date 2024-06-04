<?php
require_once "../core/Model.php";

class TypeModel extends Model
{
    public function __construct()
    {
        $this->ouvrirConnection();
    }
    public function findAll(): array
    {
        return $this->executeSelect("SELECT * FROM type");
    }

    public function save(array $types): int
    {
        try {
            extract($types);
            $sql = "INSERT INTO `type` (`nomType`) VALUES ('$nomType')";
            return $this->pdo->exec($sql);
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }

    public function delete(int $id)
    {
        try {
            $sql = "DELETE FROM type WHERE `type`.`id` = :id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->execute();
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }
}
?>