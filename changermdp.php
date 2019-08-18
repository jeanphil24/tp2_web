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
    <title>Inscription - Monsieur café - La référence en java</title>
    <link media="screen" rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <!-- script src="js/inscription.js"></script> -->
  </head>
  <body>
    <?php include('validation-mdp.php')?>
  <header>
      <?php include('header.php')?>
    </header>
    <nav>
      <?php include('nav.php')?>
    </nav>
    <main>
        <?php
          if (!isset($_SESSION['user']))
          {
            header('Location:index.php');
			exit;
          }
          ?>
        <h2>Changement de mot de passe</h2>
          
        <span id="success"><?php echo $success ?></span>
        <form action="changermdp.php" method="POST"> 

        <div class="formulaire">
            <label class="labelInfo" for="txtMDPOriginal">Ancien mot de passe: </label>
            <input type="password" id="txtMDPOriginal" name="txtMDPOriginal"/>
            <span id="errMDPOriginal"><?php echo $errMDPOriginal ?></span>
        </div>

        <div class="formulaire">
            <label class="labelInfo" for="txtMDP1">Nouveau mot de passe :</label>
            <input type="password" id="txtMDP1" name="txtMDP1" placeholder="Minimun 6 charactères"/>
            <span id="errMDP1"><?php echo $errMDP1 ?></span>
        </div>

        <div class="formulaire">
            <label class="labelInfo" for="txtMDP2">Répéter le mot de passe :</label>
            <input type="password" id="txtMDP2" name="txtMDP2" />
            <span id="errMDP2"><?php echo $errMDP2 ?></span>
        </div>
        <button id="envoyerFormulaire" type="submit" value=""> Confirmer </button>
      </form>
    </main>
    <footer>
      <?php
        include('footer.php');
      ?>
      </footer>
  </body>
</html>
