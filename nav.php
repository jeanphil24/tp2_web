<div id="top-menu">
        <a href="panier.php" id="lienPanier">Votre panier( 
                <?php if ( isset($_SESSION['panier']) ){
                        echo $_SESSION['panier']->compterProduits(); }
                        else{ echo "0";} ?> ) </a>
        <img src="images/panier.png" alt="panier d'achat">
        
                <?php 
                        if(isset($_SESSION['user']))
                        {
                                echo '<a href="logout.php" id="lienPanier">Logout</a>';
                        }
                        else
                        {
                                echo '<a href="se-connecter.php" id="lienPanier">Login</a>';
                        }
                ?>
</div>
<ul id="menu">
        <li class="item-menu"><a href="index.php">Accueil</a></li>
        <li class="item-menu"><a href="galerie.php">Galerie photo</a></li>
        <li class="item-menu"><a href="vente.php">Boutique</a></li>
        <li class="item-menu"><a href="cafe-monde.php">Histoire du café</a></li>
        <li class="item-menu"><a href="sources.php">Références</a></li>
        <li class="item-menu"><a href="plan.php">Plan du site</a></li>
        <?php 
                if(isset($_SESSION['user']))
                {
                        echo '<li class="item-menu"><a href="compte.php">Mon Compte</a></li>';
                }
                else
                {
                        echo '<li class="item-menu"><a href="inscription.php">inscription</a></li>';
                }
        ?>

</ul>




