<?php

// Fonction qui récupère tous les jeux de la base de données.
function findAllGames($db)
{
    // Prépare la requête SQL pour sélectionner tous les jeux.
    $sql = "SELECT * FROM jeux_video;";

    // Prépare la requête SQL pour l'exécution.
    $sth = $db->prepare($sql);

    // Exécute la requête SQL.
    $sth->execute();

    // Récupère tous les résultats de la requête SQL et les stockes dans $games.
    $games = $sth->fetchAll();

    // Retourne les jeux récupérés.
    return $games;
}

// Fonction qui récupère un jeu spécifique de la base de données en utilisant son ID.
function findGameById($db, $currentId)
{
    // Prépare la requête SQL pour sélectionner le jeu avec l'ID spécifié.
    $sql = "SELECT * FROM jeux_video WHERE ID = :currentId";

    // Prépare la requête SQL pour l'exécution.
    $sth = $db->prepare($sql);

    // Lie le paramètre à la requête SQL.
    $sth->bindParam(':currentId', $currentId, PDO::PARAM_INT);

    // Exécute la requête SQL.
    $sth->execute();

    // Récupère le résultat de la requête SQL et le stocke dans $game.
    $game = $sth->fetch();

    // Retourne le jeu récupéré.
    return $game;
}
