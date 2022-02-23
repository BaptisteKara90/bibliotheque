<?php 
    include '../config/config.php';
    include '../config/bdd.php';
    include '../config/fonctions.php';

    if (!isConnect()) {
        header('location:'. URL_ADMIN . 'login.php');
        die;
    }

    if (!isAdmin()) {
        header('location:' . URL_ADMIN . 'index.php');
    }

    // $sql = "SELECT * FROM utilisateur";
    $sql = 'SELECT utilisateur.id AS utilisateur_id, utilisateur.nom , utilisateur.prenom , utilisateur.mail , utilisateur.num_telephone , utilisateur.adresse , utilisateur.ville , utilisateur.code_postal, utilisateur.avatar , role.libelle FROM role_utilisateur INNER JOIN role ON role_utilisateur.id_role = role.id INNER JOIN utilisateur ON role_utilisateur.id_utilisateur = utilisateur.id';
    $req = $bdd->query($sql);
    $utilisateurs = $req->fetchAll(PDO::FETCH_ASSOC);
    
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
                        <h1 class="h3 mb-0 text-gray-800">Liste des utilisateurs</h1>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">rôle</th>
                                <th scope="col">Modifer</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($utilisateurs as $utilisateur) : ?>
                                <tr>
                                    <td><?= $utilisateur['utilisateur_id'] ?></td>
                                    <td><?= $utilisateur['nom'] ?></td>
                                    <td><?= $utilisateur['prenom'] ?></td>
                                    <td><?= $utilisateur['mail'] ?></td>
                                    <td><?= $utilisateur['num_telephone'] ?></td>
                                    <td><?= $utilisateur['adresse'] . ', ' . $utilisateur['code_postal'] . ' ' . $utilisateur['ville']?></td>
                                    <td><img width="75px" height="75px" src="<?= URL_ADMIN ?>img/avatar/<?= $utilisateur['avatar'] ?>" alt=""></td>
                                    <td><?= $utilisateur['libelle']?></td>
                                    <td><a href="<?=URL_ADMIN?>utilisateur/single.php?id=<?= $utilisateur['utilisateur_id'] ?>" class="btn btn-success">voir</a></td>
                                    <td><a href="<?=URL_ADMIN?>utilisateur/update.php?id=<?= $utilisateur['utilisateur_id'] ?>" class="btn btn-warning">Modifier</a></td>
                                    <td><a href="action.php?id=<?= $utilisateur['utilisateur_id'] ?>" class="btn btn-danger">Supprimer</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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