<?php
    
    include('connexion.php');
    $produit;
    $produitTrouve = false;

    try {

        $reponse = $db->prepare( "CALL chercher_produit(:id)" );
        $reponse->execute( array('id' => $_GET['id']) );

        if( $ligne = $reponse -> fetch() ){
            
            $produit = new affichageProduit( $ligne['no'], 0, $ligne['nom'], $ligne['prix'], $ligne['image'], $ligne['qte'], $ligne['description']  );
            $produitTrouve = true;
        }
    }
    catch(Exception $e) {

	    die('Erreur : ' . $e->getMessage());
    }

    //fermer appel et base de données 
    $reponse->closeCursor();
    $db = null;

    // si aucun produit ne correspont au id recherché
    if( !$produitTrouve ){

        header('Location: vente.php');
        exit();
    }
?>