<?php 
include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:'. URL_ADMIN . 'login.php');
    die;
}


$sql = 'SELECT * FROM editeur';
$requete = $bdd ->query($sql);
$editeurs=$requete -> fetchAll(PDO::FETCH_ASSOC);
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 text-center"> Liste Des editeurs</h1>
                    </div>


<div class="container">
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Dénomination</th>
            <th scope="col">SIRET</th>
            <th scope="col">Adresse</th>
            <th scope="col">Mail</th>
            <th scope="col">Numéro de téléphone</th>
            <th scope="col">Voir</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <!-- BOUCLE SUR LE TABLEAU D'OCCURENCE -->
        <?php foreach ($editeurs as $editeur) : ?>
            <tr>
                <!-- AFFICHAGE DES CHAMPS -->
                <th scope="row"><?= $editeur['id'] ?></th>
                <td><?= $editeur['denomination'] ?></td>
                <td><?= $editeur['siret'] ?></td>
                <td><?= $editeur['adresse'] . ', ' . $editeur['code_postal'] . ' ' . $editeur['ville'] ?></td>
                <td><?= $editeur['mail'] ?></td>
                <td><?= $editeur['numero_tel'] ?></td>
                <td><a href="<?=URL_ADMIN?>editeur/single.php?id=<?= $editeur['id'] ?>" class="btn btn-success">Voir</a></td>
                <td><a href="<?=URL_ADMIN?>editeur/update.php?id=<?= $editeur['id'] ?>" class="btn btn-warning">Modifier</a></td>
                <td><a href="<?=URL_ADMIN?>editeur/action.php?id=<?= $editeur['id'] ?>" class="btn btn-danger">Supprimer</a></td>
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