<?php

include '../config/config.php';
include '../config/bdd.php';



if (isset($_POST['btn_update_utilisateur'])) {
    var_dump($_POST);
    var_dump($_FILES);
    // die;
    $id = intval($_POST['id']);
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $pseudo = htmlentities($_POST['pseudo']);
    $mail = htmlentities($_POST['mail']);
    $numero_telephone = htmlentities($_POST['numero_telephone']);
    $adresse = htmlentities($_POST['adresse']);
    $ville = htmlentities($_POST['ville']);
    $code_postal = htmlentities($_POST['code_postal']);
    $avatar = $_FILES['avatar']['name'];
    $dossier_temporaire = $_FILES['avatar']['tmp_name'];
    $dossier_destination = PATH_ADMIN . 'img/avatar/' . $avatar;
    var_dump($avatar);
    if (!move_uploaded_file($dossier_temporaire, $dossier_destination)){

       die('erreur dans le deplacement du fichier');
    }

    $sql = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, pseudo = :pseudo, mail = :mail, num_telephone = :numero_telephone, avatar = :avatar, adresse = :adresse, ville = :ville, code_postal = :code_postal WHERE id = :id";
    $requete = $bdd->prepare($sql); 
    var_dump($sql);
    var_dump($requete->errorInfo());
    // die;
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

     if (!$requete -> execute($data)) {
         header('location:update.php?id=' . $id);
         die;
     }else {
         header('location:index.php');
         die;
     }
}



 if (isset($_POST['btn_add_utilisateur'])){
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
     if (!move_uploaded_file($dossier_temporaire, $dossier_destination)){

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
    if (!$req->execute($data)){

        var_dump($req->errorInfo());
        die;
        header('location:add.php');
        die;
    }
    header('location:index.php');
    die;
}

if (isset($_GET['id'])){
    $id = intval($_GET['id']);
    if ($id > 0){
        $sql = 'DELETE FROM utilisateur WHERE id = :id ';
        $requete = $bdd->prepare($sql);
        if (!$requete->execute(array(':id' => $id))){
            header('location:index.php');
            die;
        }else{
            header('location:index.php');
            die;
        }
    }
}