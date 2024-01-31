<?php

require_once __DIR__ . ('/utilities/header.php');

// Récupère l'ID du jeu à partir de la superglobale $_GET.
$currentId = $_GET['id'];

// Vérifie si la méthode de la requête est POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Si le formulaire a été soumis, met à jour les détails du jeu dans la base de données.
    // Ajout de htmlspecialchars() pour échapper les caractères spéciaux et ainsi se protéger contre certaine attaques XSS
    $nom = htmlspecialchars($_POST['nom']);
    $possesseur = htmlspecialchars($_POST['possesseur']);
    $console = htmlspecialchars($_POST['console']);
    $prix = htmlspecialchars($_POST['prix']);
    $nbre_joueurs_max = htmlspecialchars($_POST['nbre_joueurs_max']);
    $commentaires = htmlspecialchars($_POST['commentaires']);

    $sql = "UPDATE jeux_video SET nom = '$nom', possesseur = '$possesseur', console = '$console', prix = $prix, nbre_joueurs_max = $nbre_joueurs_max, commentaires = '$commentaires' WHERE ID = $currentId";
    
    $dbco->query($sql);
    
    // Redirige vers detail.php avec l'ID du jeu modifié
    header('Location: /detail.php?id=' . $currentId);

    // Ajout d'exit pour arrêter l'execution du script et qu'aucun code après ne soit éxécuté
    exit;

} else {
    // SINON si le formulaire n'a pas été soumis, récupère les détails actuels du jeu à partir de la base de données.
    $sql = "SELECT * FROM jeux_video WHERE ID = $currentId";
    $request = $dbco->query($sql);
    $game = $request->fetch();

}
?>

<form method="post">
    <label for="nom">Nom : </label> <input type="text" name="nom" id="nom" value="<?= $game['nom'] ?>"><br>
    <label for="possesseur">Possesseur : </label><input type="text" name="possesseur" value="<?= $game['possesseur'] ?>"><br>
    <label for="console">Console : </label><input type="text" name="console" id="console" value="<?= $game['console'] ?>"><br>
    <label for="prix">Prix : </label><input type="number" name="prix" id="prix" value="<?= $game['prix'] ?>"><br>
    <label for="nbr-joueurs-max">Nombre de joueurs max : </label><input type="number" name="nbre_joueurs_max" id="nbr-joueurs-max" value="<?= $game['nbre_joueurs_max'] ?>"><br>
    <label for="comments">Commentaires : </label><textarea name="commentaires" id="comments"><?= $game['commentaires'] ?></textarea><br>
    <input type="submit" value="Mettre à jour">
</form>