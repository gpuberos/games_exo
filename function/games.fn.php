<?php

// Fonction qui récupère tous les jeux de la base de données.
function findAllGames($db)
{
    $sql = "SELECT * FROM jeux_video;";
    
    $sth = $db->prepare($sql);
    
    $sth->execute();

    $games = $sth->fetchAll();

    return $games;
}

// Fonction qui récupère un jeu spécifique de la base de données en utilisant son ID.
function findGameById($db, $currentId)
{
    $currentId = $_GET['id'];
    $sql = "SELECT * FROM jeux_video WHERE ID = :currentId";

    $sth = $db->prepare($sql);
    
    $sth->bindParam(':currendId', $currentId, PDO::PARAM_INT);
    
    $sth->execute();

    $game = $sth->fetch();

    return $game;
}
