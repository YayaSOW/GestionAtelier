<?php
function findAllType():array {
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        $sql = "SELECT * FROM type";
        $stm = $dbn->query($sql);
        // var_dump($stm->fetchAll(PDO::FETCH_ASSOC));
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}

function saveType(array $types) {
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        extract($types);
        // var_dump($types);
        // var_dump($nomType);
        $sql = "INSERT INTO `type` (`nomType`) VALUES (:nomType)";
        $stm = $dbn -> prepare($sql);
        $stm ->bindParam(":nomType",$nomType);
        $stm -> execute();
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}

function deleteType(int $id)
{
    //Connecter a la BD
    $dsn = "mysql:host=localhost:3306;dbname=projet_php_gesatelier";
    $username = "root";
    $password = "";
    try {
        $dbn = new PDO($dsn, $username, $password);
        $sql = "DELETE FROM type WHERE `type`.`id` = :id";
        $stm = $dbn->prepare($sql);
        $stm->bindParam(':id', $id);
        $stm->execute();
    } catch (PDOException $e) {
        echo "Erreur de Connexion: " . $e->getMessage();
    }
}

?>