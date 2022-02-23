<?php

include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:' . URL_ADMIN . 'login.php');
    die;
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

    <title>Ajouter un éditeur</title>

    <!-- Custom fonts for this template-->
    <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= URL_ADMIN ?>css/sb-admin-2.min.css" rel="stylesheet">

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ajouter un éditeur</h1>
                    </div>



                    <div class="container">
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Dénomination : </label>
                                <input type="text" name="denomination" class="form-control" id="denomination">
                            </div>
                            <div class="mb-3">
                                <label for="siret" class="form-label">SIRET : </label>
                                <input type="text" name="siret" class="form-control" id="siret">
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse : </label>
                                <input type="text" name="adresse" class="form-control" id="adresse">
                            </div>
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville : </label>
                                <input type="text" class="form-control" name="ville" id="ville">
                            </div>
                            <div class="mb-3">
                                <label for="code_postal" class="form-label">Code Postal : </label>
                                <input type="text" name="code_postal" class="form-control" id="code_postal">
                            </div>
                            <div class="mb-3">
                                <label for="mail" class="form-label">mail : </label>
                                <input type="text" name="mail" class="form-control" id="mail">
                            </div>
                            <div class="mb-3">
                                <label for="numero_tel" class="form-label">Numéro de Téléphone : </label>
                                <input type="number" name="numero_tel" class="form-control" id="numero_tel">
                            </div>
                            <input type="submit" name="btn_add_editeur" class="btn btn-warning">
                            <a href="<?= URL_ADMIN ?>editeur/index.php" class="btn btn-primary">Annuler</a>
                    </div>
                    </form>
                </div>


            </div>
            <!-- End of Main Content -->
        </div>
        <!-- Footer -->
        <?php include PATH_ADMIN . 'includes/footer.php'; ?>