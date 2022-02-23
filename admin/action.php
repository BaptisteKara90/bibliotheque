<?php
include 'config/config.php';
include 'config/bdd.php';
include 'config/fonctions.php';

if (isset($_POST['btn_log_user'])) {
    $mail = htmlentities($_POST['mail']);
    $mdp = htmlentities($_POST['mdp']);

    $sql = 'SELECT * FROM utilisateur WHERE mail = ?';
    $requete = $bdd -> prepare($sql);
    $requete -> execute([$mail]);
    $user = $requete->fetch(PDO::FETCH_ASSOC);
    // var_dump($user);


    if (!$user) {
        $_SESSION['connect'] = false;
        header ('location:login.php');
        die;
    }
//----------------pasword_verify demande un hash!!!!!!!!-------------------

    if (!password_verify($mdp, $user['mot_de_passe'])) {
        $_SESSION['connect'] = false;
        header('location:index.php');
        die;
    }

    unset($user['mot_de_passe']);
    $_SESSION['user'] = $user;
    $_SESSION['user']['roles'] = checkRoles($user['id'], $bdd);
    $_SESSION['connect'] = true;
    header('location:index.php');
    die;
}

if (isset($_GET['connect']) && $_GET['connect'] == 'false') {
    $_SESSION = [];
    header('location:../index.php');
    die;
}