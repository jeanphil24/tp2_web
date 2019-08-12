<?php

    // la page resultat n'est accessible qu'avec un parametre "txtRecherche"
    if( !isset($_GET['txtRecherche']) ){

    header('Location: index.php');
    exit();
    }

    require "classes/produitMagasin.class.php";
    include('connexion.php');
    $listeProduitTrouve;
    $nombreProduits = 0;

    try {

        $reponse = $db->prepare( "CALL chercher_produits_par_nom(:nom)" );
        $reponse->execute( array('nom' => $_GET['txtRecherche']) );

        while( $ligne = $reponse -> fetch() ){

            $nombreProduits = $nombreProduits + 1;

            $listeProduitTrouve[$nombreProduits] = new produitMagasin($ligne['no'], $ligne['nom'], $ligne['prix'], $ligne['image'], $ligne['qte']);
        }
    }
    catch(Exception $e) {

	    die('Erreur : '.$e->getMessage());
    }

    //fermer appel et base de données 
    $reponse->closeCursor();
    $db = null;
?>