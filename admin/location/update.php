<?php
include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:' . URL_ADMIN . 'login.php');
    die;
}

$sql = 'SELECT * FROM etat';
$requete = $bdd->query($sql);
$etats = $requete->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $id_location = intval($_GET['id']);
    if ($id_location > 0) {
        $sql = 'SELECT location.id AS location_id, usager.id AS usager_id, usager.nom, usager.prenom,livre.id AS livre_id, livre.titre, location.date_debut, location.date_fin, etat.libelle,location.statut FROM location INNER JOIN usager ON location.id_usager = usager.id INNER JOIN livre ON location.id_livre = livre.id INNER JOIN etat ON location.etat_debut = etat.id WHERE location.id = ?';

        $requete = $bdd->prepare($sql);

        if (!$requete->execute([$id_location])) {
            header('location:index.php');
            die;
        }
        $location = $requete->fetch(PDO::FETCH_ASSOC);
    }
}

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
                        <h1 class="h3 mb-0 text-gray-800 text-center"> Cloturer une Location</h1>
                    </div>

                    <div class="container">
                        <form action="action.php" method="POST" enctype='multipart/form-data'>
                        <input type="hidden" name='id_livre' value="<?=$location['livre_id']?>">
                        <input type="hidden" name="id" value="<?= $location['location_id'] ?>">
                            <div class="mb-3">
                                <p>Livre : <?= $location['titre'] ?></p>
                            </div>
                            <div class="mb-3">
                                <p>Usager: <?= $location['prenom'] . ' ' . $location['nom'] ?> </p>
                            </div>
                            <div class="mb-3">
                                <p>Date de début de location : <?= $location['date_debut'] ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="date_fin" class="form-label">Date de retour de location : </label>
                                <input type="date" name="date_fin" class="form-control" id="date_fin">
                            </div>
                            <div class="mb-3">
                                <p>État de début de location : <?= $location['libelle'] ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="etat_retour" class="form-label">État de retour : </label>
                                <select class="select-cat" name="etat_retour" id="etat_retour">
                                    <?php foreach ($etats as $etat) : ?>
                                        <option value="<?= $etat['id'] ?>"><?= $etat['libelle'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3 text-center">
                                <input type="submit" name="btn_update_location" class="btn btn-success">
                            </div>
                        </form>
                    </div>

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- Footer -->
            <?php include PATH_ADMIN . 'includes/footer.php'; ?>
            <script>
                $(document).ready(function() {
                    $('.select-cat').select2();
                })
            </script>