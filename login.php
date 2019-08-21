<?php 
require "classes/personneDao.class.php";
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
         $password = SHA1(htmlspecialchars($_POST['passw']));

         include('connexion.php');
         try 
         {
           $manager = new PersonneDao($db);
           $personne = $manager->get($username);

          if ($personne != null) // if username is found
          {
            if ($personne->getMotPasse() == $password) // if password is correct send to last visited page
            {
              $_SESSION['user'] = $username;
              header('Location:'. $_SESSION['lastPage']);
              exit;
            }
            else // if password is NOT correct display message
            {
              $errPassw = "Le mot de passe n'est pas correcte.";
            }
          }

        }
        catch(Exception $e) 
        {
          if ($username ==""){
            $errUsername = "Vous devez rentrer un nom d'utilisateur.";
          }
          else {
            $errUsername = "Le nom d'utilisateur n'existe pas.";
          }

        }
      $db = null;
       }
      ?>
      
    <h2>Login</h2>
    <form action="login.php" method="POST" id="formlogin">

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
