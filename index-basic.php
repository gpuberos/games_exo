<?php

try {
    // On a définit le charset utf8 directement dans la classe PDO au lieu d'utiliser $conn->exec("SET NAMES utf8");
    $dbco = new PDO("mysql:host=localhost;dbname=liste_jeux;charset=utf8", "root", "",);
    echo "Connecting to database successfully";

    // setAttribute c'est une méthode qui appartient à l'objet $conn qui est lui même une instance de la classe PDO
    // On définit l'attribut par défaut du mode Fetch
    // https://www.php.net/manual/fr/pdo.setattribute.php
    // set donne cet attribut
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbco->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // On va traquer l'erreur, class Error https://www.php.net/manual/fr/class.error.php
} catch (PDOException $e) {
    // Passe moi l'erreur
    echo "echec de connexion";
    // Toujours la première erreur qui apparait
    // var_dump($e->getMessage());
}

// Le WHERE est une configuration d'un SELECT
$sql = "SELECT * FROM jeux_video";

// $dbco est l’objet qui représente la connexion à la base de données et query() est une méthode de cet objet. Cette méthode exécute la requête SQL contenue dans la variable $sql
$result = $dbco-> query($sql);

// La méthode fetchAll va lire ligne par ligne et le stocker dans un tableau $jeux l'objet $result
// Si on a pas la méthode FETCH_ASSOC de défini par défaut
// $jeux = $result->fetchAll(PDO::FETCH_ASSOC); // Tableau de jeux []
$jeux = $result->fetchAll();

// @TODO!
// #1  afficher une fiche détaillée de chaque jeu  (quand je clique sur le nom du jeu, j'ai une page de détail de jeu qui s'affiche === > Récuperer un element par son ID   $_GET)
// #2 Creer un formulaire qui permet d'ajouter des nouveau jeux dans la bdd ==> $_POST
// #3 - (Bonus ::  Supprimer un jeu de la bdd quand je clique sur le boutton supprimer

?>

<form action="">
    <input type="text" name="" id="">
</form>

<?php foreach ($jeux as $jeu): ?>
   <div style="border: 2px solid #ccc">
        <h3>Nom du jeu : <a href=""><?= $jeu['nom'] ?></a></h3>
        <p>Prix : <?= $jeu['prix'] ?></p>
        <a href="">Modifier</a>
        <a href="">Supprimer</a>
    </div>
<?php endforeach; ?>