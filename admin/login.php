<?php
include 'config/config.php';
include 'config/fonctions.php';

if (isConnect()) {
    header('location:'. URL_ADMIN . 'index.php');
    die;
}

?>
<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
</head>

<body>
    <h1 class="text-center">Login : </h1>
<div class="container">
    <form action="action.php" method="POST">
        <div class="mb-3">
            <label for="mail" class="form-label">Adresse Mail : </label>
            <input type="email" class="form-control" id="mail" name="mail">
        </div>
        <div class="mb-3">
            <label for="mdp" class="form-label">Mot de Passe : </label>
            <input type="password" class="form-control" id="mdp" name="mdp">
        </div>
        <button type="submit" class="btn btn-primary" name="btn_log_user">Envoyer</button>
    </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>