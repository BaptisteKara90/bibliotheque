<?php
include '../config/config.php';
include '../config/bdd.php';

//--------UPDATE LIVRE----------
if (isset($_POST['btn_update_livre'])) {
    $id = intval($_POST['id']);
    $num_isbn = htmlentities($_POST['num_isbn']);
    $titre = htmlentities($_POST['titre']);
    $resume = htmlentities($_POST['resume']);
    $prix = htmlentities($_POST['prix']);
    $nb_pages = htmlentities($_POST['nb_pages']);
    $disponibilite = htmlentities($_POST['disponibilite']);
    $date_achat = htmlentities($_POST['date_achat']);
    $categories = $_POST['categorie'];
    $auteurs = $_POST['auteur'];
    $etats = $_POST['etat'];
    var_dump ($etats);
 

    //---- GESTION ANCIENNE ILLUSTRATION--------
    if (!empty($_FILES['illustration']['name'])) {
        $illustration = $_FILES['illustration']['name'];
        $sql = 'SELECT illustration FROM livre WHERE id = ?';
        $requete = $bdd->prepare($sql);
        $requete->execute(array($id));
        $hold_illustration = $requete->fetch(PDO::FETCH_ASSOC);
        $hold_illustration = $hold_illustration['illustration'];
        $path_hold_illustration = PATH_ADMIN . 'img/illustration/' . $hold_illustration;

        if (!is_file($path_hold_illustration)) {
            header('location:update.php?id=' . $id);
            die;
        } else {
            if (!unlink($path_hold_illustration)) {
                header('location:update.php?id=' . $id);
            }
        }

        $dossier_temporaire = $_FILES['illustration']['tmp_name'];
        $dossier_destination = PATH_ADMIN . 'img/illustration/' . $illustration;
        if (!move_uploaded_file($dossier_temporaire, $dossier_destination)) {
            header('location:update.php?id=' . $id);
            die;
        }

        $sql = 'UPDATE livre SET num_ISBN = :num_ISBN , titre = :titre, illustration = :illustration, resume = :resume, prix = :prix, nb_pages = :nb_pages, disponibilite = :disponibilite, date_achat = :date_achat WHERE id = :id';
        $data = array(
            ':num_ISBN' => $num_isbn,
            ':titre' => $titre,
            ':illustration' => $illustration,
            ':resume' => $resume,
            ':prix' => $prix,
            ':nb_pages' => $nb_pages,
            ':disponibilite' => $disponibilite,
            ':date_achat' => $date_achat,
            ':id' => $id
        );
    } else {

        $sql = 'UPDATE livre SET num_ISBN = :num_ISBN , titre = :titre, resume = :resume, prix = :prix, nb_pages = :nb_pages, disponibilite = :disponibilite, date_achat = :date_achat WHERE id = :id';
        $data = array(
            ':num_ISBN' => $num_isbn,
            ':titre' => $titre,
            ':resume' => $resume,
            ':prix' => $prix,
            ':nb_pages' => $nb_pages,
            ':disponibilite' => $disponibilite,
            ':date_achat' => $date_achat,
            ':id' => $id
        );
    }

    $requete = $bdd->prepare($sql);

    if (!$requete->execute($data)) {
        $_SESSION['error_update_livre'] = true;
        header('location:update.php?id=' . $id);
        die;
    } else {

        $_SESSION['error_update_livre'] = false;

    }

    //----------------GESTION AUTEUR-----------------
    $sql = 'DELETE FROM auteur_livre WHERE id_livre = ?';
    $requete = $bdd->prepare($sql);
    if (!$requete->execute([$id])) {
        header('location:update.php?id=' . $id);
        die;
    }

    foreach ($auteurs as $id_auteur) {
        $sql ='INSERT INTO auteur_livre VALUES (:id_auteur, :id_livre, NOW())';
        $data = array(
            ':id_auteur' => $id_auteur,
            ':id_livre' => $id
        );
        $requete = $bdd->prepare($sql);
        if (!$requete->execute($data)) {
            header('location:update.php?id=' . $id);
            die;
        } 
    }

    //----------------GESTION CATEGORIE--------------
    $sql = 'DELETE FROM categorie_livre WHERE id_livre = ?';
    $requete = $bdd->prepare($sql);
    if (!$requete->execute([$id])) {
        header('location:update.php?id=' . $id);
        die;
    }
 
    foreach ($categories as $id_categorie) {
        $sql ='INSERT INTO categorie_livre VALUES (:id_categorie, :id_livre)';
        $data = array(
            ':id_categorie' => $id_categorie,
            ':id_livre' => $id
        );
        $requete = $bdd -> prepare($sql);
        if (!$requete -> execute($data)) {
            header(('location:update.php?id=' . $id));
            die;
        } 
    }

    //-----------GESTION ETAT-------------
    $sql = 'DELETE FROM etat_livre WHERE id_livre = ?';
    $requete = $bdd->prepare($sql);
    if (!$requete->execute([$id])) {
        header('location:update.php?id=' . $id);
        die;
    }
 
        $sql = 'INSERT INTO etat_livre VALUES (:id_livre, :id_etat)';
        $data = array(
            ':id_etat'=> $etats,
            ':id_livre'=> $id
        );
        $requete = $bdd -> prepare($sql);
        if (!$requete ->execute($data)) {
            header('location:update.php?id=' . $id);
            die;
        }
    

    header('location:index.php');
    die;
}



