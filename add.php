<?php
require_once __DIR__ . ('/utilities/header.php');

// Vérifie si la méthode de la requête est POST. S'execute uniquement quand le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Récupère les valeurs du formulaire à partir de la superglobale $_POST.
        // Ajout de htmlspecialchars() pour échapper les caractères spéciaux et ainsi se protéger contre certaine attaques XSS
        $nom = htmlspecialchars($_POST['nom']);
        $possesseur = htmlspecialchars($_POST['possesseur']);
        $console = htmlspecialchars($_POST['console']);
        $prix = htmlspecialchars($_POST['prix']);
        $nbre_joueurs_max = htmlspecialchars($_POST['nbre_joueurs_max']);
        $commentaires = htmlspecialchars($_POST['commentaires']);

        // Requête SQL pour insérer les données du formulaire dans la base de données.
        $sql = "INSERT INTO jeux_video (nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES ('$nom', '$possesseur', '$console', $prix, $nbre_joueurs_max, '$commentaires')";

        // Exécute la requête SQL.
        $dbco->query($sql);

        // Affiche le message de succès si la requête a réussi.
        echo "Jeu ajouté avec succès !";
    } catch (PDOException $e) {
        // Si une erreur se produit lors de l'exécution de la requête SQL, on affiche un message d'erreur.
        echo "Erreur lors de l'ajout du jeu : " . $e->getMessage();
    }
}
?>

<form method="POST">
    <label for="nom">Nom : </label> <input type="text" name="nom" id="nom"><br>
    <label for="possesseur">Possesseur : </label><input type="text" name="possesseur"><br>
    <label for="console">Console : </label><input type="text" name="console" id="console"><br>
    <label for="prix">Prix : </label><input type="number" name="prix" id="prix"><br>
    <label for="nbr-joueurs-max">Nombre de joueurs max : </label><input type="number" name="nbre_joueurs_max" id="nbr-joueurs-max"><br>
    <label for="comments">Commentaires : </label><textarea name="commentaires" id="comments"></textarea><br>
    <input type="submit" value="Ajouter">
</form>