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
		include('form-validation.php');
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
          <input type="text" id="txtUtilisateur" name="txtUtilisateur" value="<?php echo $txtUser ?>"/>
          <span id="errUtilisateur"> <?php echo $errUser ?> </span>
        </div>
        
        <div class="formulaire">
          <label class="labelInfo" for="txtPrenom">Prénom :</label>
          <input type="text" id="txtPrenom" name="txtPrenom" value="<?php echo $txtPrenom ?>"/>
          <span id="errPrenom"><?php echo $errPrenom ?></span>
        </div>
        
        <div class="formulaire">
            <label class="labelInfo" for="txtNom">Nom :</label>
            <input type="text" id="txtNom" name="txtNom" value="<?php echo $txtNom ?>"/>
            <span id="errNom"><?php echo $errNom ?></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtProvince">Province :</label>
          <input type="text" id="txtProvince" name="txtProvince" value="<?php echo $txtProvince ?>"/>
          <span id="errProvince"><?php echo $errProvince ?></span>
        </div>
                
        <div class="formulaire">
          <label class="labelInfo" for="txtVille">Ville :</label>
          <input type="text" id="txtVille" name="txtVille" value="<?php echo $txtVille ?>"/>
          <span id="errVille"><?php echo $errVille ?></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtAdresse">Adresse :</label>
          <input type="text" id="txtAdresse" name="txtAdresse" value="<?php echo $txtAdresse ?>"/>
          <span id="errAdresse"><?php echo $errAdresse ?></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtPostal">Code Postal :</label>
          <input type="text" id="txtPostal" name="txtPostal" value="<?php echo $txtPostal ?>" placeholder="A1A 1A1"/>
          <span id="errPostal"><?php echo $errPostal ?></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtCourriel">Adresse courriel :</label>
          <input type="text" id="txtCourriel" name="txtCourriel" value="<?php echo $txtCourriel ?>" placeholder="adresse@exemple.com"/>
          <span id="errCourriel"><?php echo $errCourriel ?></span>
        </div>
        
        <div class="formulaire">
          <label class="labelInfo" for="txtMotDePasse">Mot de passe :</label>
          <input type="password" id="txtMotDePasse" name="txtMotDePasse" value="<?php echo $txtPass1 ?>"/>
          <span id="errMotDePasse"><?php echo $errPass1 ?></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtMotDePasseRep">Répéter le mot de passe :</label>
          <input type="password" id="txtMotDePasseRep" name="txtMotDePasseRep" value="<?php echo $txtPass2 ?>"/>
          <span id="errMotDePasseRep"><?php echo $errPass2 ?></span>
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
