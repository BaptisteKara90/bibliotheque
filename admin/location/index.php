<?php 
include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:'. URL_ADMIN . 'login.php');
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

<div class="container">
<table class="table">
    <thead>
        <tr>
            
            <th scope="col">Voir</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
            <tr>
               
                <td><a href="<?=URL_ADMIN?>location/single.php" class="btn btn-success">Voir</a></td>
                <td><a href="<?=URL_ADMIN?>location/update.php" class="btn btn-warning">Modifier</a></td>
                <td><a href="<?=URL_ADMIN?>location/action.php" class="btn btn-danger">Supprimer</a></td>
            </tr>
    </tbody>
</table>
</div>

                </div>
            <!-- End of Main Content -->
        </div>
            <!-- Footer -->
            <?php include PATH_ADMIN . 'includes/footer.php'; ?>
  