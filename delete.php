<?php

require_once __DIR__ . ('/utilities/header.php');

// Vérifie si l'ID du jeu et la confirmation de suppression ont été fournis.
if (isset($_GET['id']) && isset($_POST['confirm'])) {

    // Récupère l'ID du jeu à partir de la superglobale $_GET.
    $currentId = $_GET['id'];

    // Vérifie si l'utilisateur a confirmé la suppression du jeu.
    if ($_POST['confirm'] === 'Oui') {

        // Requête SQL pour supprimer le jeu ayant l'ID spécifié.
        $sql = "DELETE FROM jeux_video WHERE ID = $currentId";

        // Exécute la requête SQL en utilisant l'objet de connexion à la base de données $dbco
        $deleteRequest = $dbco->query($sql);

        echo "<p>Jeu supprimé avec succès</p>";
        echo "<p><a href='/'>Retournez à l'accueil</a></p>";
    } else {
        // Redirige vers la page d'accueil qui liste les jeux si l'utilisateur clique sur 'Non'.
        header('Location: /index.php');
    }

// Si seul l'ID du jeu a été fourni, affiche un formulaire demandant confirmation à l'utilisateur.
} elseif (isset($_GET['id'])) {
    
    // Récupère l'ID du jeu à partir de la superglobale $_GET.
    $currentId = $_GET['id'];
    
    // Affiche le formulaire de confirmation
    echo "
        <form method='post'>
            <p><strong>Voulez vous vraiment supprimer ce jeu ?</strong></p>
            <input type='submit' name='confirm' value='Oui'>
            <input type='submit' name='confirm' value='Non'>
        </form>
        ";
}
