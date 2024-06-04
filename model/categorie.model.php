<?php
require_once "../core/Model.php";
class CategorieModel extends Model
{
    public function __construct()
    {
        $this->ouvrirConnection();
    }
    public function findAll(): array
    {
        return $this->executeSelect("SELECT * FROM categorie");
    }

    public function save(array $categorie):int
    {
        try {
            extract($categorie);
            $sql = "INSERT INTO `categorie` (`nomCategorie`) VALUES ('$nomCategorie')";
            return $this->pdo->exec($sql);
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }

    public function delete(int $id)
    {
        try {
            $sql = "DELETE FROM categorie WHERE `categorie`.`id` = :id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->execute();
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }
}
?>