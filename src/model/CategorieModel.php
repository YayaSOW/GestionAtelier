<?php
namespace App\Models;

use App\Core\Model;
class CategorieModel extends Model
{
    public function __construct()
    {
        $this->ouvrirConnection();
        $this->table = "categorie";
    }

    public function save(array $categorie): int
    {
        extract($categorie);
        return $this->executeUpdate("INSERT INTO `categorie` (`nomCategorie`) VALUES ('$nomCategorie')");
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