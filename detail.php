<?php

require_once __DIR__ . ('/utilities/header.php');
require_once __DIR__ . ('/function/games.fn.php');

$game = findGameById($dbco, $_GET['id']);

?>

<div style="border: 2px solid #ccc">
    <h3>Nom du jeu : <?= $game['nom'] ?></h3>
    <p>Possesseur : <?= $game['possesseur'] ?></p>
    <p>Console : <?= $game['console'] ?></p>
    <p>Prix : <?= $game['prix'] ?></p>
    <p>Nombre de joueurs Max. : <?= $game['nbre_joueurs_max'] ?></p>
    <h4>Commentaires : </h4>
    <p><?= $game['commentaires'] ?></p>
    <ul>
        <li><a href="/delete.php?id=<?= $_GET['id'] ?>">Supprimer <?= $game['nom'] ?></li>
    </ul>
</div>