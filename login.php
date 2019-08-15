<?php 
require "classes/personneDao.class.php";
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
      $errUsername ="";
      $errPassw = "";
      $username="";
    
      if (isset($_POST['username']))
      {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['passw']);

        include('connexion.php');
        
        try 
        {
          $manager = new PersonneDao($db);
          $listePersonnes = $manager->getListePersonnes();
          $usernameExists = false;
          foreach($listePersonnes as $personne)
          {
            if ($personne->getLogin() == $username)
            {
              $usernameExists=true;
              if ($personne->getMotPasse() == $password)
              {
                $_SESSION['user'] = $username;
                header('Location:'. $_SESSION['lastPage']);
                exit;
              }
              else
              {
                $errPassw = "Le mot de passe n'est pas correcte.";
              }
            }
          }
          if (!$usernameExists)
          {
            $errUsername = "Le nom d'utilisateur n'existe pas.";
          }  
        }
        catch(Exception $e) 
        {
          die('Erreur : '.$e->getMessage());
        }
      $db = null;
      }
      ?>
      

    <h2>Login</h2>
    <form action="login.php"method="POST" id="formlogin">

     <div class="loginform">
        <label for="username"><b>Username</b></label>
        <input class="loginText" type="text" placeholder="Enter Username" id="username" name="username" value="<?php echo $username ?>">
        <span id="errUsername"><?php echo $errUsername ?></span>
        <p></p>
        <label for="passw"><b>Password</b></label>
        <input class="loginText" type="password" placeholder="Enter Password" id="passw" name="passw">
        <span id="errPassw"><?php echo $errPassw ?></span>
            
        <button id="login" type="submit">Login</button>
        <a class= "creerCompte" href="inscription.php">Créer un compte</a>
    </div>
</form>
    </main>
    <footer>
      <?php
        include('footer.php');
      ?>
    </footer>
  </body>
</html>
