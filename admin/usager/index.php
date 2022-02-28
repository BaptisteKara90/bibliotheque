<?php 
    include '../config/config.php';
    include '../config/bdd.php';
    include '../config/fonctions.php';

    if (!isConnect()) {
        header('location:'. URL_ADMIN . 'login.php');
        die;
    }


    $sql = "SELECT * FROM usager";
    $req = $bdd->query($sql);
    $usagers = $req->fetchAll(PDO::FETCH_ASSOC);

    
    
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
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Liste des usagers</h1>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Voir</th>
                                <th scope="col">Modifer</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($usagers as $usager) : ?>
                                <tr>
                                    <td><?= $usager['id'] ?></td>
                                    <td><?= $usager['nom'] ?></td>
                                    <td><?= $usager['prenom'] ?></td>
                                    <td><?= $usager['adresse'] . ', ' . $usager['code_postal'] . ' ' . $usager['ville']?></td>
                                    <td><?= $usager['mail'] ?></td>
                                    <td><a href="<?=URL_ADMIN?>usager/single.php?id=<?= $usager['id'] ?>" class="btn btn-success">voir</a></td>
                                    <td><a href="<?=URL_ADMIN?>usager/update.php?id=<?= $usager['id'] ?>" class="btn btn-warning">Modifier</a></td>
                                    <td><a href="action.php?id=<?= $usager['id'] ?>" class="btn btn-danger">Supprimer</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            </div>
            <?php
                include '../includes/footer.php';
            ?>
</body>
</html>