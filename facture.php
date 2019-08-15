<?php 
require "classes/personneDao.class.php";
require "classes/panier.class.php";
require "classes/itemPanier.class.php";
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
            echo "Bonjour " . $_SESSION['user'];
            echo "Voici vortre facture";
      include ('connexion.php');
    }
    $db = null;
	 ?>

    </main>
    <footer>
      <?php
        include('footer.php');
      ?>
    </footer>
  </body>
</html>