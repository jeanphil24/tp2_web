<?php 

require "classes/panier.class.php";
require "classes/itemPanier.class.php";
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
            <li><a href="galerie.html">Galerie photo</a></li>
            <li><a href="vente.html">Boutique : notre magasin en ligne</a></li>
            <li><a href="cafe-monde.html">Histoire du café : une petite introduction à l'histoire du café</a></li>
            <li><a href="sources.html">Références : pour les droits d'auteur</a></li>
            <li><a href="plan.html">Plan du site : vous êtes présentement sur cette page</a></li>
            <li><a href="inscription.html">Inscription : pour devenir membre</a></li>
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
