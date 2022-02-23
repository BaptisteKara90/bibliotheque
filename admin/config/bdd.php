<?php 


$dsn ='mysql:dbname=bibliotheque2;host=localhost';
$utilisateur = 'bibli2';
$mdp = 'W0vp[T3aMNA0htv!';
//---------forcer L'UTF8-------------
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $bdd = new PDO($dsn, $utilisateur, $mdp, $options);
} catch (PDOException $erreur) {
//---- Utiliser echo ($erreur) si en dev pour savoir ce qui ne va pas dans la connexion
//-------------------------------------OU------------------------------------------------
//---- Utiliser "die" pour ne pas afficher le reste du code ou des infos sensibles(utilisateur, mdp....)
    die('erreur de BDD');
}

// var_dump($bdd);

?>