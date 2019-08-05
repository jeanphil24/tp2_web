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
    <script src="js/inscription.js"></script>
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
      <h2>Inscription</h2>
      <form action="mailto:kf@MaCompagnie.com" method="POST" id="formInscription">
        <div class="formulaire">
          <label class="labelInfo" for="txtUtilisateur">Nom d'utilisateur :</label>
          <input type="text" id="txtUtilisateur" name="txtUtilisateur" value=""/>
          <span id="errUtilisateur"></span>
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
          <label class="labelInfo" for="txtCourriel">Adresse courriel :</label>
          <input type="text" id="txtCourriel" name="txtCourriel" value="" placeholder="adresse@exemple.com"/>
          <span id="errCourriel"></span>
        </div>
        <div class="formulaire">
          <label class="labelInfo" for="dateNaissance">Date de naissance :</label>
          <input type="text" id="dateNaissance" name="dateNaissance" value="" placeholder="aaaa-mm-jj"/>
          <span id="errNaissance"></span>
        </div>
        <div id="interetsCheckboxes" class="formulaire">
          <span id="interets">Vos intérêts :</span>
          <div class="formulaire">
            <input type="checkbox" id="cafeMoulu" name="cafeMoulu"/>
            <label for="cafeMoulu">Café moulu</label>
            <span id="errInterets"></span>
          </div>
          <div class="formulaire">
            <input type="checkbox" id="cafeGrain" name="cafeGrain"/>
            <label for="cafeGrain">Café en grain</label>
          </div>
          <div class="formulaire">
            <input type="checkbox" id="espresso" name="espresso"/>
            <label for="espresso">Les espressos</label>
          </div>
          <div class="formulaire">
            <input type="checkbox" id="allonge" name="allonge"/>
            <label for="allonge">Les allongés</label>
          </div>
          <div class="formulaire">
            <input type="checkbox" id="artMousse" name="artMousse"/>
            <label for="artMousse">L'art sur mousse</label>
          </div>
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
