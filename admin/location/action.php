<?php 
include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

//---------------ADD LOCATION-----------------
if (isset($_POST['btn_add_location'])) {
    $id_livre = intval($_POST['livre']);
    $id_usager = intval($_POST['usager']);
    $date_debut = ($_POST['date_debut']);
    $date_fin = (!empty($_POST['date_fin'])) ? ($_POST['date_fin']) : NULL;
    $etat = getEtats($id_livre, $bdd, 'id');

    
    $sql = 'INSERT INTO location VALUES (NULL, :id_usager, :id_livre, :date_debut, :date_fin, :etat, NULL, 0)';
    $requete = $bdd->prepare($sql);
    $data = array(
        ':id_usager' => $id_usager,
        ':id_livre' => $id_livre,
        ':date_debut' => $date_debut,
        ':date_fin' => $date_fin,
        ':etat' => $etat,
    );
    if (!$requete->execute($data)) {
        header('location:add.php');
        die;
    }

    //------Gérer la dispo du livre------
    $sql = 'UPDATE livre SET disponibilite = :disponibilite WHERE id = :id';
    $data = array(
        ':disponibilite' => 1,
        ':id' => $id_livre
    );
    $requete = $bdd->prepare($sql);
        if (!$requete->execute($data)) {
            header('location:add.php');
            die;
        }
    header('location:index.php');
    die;
}

//------------------CLOTURER UNE LOCATION--------------------------------
if (isset($_POST['btn_update_location'])) {
    var_dump($_POST);
    $id_livre = intval($_POST['id_livre']);
    $id_location = intval($_POST['id']);
    $date_fin = $_POST['date_fin'];
    $etat_retour = intval($_POST['etat_retour']);

    $sql = 'UPDATE location SET date_fin = :date_fin, etat_retour = :etat_retour, statut = :statut WHERE :id = id';
    $data = array(
        ':date_fin' => $date_fin,
        ':etat_retour' => $etat_retour,
        ':statut' => 1,
        ':id' => $id_location
    );
    $requete = $bdd -> prepare($sql);
    if (!$requete->execute($data)) {
        header('location:update.php?id=' . $id_location);
        die;
    }
    $requete -> fetch(PDO::FETCH_ASSOC);

    $etat_livre = getEtats($id_livre,$bdd,'id');
    var_dump($etat_livre);
    if (!$etat_livre == $etat_retour) {
        $sql = 'DELETE etat_livre WHERE id_livre = ?';
        $requete = $bdd->prepare($sql);
        if (!$requete->execute([$id_livre])) {
            header('location:update.php?id=' . $id_location);
            die;
        }

        $sql = 'INSERT INTO etat_livre VALUES (:id_livre, :id_etat)';
        $data = array(
            ':id_etat'=> $etat_retour,
            ':id_livre'=> $id
        );
        $requete = $bdd -> prepare($sql);
        if (!$requete ->execute($data)) {
            header('location:update.php?id=' . $id_location);
            die;
        }
    }
    header('location:index.php');
    die;
}
?>