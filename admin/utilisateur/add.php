<?php 
    include '../config/config.php';
    include '../config/fonctions.php';

    if (!isConnect()) {
        header('location:'. URL_ADMIN . 'login.php');
        die;
    }

    if(!isAdmin()){
        header('location:'. URL_ADMIN. 'index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Dashboard</title>
    <!-- Custom fonts for this template-->
    <link href="http://localhost/bibliotheque/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="http://localhost/bibliotheque/admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include '../includes/sidebar.php';
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <?php
                    include '../includes/topbar.php';
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ajouter un utilisateur</h1>
                    </div>
                    <form action="action.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom :</label>
                            <input type="text" name="nom" class="form-control" id="nom">
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom :</label>
                            <input type="text" name="prenom" class="form-control" id="prenom">
                        </div>
                        <div class="mb-3">
                            <label for="pseudo" class="form-label">Pseudo :</label>
                            <input type="text" name="pseudo" class="form-control" id="pseudo">
                        </div>
                        <div class="mb-3">
                            <label for="mail" class="form-label">Mail :</label>
                            <input type="email" name="mail" class="form-control" id="mail">
                        </div>
                        <div class="mb-3">
                            <label for="mdp" class="form-label">Mot de passe :</label>
                            <input type="password" name="mdp" class="form-control" id="mdp">
                        </div>
                        <div class="mb-3">
                            <label for="numero_telephone" class="form-label">Numéro de téléphone :</label>
                            <input type="text" name="numero_telephone" class="form-control" id="numero_telephone">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Avatar :</label>
                            <input type="file" name="avatar" class="form-control" id="avatar">
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse :</label>
                            <input type="text" name="adresse" class="form-control" id="adresse">
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville :</label>
                            <input type="text" name="ville" class="form-control" id="ville">
                        </div>
                        <div class="mb-3">
                            <label for="code_postal" class="form-label">Code postal :</label>
                            <input type="text" name="code_postal" class="form-control" id="code_postal">
                        </div>
                        <div class="mb-3 text-center">
                            <input type="submit" class="btn btn-primary" value="Ajouter" name="btn_add_utilisateur">
                        </div>
                    </form>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
                include '../includes/footer.php';
            ?>
</body>
</html>
