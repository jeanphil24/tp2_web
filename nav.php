<div id="top-menu">
        <a href="panier.php" id="lienPanier">Votre panier( 
                <?php if ( isset($_SESSION['panier']) ){
                        echo $_SESSION['panier']->compterProduits(); }
                        else{ echo "0";} ?> ) </a>
        <img src="images/panier.png" alt="panier d'achat">
        <a href="se-connecter.php" id="lienPanier">Login </a>
</div>
<ul id="menu">
        <li class="item-menu"><a href="index.php">Accueil</a></li>
        <li class="item-menu"><a href="galerie.php">Galerie photo</a></li>
        <li class="item-menu"><a href="vente.php">Boutique</a></li>
        <li class="item-menu"><a href="cafe-monde.php">Histoire du café</a></li>
        <li class="item-menu"><a href="sources.php">Références</a></li>
        <li class="item-menu"><a href="plan.php">Plan du site</a></li>
        <li class="item-menu"><a href="inscription.php">Inscription</a></li>
</ul>




