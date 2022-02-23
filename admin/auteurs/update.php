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
    if($id>0){
        $sql = 'SELECT * FROM auteur WHERE id = :id';
        $requete = $bdd -> prepare($sql);
        $requete -> execute(array(':id' => $id));
        $auteur = $requete ->fetch(PDO::FETCH_ASSOC);
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

    <title>Modifier un auteur</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Modifier un auteur</h1>
                    </div>

                    <?php 
                    
                    if (isset($_SESSION['error_update_auteur']) && $_SESSION['error_update_auteur'] == true) {
                        toto('danger', 'Erreur de la modification du auteur!');
                        unset($_SESSION['error_update_auteur']);
                    }

                    ?>

                    <div class="container">
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $auteur['id'] ?>">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom : </label>
                                <input type="text" name="nom" class="form-control" id="nom" value="<?= $auteur['nom'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom : </label>
                                <input type="text" name="prenom" class="form-control" id="prenom" value="<?= $auteur['prenom'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nom_de_plume" class="form-label">Nom de plume : </label>
                                <input type="text" name="nom_de_plume" class="form-control" id="nom_de_plume" value="<?= $auteur['nom_de_plume'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse : </label>
                                <input type="text" name="adresse" class="form-control" id="adresse" value="<?= $auteur['adresse'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville : </label>
                                <input type="text" name="ville" class="form-control" id="ville" value="<?= $auteur['ville'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="code_postal" class="form-label">Code postal : </label>
                                <input type="text" name="code_postal" class="form-control" id="code_postal" value="<?= $auteur['code_postal'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="mail" class="form-label">E-mail : </label>
                                <input type="text" name="mail" class="form-control" id="mail" value="<?= $auteur['mail'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="numero" class="form-label">Numéro de téléphone : </label>
                                <input type="text" name="numero" class="form-control" id="numero" value="<?= $auteur['numero'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label">Photo : </label>
                                <input type="file" name="photo" class="form-control" id="photo" value="<?= $auteur['photo'] ?>">
                            <div class="mb-3 text-center">
                                <input type="submit" name="btn_update_auteur" class="btn btn-warning">
                                <a href="<?=URL_ADMIN?>auteurs/index.php" class="btn btn-primary">Annuler</a>
                            </div>
                        </form>
                    </div>


                </div>
                <!-- End of Main Content -->
            </div>
            <!-- Footer -->
            <?php include PATH_ADMIN . 'includes/footer.php'; ?>