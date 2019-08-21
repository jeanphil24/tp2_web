<?php 
require "classes/panier.class.php";
session_start();

if(!isset($_SESSION['user'])) 
{
  header('Location:login.php');
  exit;
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
     
	<?php
    if(!isset($_SESSION['user'])) 
    {
        header('Location:index.php');
        exit;
    }

    else
    {
      include('clientinfo-validation.php');
      echo '<p class="bonjourUser">Bonjour '.$_SESSION['user'].'</p>';

    }
	?>

    <div class="formulaire">
      <label class="labelInfo" for="txtPrenom">Prénom :</label>
      <span id="txtPrenom"><?php echo $txtPrenom ?></span>
      <span id="errPrenom"><?php echo $errPrenom ?></span>
    </div>
    
    <div class="formulaire">
      <label class="labelInfo" for="txtNom">Nom :</label>
      <span id="txtNom"><?php echo $txtNom ?></span>
      <span id="errNom"><?php echo $errNom ?></span>
    </div>

  
    <div class="formulaire">
      <label class="labelInfo" for="selProvince">Province :</label>
      <span id="selProvince"><?php echo $selProvince ?></span>
      <span id="errProvince"><?php echo $errProvince ?></span>
    </div>

                
    <div class="formulaire">
      <label class="labelInfo" for="txtVille">Ville :</label>
      <span id="txtVille"><?php echo $txtVille ?></span>
      <span id="errVille"><?php echo $errVille ?></span>
    </div>

    <div class="formulaire">
      <label class="labelInfo" for="txtAdresse">Adresse :</label>
      <span id="txtAdresse"><?php echo $txtAdresse ?></span>
      <span id="errAdresse"><?php echo $errAdresse ?></span>
    </div>

    <div class="formulaire">
      <label class="labelInfo" for="txtPostal">Code Postal :</label>
      <span id="txtPostal"><?php echo $txtPostal ?></span>
      <span id="errPostal"><?php echo $errPostal ?></span>
    </div>

    <div class="formulaire">
      <label class="labelInfo" for="txtCourriel">Adresse courriel :</label>
      <span id="txtCourriel"><?php echo $txtCourriel ?></span>
      <span id="errCourriel"><?php echo $errCourriel ?></span>
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