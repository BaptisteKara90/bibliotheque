<?php 
include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:'. URL_ADMIN . 'login.php');
    die;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id>0) {
        $sql = 'SELECT * FROM livre WHERE id = :id';
        $requete = $bdd->prepare($sql);
        $requete->execute(array(':id' => $id));
        $livre = $requete ->fetch(PDO::FETCH_ASSOC);
    }else {
        header('location:index.php');
        die;
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
                        <h1 class="h3 mb-0 text-gray-800 text-uppercase"><?=$livre['titre']?></h1>
                    </div>

                    <div class="contain d-flex flex-column mx-5">
                        <div class="align-self-center"><img width="100%" height="100%" src="<?=URL_ADMIN?>img/illustration/<?=$livre['illustration']?>" alt=""></div>
                        <br>
                        <div>Numéro ISBN : <?=$livre['num_ISBN']?></div>
                        <br>
                        <div>Résumé : <?=$livre['resume']?></div>
                        <br>
                        <div>Prix d'achat :  <?=$livre['prix']?>€</div>
                        <br>
                        <div>Nombre de pages :  <?=$livre['nb_pages']?></div>
                        <br>
                        <div>Date d'achat :  <?=$livre['date_achat']?></div>
                        <br>
                        <div>Disponibilité :  <?=$livre['disponibilite']?></div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <a href="<?=URL_ADMIN?>livres/index.php" class="btn btn-success">retour</a>
                    </div>
                </div>
            <!-- End of Main Content -->
        </div>
            <!-- Footer -->
            <?php include PATH_ADMIN . 'includes/footer.php'; ?>