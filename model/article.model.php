<?php
require_once "../core/Model.php";
class ArticleModel extends Model
{
    public function __construct()
    {
        $this->ouvrirConnection();
    }

    public function findAll(): array
    {
     return $this->executeSelect("SELECT * FROM `article` a, type t, categorie c WHERE a.typeId=t.id and a.categorieId=c.id");
    }

    public function save(array $article):int
    {
        try {
            extract($article);
            $sql = "INSERT INTO `article` (`libelle`, `qteStock`, `prixAppro`, `typeId`, `categorieId`) VALUES ('$libelle', '$qteStock', '$prixAppro', '$typeId', '$categorieId')";
            return $this->pdo->exec($sql);
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }

    public function findById(int $id): array
    {
        try {
            $sql = "SELECT a.*, c.nomCategorie, t.nomType
                    FROM article a
                    JOIN categorie c ON a.categorieId = c.id
                    JOIN type t ON a.typeId = t.id  
                    WHERE a.id_article = :id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id', $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }

    public function update(int $id, array $articles)
    {
        try {
            extract($articles);
            $sql = "UPDATE `article` SET `libelle` = :libelle, `qteStock` = :qteStock, `prixAppro` = :prixAppro, `typeId` = :typeId, `categorieId` = :categorieId WHERE `article`.`id_article` = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':libelle', $libelle);
            $stmt->bindParam(':qteStock', $qteStock);
            $stmt->bindParam(':prixAppro', $prixAppro);
            $stmt->bindParam(':typeId', $typeId);
            $stmt->bindParam(':categorieId', $categorieId);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }

    public function delete(int $id)
    {
        try {
            $sql = "DELETE FROM article WHERE `article`.`id_article` = :id";
            $stm = $this->pdo->prepare($sql);
            $stm->bindParam(':id', $id);
            $stm->execute();
        } catch (PDOException $e) {
            echo "Erreur de Connexion: " . $e->getMessage();
        }
    }
}
?>