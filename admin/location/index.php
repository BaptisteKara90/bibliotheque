<?php 
include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:'. URL_ADMIN . 'login.php');
    die;
}

$sql = 'SELECT location.id AS location_id, usager.id AS usager_id, usager.nom, usager.prenom,livre.id AS livre_id, livre.titre, location.date_debut, location.date_fin, etat.libelle,location.statut FROM location INNER JOIN usager ON location.id_usager = usager.id INNER JOIN livre ON location.id_livre = livre.id INNER JOIN etat ON location.etat_debut = etat.id';

$requete = $bdd ->query($sql);
$locations = $requete->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT etat.libelle FROM etat INNER JOIN location ON location.etat_retour = etat.id';
$requete = $bdd ->query($sql);
$etats_retour = $requete->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <?php include PATH_ADMIN .'includes/sidebar.php'; ?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include PATH_ADMIN . 'includes/topbar.php'; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid overflow-auto">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800 text-center"> Liste Des Locations</h1>
                    </div>

<div class="container-fluid">
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID Location</th>
            <th scope="col">Usager</th>
            <th scope="col">Livre</th>
            <th scope="col">Date de début</th>
            <th scope="col">Date de fin</th>
            <th scope="col">État de début</th>
            <th scope="col">État de fin</th>
            <th scope="col">Statut</th>
            <th scope="col">Voir</th>
            <th scope="col">Cloturer</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($locations as $location) : 
            $date_debut = date_create($location['date_debut']);
            $date_fin = date_create($location['date_fin']);?>
            <tr>
                <td><?= $location['location_id'] ?></td>
                <td><?= $location['nom'] . ' ' . $location['prenom'] ?></td>
                <td><a href="<?=URL_ADMIN?>livres/single.php?id=<?=$location['livre_id']?>"><?= $location['titre']?></a></td>
                <td><?= $date_debut->format('d/m/Y') ?></td>
                <td><?= $date_fin->format('d/m/Y') ?></td>
                <td><?= $location['libelle'] ?></td>
                <td><?php if ($location['statut'] == 1){foreach ($etats_retour as $etat_retour) {
                    echo $etat_retour['libelle'];
                };} ?></td>
                <td><?php if ($location['statut'] == 0){echo 'en cours';}else {echo 'cloturée';} ?></td>
                <td><a href="<?=URL_ADMIN?>location/single.php?id=<?=$location['location_id']?>" class="btn btn-success">Voir</a></td>
                <td><a href="<?=URL_ADMIN?>location/update.php?id=<?=$location['location_id']?>" class="btn btn-warning">Cloturer</a></td>
            </tr>
            <?php endforeach; ?>
    </tbody>
</table>
</div>

                </div>
            <!-- End of Main Content -->
        </div>
            <!-- Footer -->
            <?php include PATH_ADMIN . 'includes/footer.php'; ?>
  