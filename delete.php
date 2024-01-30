<?php

require_once __DIR__ . ('/utilities/header.php');

// Récupère l'ID du jeu à partir de la superglobale $_GET.
$currentId = $_GET['id'];

// Requête SQL pour supprimer le jeu ayant l'ID spécifié.
$sql = "DELETE FROM jeux_video WHERE ID = $currentId";

// Exécute la requête SQL en utilisant l'objet de connexion à la base de données $dbco
$deleteRequest = $dbco->query($sql);

echo "<p>Jeu supprimé avec succès</p>";

echo "<p><a href='/'>Retournez à l'accueil</a></p>";