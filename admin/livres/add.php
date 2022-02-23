<?php

include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:' . URL_ADMIN . 'login.php');
    die;
}

$sql = 'SELECT * FROM categorie';
$requete = $bdd->query($sql);
$categories = $requete->fetchAll(PDO::FETCH_ASSOC);

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
    <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= URL_ADMIN ?>css/sb-admin-2.min.css" rel="stylesheet">
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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ajouter des Livres</h1>
                    </div>

                    <?php

                    if (isset($_SESSION['error_add_livre']) && $_SESSION['error_add_livre'] == true) {
                        toto('danger', "Erreur sur l'ajout d'un livre!");
                        unset($_SESSION['error_add_livre']);
                    }

                    ?>

                    <div class="container">
                        <form action="action.php" method="POST" enctype='multipart/form-data'>
                            <div class="mb-3">
                                <label for="num_ISBN" class="form-label">Numéro ISBN : </label>
                                <input type="text" name="num_ISBN" class="form-control" id="num_ISBN">
                            </div>
                            <div class="mb-3">
                                <label for="titre" class="form-label">Titre : </label>
                                <input type="text" name="titre" class="form-control" id="titre">
                            </div>
                            <div class="mb-3">
                                <label for="illustration" class="form-label">Illustration : </label>
                                <input type="file" name="illustration" class="form-control" id="illustration">
                            </div>
                            <div class="mb-3">
                                <label for="resume" class="form-label">Résumé : </label>
                                <textarea class="form-control" name="resume" id="resume" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                            <label for="cat" class="form-label">Catégories</label>
                            <select class="select-cat" name="categorie[]" multiple id="cat">
                                <?php  foreach($categories as $categorie) : ?>
                                    <option value="<?= $categorie['id'] ?>"><?= $categorie['libelle'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="mb-3">
                                <label for="prix" class="form-label">Prix d'achat : </label>
                                <input type="number" name="prix" class="form-control" id="prix">
                            </div>
                            <div class="mb-3">
                                <label for="nb_pages" class="form-label">Nombre de pages : </label>
                                <input type="number" name="nb_pages" class="form-control" id="nb_pages">
                            </div>
                            <div class="mb-3">
                                <label for="date_achat" class="form-label">Date d'achat : </label>
                                <input type="date" name="date_achat" class="form-control" id="date_achat">
                            </div>
                            <div class="mb-3">
                                <label for="disponibilite" class="form-label">Disponibilité : </label>
                                <input type="number" name="disponibilite" class="form-control" id="disponibilite">
                            </div>
                            <div class="mb-3 text-center">
                                <input type="submit" name="btn_add_livre" class="btn btn-success">
                            </div>
                        </form>
                    </div>

                    <!-- PHP ICI -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- Footer -->
            <?php include PATH_ADMIN . 'includes/footer.php'; ?>
            <script>$(document).ready(function() {
                $('.select-cat').select2();
            })</script>