<?php

    // la page resultat n'est accessible qu'avec un parametre "txtRecherche"
    if( !isset($_GET['txtRecherche']) ){

    header('Location: index.php');
    exit();
    }

    include('connexion.php');
    $listeProduitTrouve;
    $nombreProduits = 0;

    try {

        $reponse = $db->prepare( "CALL chercher_produits_par_nom(:nom)" );
        $reponse->execute( array('nom' => $_GET['txtRecherche']) );

        while( $ligne = $reponse -> fetch() ){

            $nombreProduits = $nombreProduits + 1;

            $listeProduitTrouve[] = new affichageProduit($ligne['no'], 0, $ligne['nom'], $ligne['prix'], $ligne['image'], $ligne['qte'], $ligne['description']);
        }
    }
    catch(Exception $e) {

	    die('Erreur : '.$e->getMessage());
    }

    //fermer appel et base de données 
    $reponse->closeCursor();
    $db = null;
?>

