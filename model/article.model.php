<?php

function findAll(): array
{
    //Connecter a la BD
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        $sql = "SELECT * FROM `article` a, type t, categorie c WHERE a.typeId=t.id and a.categorieId=c.id";
        $stm = $dbn->query($sql);
        // var_dump($stm->fetchAll(PDO::FETCH_ASSOC));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}

function save(array $articles)
{
    //Connecter a la BD
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    extract($articles);
    // var_dump($articles);
    // var_dump($libelle);
    try {
        $dbn = new PDO($dsn, $username, $password);
        $sql = "INSERT INTO `article` (`libelle`, `qteStock`, `prixAppro`, `typeId`, `categorieId`) VALUES (:libelle, :qteStock, :prixAppro, :typeId, :categorieId)";
        $stm = $dbn->prepare($sql);
        $stm->bindParam(':libelle', $libelle);
        $stm->bindParam(':qteStock', $qteStock);
        $stm->bindParam(':prixAppro', $prixAppro);
        $stm->bindParam(':typeId', $typeId);
        $stm->bindParam(':categorieId', $categorieId);
        $stm->execute();
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}

function findById(int $id): array
{
    //Connecter a la BD
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        $sql = "SELECT a.*, c.nomCategorie, t.nomType
                    FROM article a
                    JOIN categorie c ON a.categorieId = c.id
                    JOIN type t ON a.typeId = t.id  
                    WHERE a.id_article = :id";
        $stm = $dbn->prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}

function update(int $id, array $articles)
{
    //Connecter a la BD
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        extract($articles);
        // var_dump($articles);
        $sql = "UPDATE `article` SET `libelle` = :libelle, `qteStock` = :qteStock, `prixAppro` = :prixAppro, `typeId` = :typeId, `categorieId` = :categorieId WHERE `article`.`id_article` = :id";
        $stmt = $dbn->prepare($sql);
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

function delete(int $id)
{
    //Connecter a la BD
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        $sql = "DELETE FROM article WHERE `article`.`id_article` = :id";
        $stm = $dbn->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}

?>