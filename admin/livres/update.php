<?php

include '../config/config.php';
include '../config/bdd.php';
include '../config/fonctions.php';

if (!isConnect()) {
    header('location:' . URL_ADMIN . 'login.php');
    die;
}

$sql = 'SELECT * FROM categorie';
$requete = $bdd->query($sql);
$categories = $requete->fetchAll(PDO::FETCH_ASSOC);

$sql = 'SELECT * FROM auteur';
$requete = $bdd->query($sql);
$auteurs = $requete -> fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if ($id > 0) {
        $sql = 'SELECT * FROM livre WHERE id = :id';
        $requete = $bdd->prepare($sql);
        $requete->execute(array(':id' => $id));
        $livre = $requete->fetch(PDO::FETCH_ASSOC);
    } else {
        header('location:index.php');
        die;
    }
}

$sql = 'SELECT id_categorie FROM categorie_livre WHERE id_livre= ?';
$requete = $bdd->prepare($sql);
$requete -> execute([$id]);
$categorie_livre = $requete -> fetchAll(PDO::FETCH_NUM);
$categorie_id = [];
if (count($categorie_livre) >= 1) {
    foreach ($categorie_livre as $id_categorie) {
        $categorie_id[] = implode('', $id_categorie);
    }
}else {
    $categorie_id = $categorie_livre[0];
}

$sql = 'SELECT id_auteur FROM auteur_livre WHERE id_livre = ?';
$requete = $bdd->prepare($sql);
$requete -> execute([$id]);
$auteur_livre = $requete -> fetchAll(PDO::FETCH_NUM);
$auteur_id = [];
if (count($auteur_livre) > 1){
    foreach ($auteur_livre as $id_auteur) {
        $auteur_id[] = implode(' ', $id_auteur);
    }
}else {
    $auteur_id = $auteur_livre[0];
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

    <title>Modifier un livre</title>

    <!-- Custom fonts for this template-->
    <link href="<?= URL_ADMIN ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= URL_ADMIN ?>css/sb-admin-2.min.css" rel="stylesheet">

    <!-- SELECT2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                        <h1 class="h3 mb-0 text-gray-800">Modifier un livre</h1>
                    </div>

                    <?php

                    if (isset($_SESSION['error_update_livre']) && $_SESSION['error_update_livre'] == true) {
                        toto('danger', 'Erreur de la modification du livre!');
                        unset($_SESSION['error_update_livre']);
                    }

                    ?>

                    <div class="container">
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $livre['id'] ?>">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Numéro ISBN : </label>
                                <input type="text" name="num_isbn" class="form-control" id="num_isbn" value="<?= $livre['num_ISBN'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="titre" class="form-label">Titre : </label>
                                <input type="text" name="titre" class="form-control" id="titre" value="<?= $livre['titre'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="illustration" class="form-label">Illustration : </label>
                                <input type="file" name="illustration" class="form-control" id="illustration" value="<?= $livre['illustration'] ?>">
                            </div>
                            <div class="mb-3">
                                <select class="js-example-basic-multiple" name="auteur[]" multiple="multiple">
                                    <?php foreach ($auteurs as $auteur) : ?>
                                        <?php if (in_array($auteur['id'], $auteur_id)) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }  ?>
                                        <option value="<?= $auteur['id'] ?>" <?= $selected ?>> <?= $auteur['nom'] . ' ' . $auteur['prenom'] . ' ' . $auteur['nom_de_plume'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="resume" class="form-label">Résumé : </label>
                                <textarea class="form-control" name="resume" id="resume" rows="3"><?= $livre['resume'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <select class="js-example-basic-multiple" name="categorie[]" multiple="multiple">
                                    <?php foreach ($categories as $categorie) : ?>
                                        <?php if (in_array($categorie['id'], $categorie_id)) {
                                            $selected = 'selected';
                                        } else {
                                            $selected = '';
                                        }  ?>
                                        <option value="<?= $categorie['id'] ?>" <?= $selected ?>> <?= $categorie['libelle'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="prix" class="form-label">Prix d'achat : </label>
                                <input type="number" name="prix" class="form-control" id="prix" value="<?= $livre['prix'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nb_pages" class="form-label">Nombre de pages : </label>
                                <input type="number" name="nb_pages" class="form-control" id="nb_pages" value="<?= $livre['nb_pages'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="disponibilite" class="form-label">Disponibilité : </label>
                                <input type="number" name="disponibilite" class="form-control" id="disponibilite" value="<?= $livre['disponibilite'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="date_achat" class="form-label">Date d'achat : </label>
                                <input type="date" name="date_achat" class="form-control" id="date_achat" value="<?= $livre['date_achat'] ?>">
                                <div class="mb-3 text-center">
                                    <input type="submit" name="btn_update_livre" class="btn btn-warning">
                                    <a href="<?= URL_ADMIN ?>livres/index.php" class="btn btn-primary">Annuler</a>
                                </div>
                        </form>
                    </div>


                </div>
                <!-- End of Main Content -->
            </div>
            <!-- Footer -->
            <?php include PATH_ADMIN . 'includes/footer.php'; ?>
            <script>
                $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();
                });
            </script>