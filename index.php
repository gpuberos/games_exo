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
            <div style="border: 2px solid #ccc">
                <p>
                    <img src="<?php echo empty($game['pathImg']) ? 'chemin_vers_image_vide' : $game['pathImg']; ?>" alt="<?= $game['nom'] ?>" />
                </p>
                <h3>Nom du jeu : <?= $game['nom'] ?></h3>
                <p>Possesseur : <?= $game['possesseur'] ?></p>
                <p>Console : <?= $game['console'] ?></p>
                <p>Prix : <?= $game['prix'] ?></p>
                <p>Nombre de joueurs Max. : <?= $game['nbre_joueurs_max'] ?></p>
                <h4>Commentaires : </h4>
                <p><?= $game['commentaires'] ?></p>
                <ul>
                    <li><a href="/update.php?id=<?= $game['ID'] ?>">Modifier</a></li>
                    <li><a href="/delete.php?id=<?= $game['ID'] ?>">Supprimer</a></li>
                </ul>
            </div>
        <?php endforeach; ?>
    </ul>

    </body>

    </html>