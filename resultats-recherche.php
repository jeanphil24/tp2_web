<?php
require "classes/panier.class.php";
require "classes/affichageProduit.class.php";

session_start();
include('recherche-produits.php');

if( isset($_GET['id']) ){

  if ( !isset($_SESSION['panier']) ){

    $_SESSION['panier'] = new panier();
  }

  include('trouver-produit.php');
  $numeroProduit = $produit->getID();

  if ( isset($_SESSION['panier']) ){

    $quantiteDansPanier = $_SESSION['panier']->combienDansPanier( $numeroProduit );
  }

  if( ( 1 + $quantiteDansPanier) <= $produit->getNbDisponible() ){
    $_SESSION['panier']->ajouter( $numeroProduit, 1 );
    $achatSucces = true;
  }
  else{
    $achatSucces = false;
  }
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
      <h2>Résultat de la recherche</h2>
      <?php
          if( isset($_GET['id']) ){
            if ( $achatSucces ){
              echo '<p class="vertSucces">'. $produit->getNom() . ' a été ajouté à votre panier !</p>';
            }else {
              echo '<p class="redBackorder">Désolé, la quantité totale demandée dépassait l\'inventaire</p>';
            }
          } 
        ?>
      <p>
        <?php
        if ($nombreProduits != 0){
            echo 'Nous avons trouvé ' . $nombreProduits . ' produit(s) correspondant à : <span class="gras">' . $_GET['txtRecherche'] . '</span>';
        }
        else{
            echo 'Désolé, nous n\'avons trouvé aucun produit correspondant à : <span class="gras">' . $_GET['txtRecherche'] . '</span>';
        }
        ?>
      </p>
      <?php
            if ($nombreProduits != 0){
                echo '<div id="gridVente">';
                foreach ($listeProduitTrouve as $produit){
                    
                  if ( $produit->getNbDisponible() > 0 ){

                    echo '<div>';
                    echo '<a href="produit.php?id=' . $produit->getID() . '"><img src="images/vente/' . $produit->getNomImage() . '-t.jpg" alt="' . $produit->getNom() . '" />';
                    echo '<span class="text-boutique">' . $produit->getNom() . ' ' . $produit->getPrix() . '$' . '</span></a>';
                    echo '<a href="resultats-recherche.php?txtRecherche=' . $_GET['txtRecherche'] . '&id=' . $produit->getID() . '"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>' ;
                    echo '</div>';
                  }else{
                    
                    echo '<div>';
                    echo '<a href="produit.php?id=' . $produit->getID() . '"><img src="images/vente/' . $produit->getNomImage() . '-t.jpg" alt="' . $produit->getNom() . '" />';
                    echo '<span class="text-boutiqueNonDispo">' . $produit->getNom() . ' ' . $produit->getPrix() . '$' . '</span></a>';
                    echo '<p class="boutiqueBackorder">Temporairement non disponible</p>' ;
                    echo '</div>';
                }
                  }
                echo '</div>';
            }
        ?>
    </main>
    <footer>
      <?php
        include('footer.php');
      ?>
    </footer>
  </body>
</html>