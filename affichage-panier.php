<?php
    require "classes/affichagePanier.class.php";
    include('connexion.php');
    

    $listePanier = $_SESSION['panier']->getListeProduits();
    $listeAffichage;
    $id;
    $nombreAchat;
    foreach ($listePanier as $itemPanier){

        $id = $itemPanier->getID();
        $nombreAchat = $itemPanier->getQuantite();
        try {

            $reponse = $db->prepare( "CALL chercher_produit(:id)" );
            $reponse->execute( array('id' => $id) );
    
            if( $ligne = $reponse -> fetch() ){
                
                $listeAffichage[] = new affichagePanier( $ligne['no'], $nombreAchat, $ligne['nom'], $ligne['prix'], $ligne['image'], $ligne['qte'] );

            }
        }
        catch(Exception $e) {
    
            die('Erreur : '.$e->getMessage());
        }
    
        //fermer appel 
        $reponse->closeCursor();
    }

    //affichage
    foreach ( $listeAffichage as $item){

        $id = $item->getID();
        $nom = $item->getNom();
        $nombreDemande = $item->getNombreDemande();
        $prix = $item->getPrix();
        $total = $prix * $nombreDemande;
        
        echo '<p>#'. $id .' '. $nom . ' ' . $nombreDemande . 'x '. $prix .'$ total : '. $total . '$</p>';
    }

    

    //fermer base de données 
    $db = null;
?>