<?php
namespace App\Models;

use App\Core\Model;
use App\Core\Session; 

class ApproModel extends Model
{
    public function __construct()
    {
        $this->ouvrirConnection();
        $this->table = "appro";
    }

    public function findAll(): array
    {
        return $this->executeSelect("SELECT * FROM fournisseur f,$this->table a WHERE a.fournisseurId=f.id ");
    } 

    public function save(PanierModel $panier): int
    {
        $date = new \DateTime();
        $date = $date->format('Y-m-d');
        $userId =Session::get('userConnect')["id"];
        $this->executeUpdate("INSERT INTO `appro` (`date`, `montant`, `fournisseurId`, `userId`) VALUES ('$date', $panier->total, $panier->fournisseur, $userId);");
        $approId= $this->pdo->lastInsertId();
        foreach ($panier->articles as $article) {
            // dd($article);
            $qteAppro = $article["qteAppro"];
            $qteStock= $article["qteStock"];
            $idArticle = $article["id_article"];
            $montantArticle = $article["montantArticle"];
            $this->executeUpdate("INSERT INTO `detail` (`qteAppro`, `articleId`, `approId`, `montant`) VALUES ('$qteAppro', '$idArticle', '$approId', '$montantArticle');");
            $this->executeUpdate("UPDATE `article` SET `qteStock` = $qteStock+$qteAppro WHERE `article`.`id_article` = '$idArticle';");
        }
        return 1;
    }

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