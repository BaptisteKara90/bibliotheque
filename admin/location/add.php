<?php
include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:' . URL_ADMIN . 'login.php');
    die;
}

$sql = 'SELECT livre.titre, livre.id, livre.disponibilite FROM livre';
$requete = $bdd->query($sql);
$livres = $requete -> fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT usager.nom, usager.prenom, usager.id FROM usager';
$requete = $bdd->query($sql);
$usagers = $requete -> fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM etat';
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <!-- SELECT2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <?php include PATH_ADMIN . 'includes/sidebar.php'; ?>

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
                        <h1 class="h3 mb-0 text-gray-800 text-center"> Ajouter une Location</h1>
                    </div>
                    <!-- location : 
                    -Livre : titre + id (etat,...) seulement les dispos
                    -Usager : Nom + id
                    - Date : Debut + Fin-->

                    <div class="container">
                        <form action="action.php" method="POST" enctype='multipart/form-data'>
                        <div class="mb-3">
                            <label for="livre" class="form-label">Livre : </label>
                            <select class="select-cat" name="livre" id="livre">
                                <?php  foreach($livres as $livre) : ?>
                                    <?php if($livre['disponibilite'] == 0) : ?>
                                    <option value="<?= $livre['id'] ?>"><?= $livre['titre'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="mb-3">
                            <label for="usager" class="form-label">Usager : </label>
                            <select class="select-cat" name="usager" id="usager">
                                <?php  foreach($usagers as $usager) : ?>
                                    <option value="<?= $usager['id'] ?>"><?= $usager['prenom'] . ' ' . $usager['nom'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                            <div class="mb-3">
                                <label for="date_debut" class="form-label">Date de début de location : </label>
                                <input type="date" name="date_debut" class="form-control" id="date_debut">
                            </div>
                            <div class="mb-3">
                                <label for="date_fin" class="form-label">Date de retour de location : </label>
                                <input type="date" name="date_fin" class="form-control" id="date_fin">
                            </div>
                            <div class="mb-3 text-center">
                                <input type="submit" name="btn_add_location" class="btn btn-success">
                            </div>
                        </form>
                    </div>

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- Footer -->
            <?php include PATH_ADMIN . 'includes/footer.php'; ?>
            <script>$(document).ready(function() {
                $('.select-cat').select2();
            })</script>