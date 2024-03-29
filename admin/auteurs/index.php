<?php 
include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:'. URL_ADMIN . 'login.php');
    die;
}

$sql = 'SELECT * FROM auteur';
$requete = $bdd -> query($sql);
$auteurs = $requete -> fetchAll(PDO::FETCH_ASSOC);
// var_dump($auteurs);
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
    <link href="<?=URL_ADMIN?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=URL_ADMIN?>css/sb-admin-2.min.css" rel="stylesheet">

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Listes Des Auteurs</h1>
                    </div>

                    <div class="container-fluid">
                <?php 
                        
                if (isset($_SESSION['error_update_auteur']) && $_SESSION['error_update_auteur'] == false) {
                    toto('success', "modification de l'auteur a bien été effectuée");
                    unset($_SESSION['error_update_auteur']);
                }

                if (isset($_SESSION['error_delete_auteur']) && $_SESSION['error_delete_auteur'] == false) {
                    toto('success', "L'auteur a bien été supprimé");
                    unset($_SESSION['error_delete_auteur']);
                }
                        
                ?>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom de plume</th>
            <th scope="col">Adresse</th>
            <th scope="col">Ville</th>
            <th scope="col">Code postal</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Numéro de téléphone</th>
            <th class="col">Photo</th>
            <th scope="col">Voir</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <!-- BOUCLE SUR LE TABLEAU D'OCCURENCE -->
        <?php foreach ($auteurs as $auteur) : ?>
            <tr>
                <!-- AFFICHAGE DES CHAMPS -->
                <th scope="row"><?= $auteur['id'] ?></th>
                <td><?= $auteur['nom'] ?></td>
                <td><?= $auteur['prenom'] ?></td>
                <td><?= $auteur['nom_de_plume'] ?></td>
                <td><?= $auteur['adresse'] ?></td>
                <td><?= $auteur['ville'] ?></td>
                <td><?= $auteur['code_postal'] ?></td>
                <td><?= $auteur['mail'] ?></td>
                <td><?= $auteur['numero'] ?></td>
                <td><img width="100%" height="100%" src="<?= URL_ADMIN ?>img/photo/<?=$auteur['photo']?>" alt=""></td>
                <td><a href="<?=URL_ADMIN?>auteurs/single.php?id=<?= $auteur['id'] ?>" class="btn btn-success">Voir</a></td>
                <td><a href="<?=URL_ADMIN?>auteurs/update.php?id=<?= $auteur['id'] ?>" class="btn btn-warning">Modifier</a></td>
                <td><a href="<?=URL_ADMIN?>auteurs/action.php?id=<?= $auteur['id'] ?>" class="btn btn-danger">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

                </div>
            <!-- End of Main Content -->
        </div>
            <!-- Footer -->
            <?php include PATH_ADMIN . 'includes/footer.php'; ?>