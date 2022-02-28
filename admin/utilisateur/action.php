<?php

include '../config/config.php';
include '../config/bdd.php';


//-----------------UPDATE------------------
if (isset($_POST['btn_update_utilisateur'])) {
    $id = intval($_POST['id']);
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $pseudo = htmlentities($_POST['pseudo']);
    $mail = htmlentities($_POST['mail']);
    $numero_telephone = htmlentities($_POST['numero_telephone']);
    $adresse = htmlentities($_POST['adresse']);
    $ville = htmlentities($_POST['ville']);
    $code_postal = htmlentities($_POST['code_postal']);
    $roles = $_POST['role'];


    //---------------GESTION ANCIEN AVATAR---------------
    if (!empty($_FILES['avatar']['name'])) {
        $avatar = $_FILES['avatar']['name'];
        $sql = 'SELECT avatar FROM utilisateur WHERE id = ?';
        $requete = $bdd->prepare($sql);
        $requete->execute([$id]);
        $hold_avatar = $requete->fetch(PDO::FETCH_ASSOC);
        $hold_avatar = $hold_avatar['avatar'];
        $path_hold_avatar = PATH_ADMIN . 'img/avatar/' . $hold_avatar;

        if (!is_file($path_hold_avatar)) {
            header('location:update.php?id=' . $id);
            die;
        } else {
            if (!unlink($path_hold_avatar)) {
                header('location:update.php?id=' . $id);
                die;
            }
        }

        $dossier_temporaire = $_FILES['avatar']['tmp_name'];
        $dossier_destination = PATH_ADMIN . 'img/avatar/' . $avatar;
        var_dump($avatar);
        if (!move_uploaded_file($dossier_temporaire, $dossier_destination)) {
            header('location:update.php?id=' . $id);
            die('erreur dans le deplacement du fichier');
        }




        $sql = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, pseudo = :pseudo, mail = :mail, num_telephone = :numero_telephone, avatar = :avatar, adresse = :adresse, ville = :ville, code_postal = :code_postal WHERE id = :id";
        $requete = $bdd->prepare($sql);
        $data = [
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':pseudo' => $pseudo,
            ':mail' => $mail,
            ':numero_telephone' => $numero_telephone,
            ':avatar' => $avatar,
            ':adresse' => $adresse,
            ':ville' => $ville,
            ':code_postal' => $code_postal,
            ':id' => $id
        ];
    } else {
        $sql = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, pseudo = :pseudo, mail = :mail, num_telephone = :numero_telephone, adresse = :adresse, ville = :ville, code_postal = :code_postal WHERE id = :id";
        $requete = $bdd->prepare($sql);
        $data = [
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':pseudo' => $pseudo,
            ':mail' => $mail,
            ':numero_telephone' => $numero_telephone,
            ':adresse' => $adresse,
            ':ville' => $ville,
            ':code_postal' => $code_postal,
            ':id' => $id
        ];
    }

    $requete = $bdd->prepare($sql);

    if (!$requete->execute($data)) {
        header('location:update.php?id=' . $id);
        die;
    }

    //---------Gestion UPDATE ROLE---------------

    $sql = 'DELETE FROM role_utilisateur WHERE id_utilisateur = ?';
    $requete = $bdd->prepare($sql);
    if (!$requete->execute([$id])) {
        header('location:update.php?i=' . $id);
        die;
    }

    foreach ($roles as $id_role) {
        $sql = 'INSERT INTO role_utilisateur VALUES (:id_role, :id_utilisateur)';
        $data = array(
            ':id_role' => $id_role,
            ':id_utilisateur' => $id
        );
        $requete = $bdd->prepare($sql);
        if (!$requete->execute($data)) {
            header('location:update.php?id=' . $id);
            die;
        }
    }
    header('location:index.php');
    die;
}
//-------------------ADD UTILISATEUR-------------------
//TODO ajouter role

if (isset($_POST['btn_add_utilisateur'])) {
    var_dump($_POST, $_FILES);
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $pseudo = htmlentities($_POST['pseudo']);
    $mail = htmlentities($_POST['mail']);
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $numero_telephone = htmlentities($_POST['numero_telephone']);
    $adresse = htmlentities($_POST['adresse']);
    $ville = htmlentities($_POST['ville']);
    $code_postal = htmlentities($_POST['code_postal']);
    $avatar = $_FILES['avatar']['name'];
    $dossier_temporaire = $_FILES['avatar']['tmp_name'];
    $dossier_destination = PATH_ADMIN . 'img/avatar/' . $avatar;
    if (!move_uploaded_file($dossier_temporaire, $dossier_destination)) {

        die('erreur dans le deplacement du fichier');
    }

    $sql = "INSERT INTO utilisateur VALUES (NULL, :nom, :prenom, :pseudo, :mail, :mdp, :numero_telephone, :avatar, :adresse, :ville, :code_postal)";
    $req = $bdd->prepare($sql);
    $data = [
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':pseudo' => $pseudo,
        ':mail' => $mail,
        ':mdp' => $mdp,
        ':numero_telephone' => $numero_telephone,
        ':avatar' => $avatar,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':code_postal' => $code_postal
    ];
    if (!$req->execute($data)) {

        var_dump($req->errorInfo());
        die;
        header('location:add.php');
        die;
    }
    header('location:index.php');
    die;
}


//-----------------SUPPRESSION-------------------
//TODO suppression role_utilisateur

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        $sql = 'DELETE FROM utilisateur WHERE id = :id ';
        $requete = $bdd->prepare($sql);
        if (!$requete->execute(array(':id' => $id))) {
            header('location:index.php');
            die;
        } else {
            header('location:index.php');
            die;
        }
    }
}
