<?php

try {
    // On a définit le charset utf8 directement dans la classe PDO au lieu d'utiliser $conn->exec("SET NAMES utf8");
    $dbco = new PDO("mysql:host=localhost;dbname=liste_jeux;charset=utf8", "root", "",);
    // echo "Connecting to database successfully";

    // setAttribute c'est une méthode qui appartient à l'objet $conn qui est lui même une instance de la classe PDO
    // On définit l'attribut par défaut du mode Fetch
    // https://www.php.net/manual/fr/pdo.setattribute.php
    // set donne cet attribut
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // On va traquer l'erreur, class Error https://www.php.net/manual/fr/class.error.php
} catch (PDOException $e) {
    // Passe moi l'erreur
    echo "echec de connexion";
    // Toujours la première erreur qui apparait
    // var_dump($e->getMessage());
}