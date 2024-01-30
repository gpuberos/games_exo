<?php

// Fonction qui récupère tous les jeux de la base de données.
function findAllGames($db)
{
    $sql = "SELECT * FROM jeux_video;";
    $request = $db->query($sql);
    $games = $request->fetchAll();

    return $games;
}

// Fonction qui récupère un jeu spécifique de la base de données en utilisant son ID.
function findGameById($db, $currentId)
{
    $currentId = $_GET['id'];
    $sql = "SELECT * FROM jeux_video WHERE ID = $currentId";
    $request = $db->query($sql);
    $game = $request->fetch();

    return $game;
}
