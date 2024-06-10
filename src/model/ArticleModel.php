<?php
namespace App\Models;

use App\Core\Model;

class ArticleModel extends Model
{
    public function __construct()
    {
        $this->ouvrirConnection();
        $this->table = "article";
    }

    public function findAll(): array
    {
        return $this->executeSelect("SELECT * FROM $this->table a, type t, categorie c WHERE a.typeId=t.id and a.categorieId=c.id");
    }

    public function save(array $article): int
    {
        extract($article);
        $sql = "INSERT INTO `article` (`libelle`, `qteStock`, `prixAppro`, `typeId`, `categorieId`) VALUES ('$libelle', '$qteStock', '$prixAppro', '$typeId', '$categorieId')";
        return $this->executeUpdate($sql);
    }

    public function findById(int $id): array
    {
        $sql = "SELECT a.*, c.nomCategorie, t.nomType
                    FROM article a
                    JOIN categorie c ON a.categorieId = c.id
                    JOIN type t ON a.typeId = t.id
                    WHERE a.id_article = '$id'";
        return $this->executeSelect($sql, true);
    }

    public function update(int $id, array $articles)
    {
        extract($articles);
        $sql = "UPDATE `article` SET `libelle` = '$libelle', `qteStock` = '$qteStock', `prixAppro` = '$prixAppro', `typeId` = '$typeId', `categorieId` = '$categorieId' WHERE `article`.`id_article` = '$id'";
        $this->executeUpdate($sql);
    }

    public function delete(int $id)
    {
        $this->executeUpdate("DELETE FROM article WHERE `article`.`id_article` = '$id'");
    }
}
?>