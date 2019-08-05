<!DOCTYPE html>
<!--Date de création : 31/05/2019 Créateurs : Simon Paris, Jean-Philippe Proteau-Coulombe-->
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>La boutique - Monsieur café - La référence en java</title>
    <link rel="stylesheet" href="css/style.css" />
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
      <h2>Notre boutique</h2>
      <div id="gridVente">
      
        <div>
          <img src="images/vente/weaponcup.png" alt="Tasse Arme" />
          <span class="text-boutique">Tasse arme 29,99$</span>
          <a href="#"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>
        </div>

      
        <div>
          <img src="images/vente/tasseRouge.png" alt="Tasse Rouge" />
          <span class="text-boutique">Tasse rouge 39,99$</span>
          <a href="#"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>
        </div>

      
        <div>
          <img src="images/vente/troubleshooting101.png" alt="Tasse troubleshooting101" />
          <span class="text-boutique">Tasse soutien 39,99$</span>
          <a href="#"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>
        </div>

      
        <div>
          <img src="images/vente/thermos.png" alt="Thermpos" />
          <span class="text-boutique">Tasse thermos 89,99$</span>
          <a href="#"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>
        </div>

        <div>
          <img src="images/vente/weaponcup.png" alt="Tasse Arme" />
          <span class="text-boutique">Tasse arme 29,99$</span>
          <a href="#"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>
        </div>

      
        <div>
          <img src="images/vente/tasseRouge.png" alt="Tasse Rouge" />
          <span class="text-boutique">Tasse rouge 39,99$</span>
          <a href="#"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>
        </div>

      
        <div>
          <img src="images/vente/troubleshooting101.png" alt="Tasse troubleshooting101" />
          <span class="text-boutique">Tasse soutien 39,99$</span>
          <a href="#"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>
        </div>

      
        <div>
          <img src="images/vente/thermos.png" alt="Thermpos" />
          <span class="text-boutique">Tasse thermos 89,99$</span>
          <a href="#"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>
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
