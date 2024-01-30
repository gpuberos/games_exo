<?php

function findAllGames($db)
{
    $sql = "SELECT * FROM jeux_video;";
    $request = $db->query($sql);
    $games = $request->fetchAll();

    return $games;
}

function findGameById($db, $currentId)
{
    $currentId = $_GET['id'];
    $sql = "SELECT * FROM jeux_video WHERE ID = $currentId";
    $request = $db->query($sql);
    $game = $request->fetch();

    return $game;
}
