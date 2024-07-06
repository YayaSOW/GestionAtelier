<?php
namespace App\Models;

use App\Core\Model;

class FournisseurModel extends Model
{
    public function __construct()
    {
        $this->ouvrirConnection();
        $this->table = "fournisseur";
    }

    // public function save(array $types): int
    // {
    //     extract($types);
    //     return $this->executeUpdate("INSERT INTO `type` (`nomType`) VALUES ('$nomType')");
    // }

    // public function delete(int $id)
    // {
    //     try {
    //         $sql = "DELETE FROM type WHERE `type`.`id` = :id";
    //         $stm = $this->pdo->prepare($sql);
    //         $stm->bindParam(':id', $id);
    //         $stm->execute();
    //     } catch (PDOException $e) {
    //         echo "Erreur de Connexion: " . $e->getMessage();
    //     }
    // }
}
?>