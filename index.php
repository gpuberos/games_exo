<?php

require_once __DIR__ . ('/utilities/header.php');
require_once __DIR__ . ('/function/games.fn.php');

$games = findAllGames($dbco);

// @TODO!
// DONE! #1  afficher une fiche détaillée de chaque jeu  (quand je clique sur le nom du jeu, j'ai une page de détail de jeu qui s'affiche === > Récuperer un element par son ID   $_GET)
// DONE! #2 Creer un formulaire qui permet d'ajouter des nouveau jeux dans la bdd ==> $_POST
// DONE! #3 - (Bonus ::  Supprimer un jeu de la bdd quand je clique sur le bouton supprimer
// DONE! #4 - (Non demandé :: Ajout de la fonction update pour mettre à jour une fiche jeu)

?>

<ul>
    <li><a href="/add.php">Ajouter un jeu</a>
</li>

<h2>Liste des jeux :</h2>
<ul>
    <?php foreach ($games as $game) : ?>
        <li><a href="/detail.php?id=<?= $game['ID'] ?>"><?= $game['nom'] ?></a></li>
    <?php endforeach; ?>
</ul>
  
</body>
</html>


