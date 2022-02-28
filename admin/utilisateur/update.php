<?php

include '../config/config.php';
include '../config/fonctions.php';
include '../config/bdd.php';

if (!isConnect()) {
    header('location:' . URL_ADMIN . 'login.php');
    die;
}

if (!isAdmin()) {
    header('location:' . URL_ADMIN . 'index.php');
}

$sql = 'SELECT * FROM role';
$requete = $bdd->query($sql);
$roles = $requete->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        $sql = 'SELECT * FROM utilisateur WHERE id = ?';
        $requete = $bdd->prepare($sql);
        $requete->execute(array($id));
        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);
    } else {
        header('location:index.php');
    }
}

$sql = 'SELECT id_role FROM role_utilisateur WHERE id_utilisateur = ?';
$requete = $bdd->prepare($sql);
$requete->execute([$id]);
$role_utilisateur = $requete->fetchAll(PDO::FETCH_NUM);
$role_id = [];
if (count($role_utilisateur) > 1) {
    foreach ($role_utilisateur as $id_role) {
        $role_id[] = implode(' ', $id_role);
    }
} else {
    $role_id = $role_utilisateur[0];
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
    <!-- SELECT2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <h1 class="h3 mb-0 text-gray-800">Modifier un utilisateur</h1>
                </div>
                <form action="action.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" name="nom" class="form-control" id="nom" value="<?= $utilisateur['nom'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom :</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" value="<?= $utilisateur['prenom'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Pseudo :</label>
                        <input type="text" name="pseudo" class="form-control" id="pseudo" value="<?= $utilisateur['pseudo'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="mail" class="form-label">Mail :</label>
                        <input type="email" name="mail" class="form-control" id="mail" value="<?= $utilisateur['mail'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="numero_telephone" class="form-label">Numéro de téléphone :</label>
                        <input type="text" name="numero_telephone" class="form-control" id="numero_telephone" value="<?= $utilisateur['num_telephone'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar :</label>
                        <input type="file" name="avatar" class="form-control" id="avatar" value="<?= $utilisateur['avatar'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="adresse" class="form-label">Adresse :</label>
                        <input type="text" name="adresse" class="form-control" id="adresse" value="<?= $utilisateur['adresse'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville :</label>
                        <input type="text" name="ville" class="form-control" id="ville" value="<?= $utilisateur['ville'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="code_postal" class="form-label">Code postal :</label>
                        <input type="text" name="code_postal" class="form-control" id="code_postal" value="<?= $utilisateur['code_postal'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role : </label>
                        <select class="js-example-basic-multiple" name="role[]" multiple="multiple">
                            <?php foreach ($roles as $role) : ?>
                                <?php if (in_array($role['id'], $role_id)) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }  ?>
                                <option value="<?= $role['id'] ?>" <?= $selected ?>> <?= $role['libelle'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3 text-center">
                        <input type="submit" class="btn btn-primary" value="Ajouter" name="btn_update_utilisateur">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?php
    include '../includes/footer.php';
    ?>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
</body>

</html>