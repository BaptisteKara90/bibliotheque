<?php 
include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:'. URL_ADMIN . 'login.php');
    die;
}


$sql = 'SELECT * FROM livre'; 
$requete = $bdd ->query($sql);
$livres=$requete -> fetchAll(PDO::FETCH_ASSOC);

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
                        <h1 class="h3 mb-0 text-gray-800 text-center"> Liste Des Livres</h1>
                    </div>

            <?php 
                    
                if (isset($_SESSION['error_update_livre']) && $_SESSION['error_update_livre'] == false) {
                    toto('success', 'La modification a bien été effectué');
                    unset($_SESSION['error_update_livre']);
                }
                    
                if (isset($_SESSION['error_add_livre']) && $_SESSION['error_add_livre'] == false) {
                    toto('success', "L'ajout du livre a bien été effectué!");
                    unset($_SESSION['error_add_livre']);
                }

            ?>

<div class="container">
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Numéro ISBN</th>
            <th scope="col">Titre</th>
            <th scope="col">Illustration</th>
            <th scope="col">Résumé</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Prix d'achat</th>
            <th scope="col">Nombre de pages</th>
            <th scope="col">Date d'achat</th>
            <th scope="col">Disponibilité</th>
            <th scope="col">Voir</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <!-- BOUCLE SUR LE TABLEAU D'OCCURENCE -->
        <?php foreach ($livres as $livre) : ?>
            <tr>
                <!-- AFFICHAGE DES CHAMPS -->
                <th scope="row"><?= $livre['livre_id'] ?></th>
                <td><?= $livre['num_ISBN'] ?></td>
                <td><?= $livre['titre'] ?></td>
                <td><img width="100%" height="100%" src="<?=URL_ADMIN?>img/illustration/<?=$livre['illustration']?>" alt=""></td>
                <td><?= substr($livre['resume'],0,100)?>[...]</td>
                <td><?= $livre['libelle']?></td>
                <td><?= $livre['prix'] ?>€</td>
                <td><?= $livre['nb_pages'] ?></td>
                <td><?= $livre['date_achat'] ?></td>
                <td><?= $livre['disponibilite'] ?></td>
                <td><a href="<?=URL_ADMIN?>livres/single.php?id=<?= $livre['livre_id'] ?>" class="btn btn-success">Voir</a></td>
                <td><a href="<?=URL_ADMIN?>livres/update.php?id=<?= $livre['livre_id'] ?>" class="btn btn-warning">Modifier</a></td>
                <td><a href="<?=URL_ADMIN?>livres/action.php?id=<?= $livre['livre_id'] ?>" class="btn btn-danger">Supprimer</a></td>
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
  