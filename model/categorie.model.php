<?php
function findAllCategorie():array {
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        $sql = "SELECT * FROM categorie";
        $stm = $dbn->query($sql);
        // var_dump($stm->fetchAll(PDO::FETCH_ASSOC));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}

function saveCategorie(array $categorie) {
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        extract($categorie);
        // var_dump($nomCategorie);
        // var_dump($nomCategorie);
        $sql = "INSERT INTO `categorie` (`nomCategorie`) VALUES (:nomCategorie)";
        $stm = $dbn -> prepare($sql);
        $stm ->bindParam(":nomCategorie",$nomCategorie);
        $stm -> execute();
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}

?>