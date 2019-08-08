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
  
  <?php
  if (isset($_POST['txtUtilisateur']))
  { 
    // variables du formulaire
    $erreur = 
    $user = htmlspecialchars($_POST['txtUtilisateur']);
    $prenom = htmlspecialchars($_POST['txtPrenom']);
    $nom = htmlspecialchars($_POST['txtNom']);
    $Province = htmlspecialchars($_POST['txtProvince']);
    $Ville = htmlspecialchars($_POST['txtVille']);
    $Adresse = htmlspecialchars($_POST['txtAdresse']);
    $Postal = htmlspecialchars($_POST['txtPostal']);
    $courriel = htmlspecialchars($_POST['txtCourriel']);
    $pass1 = htmlspecialchars($_POST['txtMotDePasse']);
    $pass2 = htmlspecialchars($_POST['txtMotDePasseRep']);


    if ($user == "")
    {
      
    }

  } 
  ?>
  
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
      <h2>Inscription</h2>
      <form action="inscription.php" method="POST" id="formInscription">
        
        <div class="formulaire">
          <label class="labelInfo" for="txtUtilisateur">Nom d'utilisateur :</label>
          <input type="text" id="txtUtilisateur" name="txtUtilisateur" value=""/>
          <span id="errUtilisateur"></span>
        </div>
        
        <div class="formulaire">
          <label class="labelInfo" for="txtPrenom">Prénom :</label>
          <input type="text" id="txtPrenom" name="txtPrenom" value=""/>
          <span id="errPrenom"></span>
        </div>
        
        <div class="formulaire">
            <label class="labelInfo" for="txtNom">Nom :</label>
            <input type="text" id="txtNom" name="txtNom" value=""/>
            <span id="errNom"></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtProvince">Province :</label>
          <input type="text" id="txtProvince" name="txtProvince" value=""/>
          <span id="errProvince"></span>
        </div>
                
        <div class="formulaire">
          <label class="labelInfo" for="txtVille">Ville :</label>
          <input type="text" id="txtVille" name="txtVille" value=""/>
          <span id="errVille"></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtAdresse">Adresse :</label>
          <input type="text" id="txtAdresse" name="txtAdresse" value=""/>
          <span id="errAdresse"></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtPostal">Code Postal :</label>
          <input type="text" id="txtPostal" name="txtPostal" value=""/>
          <span id="errPostal"></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtCourriel">Adresse courriel :</label>
          <input type="text" id="txtCourriel" name="txtCourriel" value="" placeholder="adresse@exemple.com"/>
          <span id="errCourriel"></span>
        </div>
        
        <div class="formulaire">
          <label class="labelInfo" for="txtMotDePasse">Mot de passe :</label>
          <input type="password" id="txtMotDePasse" name="txtMotDePasse" value=""/>
          <span id="errMotDePasse"></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtMotDePasseRep">Répéter le mot de passe :</label>
          <input type="password" id="txtMotDePasseRep" name="txtMotDePasseRep" value=""/>
          <span id="errMotDePasseRep"></span>
        </div>

        <input id="envoyerFormulaire" type="submit" value="Envoyer le formulaire"/>
      </form>
    </main>
    <footer>
      <?php
        include('footer.php');
      ?>
      </footer>
  </body>
</html>
