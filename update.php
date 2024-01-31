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

    // Prépare la requête SQL pour insérer les données du formulaire dans la base de données.
    $sql = "UPDATE jeux_video SET nom = :nom, possesseur = :possesseur, console = :console, prix = :prix, nbre_joueurs_max = :nbre_joueurs_max, commentaires = :commentaires WHERE ID = :currendId";

    // $dbco->query($sql);

    // PDOStatement - On prépare la requete SQL pour l'execution
    $sth = $dbco->prepare($sql);

    // Lie les paramètres à la requête SQL
    $sth->bindParam(':nom', $nom);
    $sth->bindParam(':possesseur', $possesseur);
    $sth->bindParam(':console', $console);
    $sth->bindParam(':prix', $prix, PDO::PARAM_INT);
    $sth->bindParam(':nbre_joueurs_max', $nbre_joueurs_max, PDO::PARAM_INT);
    $sth->bindParam(':commentaires', $commentaires);
    $sth->bindParam(':currendId', $currentId, PDO::PARAM_INT);

    // Exécute la requête SQL
    $sth->execute();

    // Redirige vers detail.php avec l'ID du jeu modifié
    header('Location: /detail.php?id=' . $currentId);

    // Ajout d'exit pour arrêter l'execution du script et qu'aucun code après ne soit éxécuté
    exit;
} else {
    // SINON si le formulaire n'a pas été soumis, récupère les détails actuels du jeu à partir de la base de données.
    $sql = "SELECT * FROM jeux_video WHERE ID = :currendId";
    // $request = $dbco->query($sql);

    // Prépare la requete SQL pour l'execution
    $sth = $dbco->prepare($sql);
    
    // On lie le paramètre à la requête SQL
    $sth->bindParam(':currendId', $currentId, PDO::PARAM_INT);
    
    // Exécute la requête SQL
    $sth->execute();

    // Récupère les résultats de la requête SQL.
    $game = $sth->fetch();
}
?>

<form method="POST">
    <label for="nom">Nom : </label> <input type="text" name="nom" id="nom" value="<?= $game['nom'] ?>"><br>
    <label for="possesseur">Possesseur : </label><input type="text" name="possesseur" value="<?= $game['possesseur'] ?>"><br>
    <label for="console">Console : </label><input type="text" name="console" id="console" value="<?= $game['console'] ?>"><br>
    <label for="prix">Prix : </label><input type="number" name="prix" id="prix" value="<?= $game['prix'] ?>"><br>
    <label for="nbr-joueurs-max">Nombre de joueurs max : </label><input type="number" name="nbre_joueurs_max" id="nbr-joueurs-max" value="<?= $game['nbre_joueurs_max'] ?>"><br>
    <label for="comments">Commentaires : </label><textarea name="commentaires" id="comments"><?= $game['commentaires'] ?></textarea><br>
    <input type="submit" value="Mettre à jour">
</form>