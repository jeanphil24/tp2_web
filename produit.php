<?php
require "classes/panier.class.php";
require "classes/itemPanier.class.php";
session_start();

  // la page individuel des produits est accessible qu'avec un parametre id
  if( !isset($_GET['id']) ){

    header('Location: index.php');
    exit();
  }
  include('trouver-produit.php');

  if ( !isset($_SESSION['panier']) ){

    $_SESSION['panier'] = new panier();
  }
  if( isset($_POST['txtAchat']) ){
    
    $_SESSION['panier']->ajouter( $_GET['id'], $_POST['txtAchat'] );
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
              echo '<img src="images/vente/' . $produit['image'] . '-l.jpg" alt="' . $produit['nom'] . '" />';
            ?>
          </div>
          <div>
            <h2>
              <?php
                echo $produit['nom'];
              ?>
            </h2>
            <p class="textDescription">
              <?php
                echo $produit['description'];
              ?>
            </p>
            <p id="prixProduit">
              <?php
                echo $produit['prix'] . '$';
              ?>
            </p>
            <p id="textQuantite">
              Quantité
            </p>
            <form action="<?php echo 'produit.php?id=' . $_GET['id'] ; ?>" method="POST">

              <input type="text" id="txtAchat" name="txtAchat" value="1"/>
              <input id="iconePanierProduit" type="image" src="images/cartIcon.png" alt="Ajouter au panier"/>
            </form>
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
