<?php
    
    require "classes/produitMagasin.class.php";
    include('connexion.php');
    $listeProduit;
    //$nombreProduits = 0;

    try {

        $reponse = $db->prepare( "CALL lister_produits()" );
        $reponse->execute();

        while( $ligne = $reponse -> fetch() ){

            //$nombreProduits = $nombreProduits + 1;

            $listeProduit[] = new produitMagasin( $ligne['no'], $ligne['nom'], $ligne['prix'], $ligne['image'], $ligne['qte'] );
        }
    }
    catch(Exception $e) {

	    die('Erreur : '.$e->getMessage());
    }

    //fermer appel et base de données 
    $reponse->closeCursor();
    $db = null;
?>
