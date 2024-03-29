# Games Exercices

## Veille PDO & MySQLi

PDO (PHP Data Objects) est une alternative à MySQLi.

## PDO

- PDO est une extension de base de données moderne qui prend en charge non seulement MySQL, mais aussi d’autres bases de données comme SQLite, Postgre ...
- Il fournit des modes de récupération utiles, permet de passer des variables et des valeurs directement dans l’exécution, et détecte automatiquement les types de variables.
- Il offre une option pour avoir automatiquement des résultats tamponnés avec des instructions préparées1.
- Il prend en charge les paramètres nommés.

> [!NOTE]
> Les paramètres nommés sont une fonctionnalité de PDO (PHP Data Objects) qui permet de créer des requêtes SQL plus lisibles et plus sûres.

## MySQLi

- MySQLi, ou MySQL Improved, est une version améliorée de l’extension MySQL précédente.
- Il a quelques fonctionnalités avancées que PDO_MYSQL n’a pas.
- Il prend en charge les requêtes asynchrones et plusieurs requêtes à la fois.

> [!NOTE]
> **Requêtes asynchrones** : MySQLi permet d’exécuter des requêtes de manière asynchrone, ce qui signifie que vous pouvez envoyer plusieurs requêtes à la base de données sans attendre que chaque requête soit terminée.
> **Requêtes multiples** : MySQLi permet d’envoyer plusieurs requêtes SQL à la base de données en une seule fois

**En résumé :**  
  
Alors que PDO a une application plus universelle en raison de sa capacité à travailler avec différentes bases de données, MySQLi peut être plus approprié si vous travaillez spécifiquement avec MySQL et avez besoin d’utiliser ses fonctionnalités avancées. Cependant, PDO et MySQLi offrent tous deux des instructions préparées, qui peuvent aider à se protéger contre l’injection SQL.

On utilisera PDO si on doit travailler avec de multiples bases de données

**Source :** 
- https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914293-accedez-aux-donnees-en-php-avec-pdo
- https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/requete-preparee/
- https://www.php.net/manual/fr/pdo.prepare.php
- https://www.php.net/manual/fr/pdostatement.bindparam.php

## BDD Games

Nom de la base : liste_jeux

Nom de la table : jeux_video
id INT PRIMARY KEY NOT NULL AUTO INCREMENT
nom VARCHAR
possesseur VARCHAR
console VARCHAR
prix INT
nbre_joueurs_max INT
commentaires VARCHAR

Créer un dossier games

### Notes

2 objets permettants la communication mysqli ou un objet PDO

On va instancier cette classe new PDO pour accéder à la BDD
Dans toutes les connexions à la BDD il faut traquer les erreurs de connexion pour détecter les erreurs à l'aide d'un try catch

Dans une fonction les paramètres vont aider à personnaliser la fonction.
Dans la programmation, une fonction est une suite d’instructions qui effectue une tâche spécifique. Les **paramètres** (aussi appelés arguments) sont des valeurs que vous pouvez passer à une fonction pour personnaliser son comportement.

Variable qui répresente les chemins __DIR__.

Chemin absolu

echo __DIR__;
echo __FILE__;

## Requêtes MySQL préparées

1. étape de préparation
2. étape de compilation et finalement une dernière 
3. étape d’exécution

Sources :
- https://www.pierre-giraud.com/php-mysql-apprendre-coder-cours/requete-preparee/
- https://www.php.net/manual/fr/pdostatement.bindcolumn.php
- https://github.com/Castro-711/Web_Dev_CS230/blob/e4869e6295b71c02e7e2552848a5912d5869b25f/Study_Questions/Question_2/Part_3/prepared_statement.php
- https://www.php.net/manual/fr/mysqli.quickstart.prepared-statements.php
- https://www.lephpfacile.com/manuel-php/mysqli.quickstart.prepared-statements.php
- https://www.php.net/manual/fr/pdostatement.bindparam.php