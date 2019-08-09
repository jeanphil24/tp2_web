<?php session_start() ?>
<!DOCTYPE html>
<!--Date de création : 31/05/2019 Créateurs : Simon Paris, Jean-Philippe Proteau-Coulombe-->
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Galerie  - Monsieur café - La référence en java</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/galerie.js"></script>
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
      <h2>Galerie photo</h2>

      <div id="thumbnails">
        <img class="selection" src="images/thumbnails/0.png" alt="Image 0"/>
        <img src="images/thumbnails/1.png" alt="Image 1"/>
        <img src="images/thumbnails/2.png" alt="Image 2"/>
        <img src="images/thumbnails/3.png" alt="Image 3"/>
        <img src="images/thumbnails/4.png" alt="Image 4"/>
      </div>

         <div id="images">
            <div class="fleches">
                <img id="imagePrecedante" class="center" src="images/fleche-gauche.png" alt="Left arrow" />
            </div>

            <div class="center">
                <img id="imageGrande" class="center" src="images/0.png" alt="picture 1" />
                <button id="visionneuse" type="button">Arretez la visionneuse</button>
            </div>

            <div class="fleches">
                <img id="imageProchaine" class="center" src="images/fleche-droite.png" alt="Right arrow" />
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