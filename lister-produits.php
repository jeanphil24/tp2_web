<?php
    
    include('connexion.php');
    $listeProduit;
    //$nombreProduits = 0;

    try {

        $reponse = $db->prepare( "CALL lister_produits()" );
        $reponse->execute();

        while( $ligne = $reponse -> fetch() ){

            //$nombreProduits = $nombreProduits + 1;

            $listeProduit[] = new affichageProduit( $ligne['no'], 0, $ligne['nom'], $ligne['prix'], $ligne['image'], $ligne['qte'], $ligne['description'] );
        }
    }
    catch(Exception $e) {

	    die('Erreur : '.$e->getMessage());
    }

    //fermer appel et base de données 
    $reponse->closeCursor();
    $db = null;

    foreach ($listeProduit as $produit){
        if ( $produit->getNbDisponible() > 0 ){

            echo '<div>';
            echo '<a href="produit.php?id=' . $produit->getID() . '"><img src="images/vente/' . $produit->getNomImage() . '-t.jpg" alt="' . $produit->getNom() . '" />';
            echo '<span class="text-boutique">' . $produit->getNom() . ' ' . $produit->getPrix() . '$' . '</span></a>';
            echo '<a href="vente.php?id=' . $produit->getID() . '"><img class="icones" src="images/cartIcon.png" alt="tiny icon"/></a>' ;
            echo '</div>';
        }else{
            echo '<div>';
            echo '<a href="produit.php?id=' . $produit->getID() . '"><img src="images/vente/' . $produit->getNomImage() . '-t.jpg" alt="' . $produit->getNom() . '" />';
            echo '<span class="text-boutiqueNonDispo">' . $produit->getNom() . ' ' . $produit->getPrix() . '$' . '</span></a>';
            echo '<p class="boutiqueBackorder">Temporairement non disponible</p>' ;
            echo '</div>';
        }
      } 
?>
