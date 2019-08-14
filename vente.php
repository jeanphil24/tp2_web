<?php 
require "classes/panier.class.php";
require "classes/itemPanier.class.php";
require "classes/affichageProduit.class.php";

session_start();

if( isset($_GET['id']) ){

  if ( !isset($_SESSION['panier']) ){

    $_SESSION['panier'] = new panier();
  }

  include('trouver-produit.php');

  $_SESSION['panier']->ajouter( $_GET['id'], 1 );
}
?>
<!DOCTYPE html>
<!--Date de création : 31/05/2019 Créateurs : Simon Paris, Jean-Philippe Proteau-Coulombe-->
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>La boutique - Monsieur café - La référence en java</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
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
      <h2>Notre boutique</h2>
      <?php
          if( isset($_GET['id']) ){ 
            echo '<p class="vertSucces">'. $produit->getNom() . ' a été ajouté à votre panier !</p>';
          } 
        ?>
      <div id="gridVente">
        <?php
          include('lister-produits.php');
        ?>
      </div>
    </main>
    <footer>
      <?php
        include('footer.php');
      ?>
    </footer>
  </body>
</html>
