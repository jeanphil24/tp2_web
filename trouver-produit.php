<?php
    // la page individuel des produits n'est accessible qu'avec un parametre id
    if( !isset($_GET['id']) ){

        header('Location: index.php');
        exit();
    }

    require "classes/produitMagasin.class.php";
    include('connexion.php');
    $produit;
    $produitTrouve = false;

    try {

        $reponse = $db->prepare( "CALL chercher_produit(:id)" );
        $reponse->execute( array('id' => $_GET['id']) );

        if( $ligne = $reponse -> fetch() ){
            
            $produitTrouve = true;
            $produit = $ligne;
        }
    }
    catch(Exception $e) {

	    die('Erreur : '.$e->getMessage());
    }

    //fermer appel et base de données 
    $reponse->closeCursor();
    $db = null;

    // si aucun produit ne correspont au id recherché
    if( !$produitTrouve ){

        header('Location: index.php');
        exit();
    }
?>