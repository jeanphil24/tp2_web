<?php session_start() ?>
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

    <h2>Login</h2>
    <form action="compte.php"method="POST" id="formlogin">

     <div class="container">
        <label for="uname"><b>Username</b></label>
        <input class="loginText" type="text" placeholder="Enter Username" name="uname">

        <label for="psw"><b>Password</b></label>
        <input class="loginText" type="password" placeholder="Enter Password" name="psw">
            
        <button id="login" type="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
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