//---------AJOUTER UN LIVRE----------
if (isset($_POST['btn_add_livre'])) {
    $num_isbn = htmlentities($_POST['num_ISBN']);
    $titre = htmlentities($_POST['titre']);
    $illustration = htmlentities($_FILES['illustration']['name']);
    $resume = htmlentities($_POST['resume']);
    $prix = htmlentities($_POST['prix']);
    $nb_pages = htmlentities($_POST['nb_pages']);
    $date_achat = htmlentities($_POST['date_achat']);
    $disponibilite = htmlentities($_POST['disponibilite']);
    $dossier_temporaire = $_FILES['illustration']['tmp_name'];
    $dossier_destination = PATH_ADMIN . 'img/illustration/' . $illustration;

    if (!move_uploaded_file($dossier_temporaire, $dossier_destination)) {
        header('location:add.php');
        die;
    }


    $sql = 'INSERT INTO livre VALUES (NULL, :num_ISBN, :titre, :illustration, :resume, :prix, :nb_pages, :date_achat, :disponibilite)';
    // $sql = 'INSERT INTO livre (id, num_ISBN, titre, illustration, resume, prix, nb_pages, date_achat, disponibilite) VALUES (NULL, :num_ISBN, :titre, :illustration, :resume, :prix, :nb_pages, :date_achat, :disponibilite)';
    $requete = $bdd->prepare($sql);
    $data = array(
        ':num_ISBN' => $num_isbn,
        ':titre' => $titre,
        ':illustration' => $illustration,
        ':resume' => $resume,
        ':prix' => $prix,
        ':nb_pages' => $nb_pages,
        ':date_achat' => $date_achat,
        ':disponibilite' => $disponibilite
    );
    
    if (!$requete->execute($data)) {
        $_SESSION['error_add_livre'] = true;
        header('location:add.php');
        die;
    } else {

        $id_livre = $bdd->lastInsertId();
        foreach ($_POST['categorie'] as $id_categorie) {
            $sql = 'INSERT INTO categorie_livre VALUES (:id_categorie, :id_livre)';
            $requete = $bdd->prepare($sql);
            $data = array(
                ':id_categorie' => $id_categorie,
                ':id_livre' => $id_livre
            );
            if (!$requete->execute($data)) {
                header('location:' . URL_ADMIN . 'livres/index.php');
                die;
            }
        }

        
        foreach ($_POST['auteur'] as $id_auteur) {
            $sql = 'INSERT INTO auteur_livre VALUES (:id_auteur, :id_livre, NOW())';
            $requete = $bdd->prepare($sql);
            $data = array(
                ':id_auteur' => $id_auteur,
                ':id_livre' => $id_livre
            );
            if (!$requete->execute($data)) {
                header('location:' . URL_ADMIN . 'livres/index.php');
                die;
            }
        }

        $sql = 'INSERT INTO etat_livre VALUES (:id_livre, :id_etat)';
        $requete = $bdd ->prepare($sql);
        $data = array(
            ':id_livre'=>$id_livre,
            ':id_etat' =>$_POST['etat']
        );
        if (!$requete->execute($data)) {
            header('location:add.php');
            die;
        }

        $_SESSION['error_add_livre'] = false;
        header('location:index.php');
        die;
    }
}



//-------SUPPRIMER UN LIVRE--------
if (isset($_GET['id'])){
    $id = intval($_GET['id']);
    if ($id <= 0){
        // erreur ID incorrect
        $_SESSION['error_delete_livre'] = true;
        header('location:index.php');
        die;
    }
    $sql = "SELECT illustration FROM livre WHERE id = ?";
    $req = $bdd->prepare($sql);
    $req->execute([$id]);
    $nom_illustration = $req->fetch(PDO::FETCH_ASSOC);
    $nom_illustration = $nom_illustration['illustration'];
    $chemin_illustration = PATH_ADMIN . 'img/illustration/' . $nom_illustration;
    if (!is_file($chemin_illustration)){
       $_SESSION['error_delete_illustration'] = true;
       header('location:index.php'); 
       die;
    }
    if (!unlink($chemin_illustration)){
        $_SESSION['error_delete_illustration'] = true;
        header('location:index.php');
        die;
    }

    // on supprime le lien categorie sur la BDD
    $sql = 'DELETE FROM categorie_livre WHERE id_livre = ?';
    $requete = $bdd->prepare($sql);
    if (!$requete->execute([$id])) {
        header('location:index.php');
        die;
    }
    
    // on supprime le lien auteur de la BDD
    $sql = 'DELETE FROM auteur_livre WHERE id_livre = ?';
    $requete = $bdd->prepare($sql);
    if (!$requete->execute([$id])) {
        header('location:index.php');
        die;
    }

    // on supprime le lien etat de la BDD
    $sql = 'DELETE FROM etat_livre WHERE id_livre = ?';
    $requete = $bdd->prepare($sql);
    if (!$requete->execute([$id])) {
        header('location:index.php');
        die;
    }

    // on supprime le livre en BDD
    $sql = "DELETE FROM livre WHERE id = ?";
    $req = $bdd->prepare($sql);
    if (!$req->execute([$id])){
        $_SESSION['error_delete_livre'] = true;
        header('location:index.php');
        die;
    }
    $_SESSION['error_delete_livre'] = false;
    header('location:index.php');
    die;
}
