<?php
require "classes/panier.class.php";
require "classes/affichageProduit.class.php";
session_start();

  // la page individuel des produits est accessible qu'avec un parametre id
  if( !isset($_GET['id']) ){

    header('Location: vente.php');
    exit();
  }
  include('trouver-produit.php');


  if( isset($_POST['txtAchat']) ){

    if ( !isset($_SESSION['panier']) ){

      $_SESSION['panier'] = new panier();
    }

    $achatSucces;
    $nombreNegatif;
    $quantiteDansPanier = 0;
    $numeroProduit = htmlspecialchars($_GET['id']);
    $nombreAchat = htmlspecialchars($_POST['txtAchat']);

    if( $nombreAchat <= 0 ){
      $nombreNegatif = true;
    }
    else{
      $nombreNegatif = false;
    }

    if ( isset($_SESSION['panier']) ){

      $quantiteDansPanier = $_SESSION['panier']->combienDansPanier( $numeroProduit );
    }

    if( ($nombreAchat + $quantiteDansPanier) <= $produit->getNbDisponible() ){
      $_SESSION['panier']->ajouter( $numeroProduit,  $nombreAchat );
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
    <title>Accueil - Bienvenue chez monsieur café - La référence en java</title>
    <link media="screen" rel="stylesheet" href="css/style.css" />
    <link media="print" rel="stylesheet" href="css/print-style.css" />
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
      
        <div  id="gridProduit">
          <div>
            <?php
              echo '<img src="images/vente/' . $produit->getNomImage() . '-l.jpg" alt="' . $produit->getNom() . '" />';
            ?>
          </div>
          <div>
            <h2>
              <?php
                echo $produit->getNom();
              ?>
            </h2>
            <p class="textDescription">
              <?php
                echo $produit->getDescription();
              ?>
            </p>
            <p id="prixProduit">
              <?php
                echo $produit->getPrix() . '$';
              ?>
            </p>
            <?php if( $produit->getNbDisponible() > 0 ){ ?>
              <p id="textQuantite"> Quantité </p>
              <form action="<?php echo 'produit.php?id=' . $_GET['id'] ; ?>" method="POST">
                <input type="text" id="txtAchat" name="txtAchat" value="1"/>
                <input id="iconePanierProduit" type="image" src="images/cartIcon.png" alt="Ajouter au panier"/>
              </form>
            <?php
            }
            else{
              echo '<p class="redBackorder">Désolé, ce produit est temporairement en rupture d\'inventaire</p>';
            }

        if( isset($_POST['txtAchat']) ){
          if( $achatSucces && !$nombreNegatif){

            $textSucces = " ont été ";
            if($_POST['txtAchat'] == 1){
  
              $textSucces = " a été ";
            }
            echo '<p class="vertSucces">' . $nombreAchat . ' x '. $produit->getNom() . $textSucces . 'ajouté à votre panier !</p>';
          } elseif( !$achatSucces && !$nombreNegatif){
            echo '<p class="redBackorder">Désolé, la quantité totale demandée dépassait l\'inventaire</p>';
          } else{
            echo '<p class="redBackorder">Erreur, la quantité ne peut pas être 0 ou négative</p>';
          }
        }
      ?>
          </div>
        </div>
    </main>
    <footer>
      <?php
        include('footer.php');
      ?>
    </footer>
  </body>
</html>
