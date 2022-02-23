<?php 
include '../config/config.php';
include '../config/bdd.php';

//-----------UPDATE AUTEUR---------------

if (isset($_POST['btn_update_auteur'])) {
    $id = intval($_POST['id']);
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $nom_de_plume = htmlentities($_POST['nom_de_plume']);
    $adresse = htmlentities($_POST['adresse']);
    $ville = htmlentities($_POST['ville']);
    $code_postal = htmlentities($_POST['code_postal']);
    $mail = htmlentities($_POST['mail']);
    $numero = htmlentities($_POST['numero']);
    $photo = $_FILES['photo']['name'];

    $dossier_temporaire = $_FILES['photo']['tmp_name'];
    $dossier_destination = PATH_ADMIN . 'img/photo/' . $photo;
    if (!move_uploaded_file($dossier_temporaire, $dossier_destination)) {
        die;
    }

    $sql ='UPDATE auteur SET nom = :nom, prenom = :prenom, nom_de_plume = :nom_de_plume, adresse = :adresse, ville = :ville, code_postal = :code_postal, mail = :mail, numero = :numero, photo = :photo WHERE id =:id';
    $data = array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':nom_de_plume' => $nom_de_plume,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':code_postal' => $code_postal,
        ':mail' => $mail,
        ':numero' => $numero,
        ':photo' => $photo,
        ':id' => $id
    );
    $requete = $bdd -> prepare($sql);

    if (!$requete -> execute($data)) {
        $_SESSION['error_update_auteur'] = true;
        header('location:update.php?id='. $id);
        die;
    }else {
        $_SESSION['error_update_auteur'] = false;
        header('location:index.php');
        die;
    }
}


//------AJOUTER UN AUTEUR-------

if (isset($_POST['btn_add_auteur'])) {
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $nom_de_plume = htmlentities($_POST['nom_de_plume']);
    $adresse = htmlentities($_POST['adresse']);
    $ville = htmlentities($_POST['ville']);
    $code_postal = htmlentities($_POST['code_postal']);
    $mail = htmlentities($_POST['mail']);
    $numero = htmlentities($_POST['numero']);
    $photo = htmlentities($_POST['photo']);

    $sql = 'INSERT INTO auteur VALUES (NULL, :nom, :prenom, :nom_de_plume, :adresse, :ville, :code_postal, :mail, :numero, :photo)';
    $data = array(
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':nom_de_plume' => $nom_de_plume,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':code_postal' => $code_postal,
        ':mail' => $mail,
        ':numero' => $numero,
        ':photo' => $photo
    );
    $requete = $bdd -> prepare($sql);

    if (!$requete -> execute($data)) {
        header('location:add.php');
        die;
    }else {
        header('location:index.php');
        die;
    }
}


//------SUPPRIMER UN AUTEUR------

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id>0) {
        $sql = 'DELETE FROM auteur WHERE id = :id';
        $requete = $bdd -> prepare($sql);
        $data = array(':id' => $id);
        if (!$requete -> execute($data)) {
            $_SESSION['error_delete_auteur'] = true;
            header('location:index.php');
            die;
        }else {
            $_SESSION['error_delete_auteur'] = false;
            header('location:index.php');
            die;
        }
    }
}