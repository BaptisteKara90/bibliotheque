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
    <title>Contact</title>
  </head>
  <body>
    <?php

    include('includes/header.php')

    ?>

<section class="contact_contain">
    <div class="intro_contact">
    <h1 class="titre_contact">Contacter la Bibliothèque de Campagne</h1>
    <p class="intro_contact">Vous souhaitez obtenir des informations supplémentaires, émettre une réclamation, nous faire part de vos suggestions ou de votre expérience de visite, contactez-nous en complétant ce formulaire.</p>
    <div class="underline2"></div>
    </div>
    <div class="form_contact_contain">
      <div>
        <h1 class="titre_contact_2">Formulaire de Contact</h1>
        <form class="formulaire" method = 'get'>
            <div class="mb-3">
              <label for="nom" class="form-label" name="nom">Nom :</label>
              <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nom">
            </div>
            <div class="mb-3">
              <label for="prenom" class="form-label" name="prenom">Prénom :</label>
              <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="mb-3">
                <label for="ville" class="form-label" name="ville">Ville :</label>
                <input type="text" class="form-control" id="ville" name="ville" aria-describedby="nom">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label" name="email">Courriel :</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="nom">
              </div>
              <div class="mb-3">
                <label for="message" class="form-label" name="message">Message :</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3"></textarea>
              </div>
            <button type="submit" class="btn btn-primary" name="bouton">Envoyer</button>
          </form>
          </div>
          <iframe class='iframe' src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11506.143165875099!2d-0.6419597!3d43.8654494!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x17aa0df60f9afc6b!2s%C3%89cole%20de%20Campagne!5e0!3m2!1sfr!2sfr!4v1642430316128!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
         
    </div>
</section>

   <?php

  include('includes/footer.php')

   ?>