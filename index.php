<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Suez+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Bibliothèque</title>
  </head>
  <body>

<?php 

include('includes/header.php')

?>


<section class="caroussel">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="first_slide">
          <div class="carou_text">
          <h3 class="titre_car">Il est de retour ! </h3>
          <p class="text_car">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit consequuntur reiciendis, in omnis aliquid harum laboriosam quia itaque ipsa fugit placeat debitis? Nisi, officia! Repudiandae doloremque cum ab adipisci voluptatem. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolores ipsa sint officiis accusantium aut quam odio dolorem illum assumenda, amet sunt neque facilis vero quia. Animi veritatis molestias mollitia a!</p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="second_slide">
          <h3 class="titre_car">Nos coups de coeur du moment ! </h3>
          <p class="text_car">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis nobis provident illo illum est quia quaerat eos, laboriosam porro eaque dolor reprehenderit omnis dolorem vitae eius blanditiis assumenda commodi ducimus.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
  </div>
</section>
<section class="info_contain">
<div class="carte">
  <img src="img/Rectangle 13.png" width="349px" height="292px" alt="">
  <h3 class="info_titre">Horaires et Accès</h3>
  <div class="underline"></div>
  <p class="text_carte">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias hic consequuntur similique officia, culpa earum quisquam doloribus consectetur atque cum quo eligendi harum at sequi aspernatur! Aliquam exercitationem facilis quae.</p>
</div>
<div class="carte">
  <img src="img/Rectangle 14.png" width='349px' height="292px" alt="">
  <h3 class="info_titre">Atelier de Lecture</h3>
  <div class="underline"></div>
  <p class="text_carte">Lorem ipsum dolor, sit amet consectetur adipisicing elit. At dignissimos obcaecati architecto ipsam corrupti molestiae ullam soluta molestias optio tempore necessitatibus ut aut facere, facilis, odit dolores? Error, blanditiis nisi!</p>
</div>
<div class="carte">
  <img src="img/Rectangle 15.png"  width='349px' height="292px" alt="">
  <h3 class="info_titre">Médiathèque</h3>
  <div class="underline"></div>
  <p class="text_carte">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur fugiat et placeat magnam minus, saepe nam odit excepturi ad dolore esse autem similique dolor quam minima nostrum exercitationem, soluta corporis?</p>
</div>
</section>

<?php 

include('includes/footer.php')

?>