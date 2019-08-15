<?php 
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
            echo '<h2>Bonjour '.$_SESSION['user'].'</h2>';
            include('form-validation.php');
        }
	?>

        <div class="formulaire">
			<label class="labelInfo" for="txtPrenom">Prénom :</label>
			<span id="txtPrenom"><?php echo $txtPrenom ?></span>
			<span id="errPrenom"><?php echo $errPrenom ?></span>
        </div>
        
        <div class="formulaire">
            <label class="labelInfo" for="txtNom">Nom :</label>
            <input type="text" id="txtNom" name="txtNom" value="<?php echo $txtNom ?>"/>
            <span id="errNom"><?php echo $errNom ?></span>
        </div>

		
		<div class="formulaire">
			<label class="labelInfo" for="selProvince">Province :</label>
			<select id="selProvince" name="selProvince">
				<option value="AB"<?php if($selProvince=="AB") echo 'selected="selected"'; ?>>Alberta</option>
				<option value="BC"<?php if($selProvince=="BC") echo 'selected="selected"'; ?>>Colombie-Britannique</option>		
				<option value="MB"<?php if($selProvince=="MB") echo 'selected="selected"'; ?>>Manitoba</option>
				<option value="NB"<?php if($selProvince=="NB") echo 'selected="selected"'; ?>>Nouveau-Brunswick</option>
				<option value="NL"<?php if($selProvince=="NL") echo 'selected="selected"'; ?>>Terre-Neuve-et-Labrador</option>
				<option value="NS"<?php if($selProvince=="NS") echo 'selected="selected"'; ?>>Nouvelle-Écosse</option>
				<option value="ON"<?php if($selProvince=="ON") echo 'selected="selected"'; ?>>Ontario</option>
				<option value="PE"<?php if($selProvince=="PE") echo 'selected="selected"'; ?>>Île-du-Prince-Édouard</option>
				<option value="QC"<?php if($selProvince=="QC") echo 'selected="selected"'; ?>>Quebec</option>
				<option value="SK"<?php if($selProvince=="SK") echo 'selected="selected"'; ?>>Saskatchewan</option>
				<option value="NT"<?php if($selProvince=="NT") echo 'selected="selected"'; ?>>Territoires du Nord-Ouest</option>
				<option value="NU"<?php if($selProvince=="NU") echo 'selected="selected"'; ?>>Nunavut</option>
				<option value="YT"<?php if($selProvince=="YT") echo 'selected="selected"'; ?>>Yukon</option>
			</select>
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
          <input type="password" id="txtMotDePasse" name="txtMotDePasse" value="<?php echo $txtPass1 ?>" placeholder="Minimun 6 charactères"/>
          <span id="errMotDePasse"><?php echo $errPass1 ?></span>
        </div>

        <div class="formulaire">
          <label class="labelInfo" for="txtMotDePasseRep">Répéter le mot de passe :</label>
          <input type="password" id="txtMotDePasseRep" name="txtMotDePasseRep" value="<?php echo $txtPass2 ?>"/>
          <span id="errMotDePasseRep"><?php echo $errPass2 ?></span>
        </div>

    </main>
    <footer>
      <?php
        include('footer.php');
      ?>
    </footer>
  </body>
</html>