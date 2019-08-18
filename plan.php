<?php 

require "classes/panier.class.php";
session_start();
?>
<!DOCTYPE html>
<!--Date de création : 31/05/2019 Créateurs : Simon Paris, Jean-Philippe Proteau-Coulombe-->
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <link media="screen" rel="stylesheet" href="css/style.css" />
    <title>Plan du site - Monsieur café - La référence en java</title>
  </head>

  <body>
  <header>
      <?php
        include('header.php');
      ?>
    </header>
    <nav>
      <?php
        include('nav.php');
      ?>
    </nav>
    <main>
      <h2>Le plan du site</h2>
      <ul>
        <li class="listePuceImage"> <a href="index.html">Accueil</a></li>
        <li class="sansPuce">
          <ul class="listePuceImage">
            <li><a href="galerie.php">Galerie photo</a></li>
            <li><a href="vente.php">Boutique : notre magasin en ligne</a></li>
            <li><a href="cafe-monde.php">Histoire du café : une petite introduction à l'histoire du café</a></li>
            <li><a href="sources.php">Références : pour les droits d'auteur</a></li>
            <li><a href="plan.php">Plan du site : vous êtes présentement sur cette page</a></li>
            <li><a href="inscription.php">Inscription : pour devenir membre</a></li>
            <li><a href="login.php">Login : pour se connecter</a></li>
            <li><a href="panier.php">Panier : affiche les items du panier et permet de confirmer la commande</a></li>
          </ul>
        </li>
      </ul>
    </main>
    <footer>
      <?php
        include('footer.php');
      ?>
      </footer>
  </body>
</html>
