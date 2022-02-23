<?php 
include '../config/config.php';
include  '../config/bdd.php';
include '../config/fonctions.php';

//----UPDATE---

if (isset($_POST['btn_update_editeur'])) {
    $id = intval($_POST['id']);
    $denomination = htmlentities($_POST['denomination']);
    $siret = htmlentities($_POST['siret']);
    $adresse = htmlentities($_POST['adresse']);
    $ville = htmlentities($_POST['ville']);
    $code_postal = htmlentities($_POST['code_postal']);
    $mail = htmlentities($_POST['mail']);
    $numero_tel = htmlentities($_POST['numero_tel']);

    $sql = 'UPDATE editeur SET denomination = :denomination, siret = :siret, adresse = :adresse, ville = :ville, code_postal = :code_postal, mail = :mail, numero_tel = :numero_tel WHERE id = :id';
    $data = array(
        ':denomination' => $denomination,
        ':siret' => $siret,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':code_postal' => $code_postal,
        ':mail' => $mail,
        ':numero_tel' => $numero_tel,
        ':id' => $id
     );

    $requete = $bdd -> prepare($sql);

    if (!$requete -> execute($data)) {
        header('location:update.php?id=' . $id);
        die;
    }else {
        header('location:index.php');
        die;
    }
}

//-----AJOUTER-----------

if (isset($_POST['btn_add_editeur'])) {
    $denomination = htmlentities($_POST['denomination']);
    $siret = htmlentities($_POST['siret']);
    $adresse = htmlentities($_POST['adresse']);
    $ville = htmlentities($_POST['ville']);
    $code_postal = htmlentities($_POST['code_postal']);
    $mail = htmlentities($_POST['mail']);
    $numero_tel = htmlentities($_POST['numero_tel']);

    $sql = 'INSERT INTO editeur VALUES (NULL, :denomination, :siret, :adresse, :ville, :code_postal, :mail, :numero_tel)';
    $data = array(
        ':denomination' => $denomination,
        ':siret' => $siret,
        ':adresse' => $adresse,
        ':ville' => $ville,
        ':code_postal' => $code_postal,
        ':mail' => $mail,
        ':numero_tel' => $numero_tel
     );

    $requete = $bdd -> prepare($sql);

    if (!$requete -> execute($data)) {
        header('location:add.php?id=' . $id);
        die;
    }else {
        header('location:index.php');
        die;
    }
}

//----- SUPPRIMER------
if (isset($_GET['id'])){
    $id = intval($_GET['id']);
    if ($id > 0){
        $sql = 'DELETE FROM editeur WHERE id = :id ';
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

?>