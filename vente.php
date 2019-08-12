<?php 
session_start();
include('lister-produits.php');

if( isset($_GET['id'] ){
  if ( !isset($_SESSION['panier']) ){

    $_SESSION['panier'] = new panier();
  }
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
      <div id="gridVente">
      
        <?php
          foreach ($listeProduit as $produit){ 
            echo '<div>';
            echo '<a href="produit.php?id=' . $produit->getID() . '"><img src="images/vente/' . $produit->getNomImage() . '-t.jpg" alt="' . $produit->getNom() . '" />';
            echo '<span class="text-boutique">' . $produit->getNom() . ' ' . $produit->getPrix() . '$' . '</span></a>';
            echo '<a href="#"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>' ;
            echo '</div>';
          } 
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
