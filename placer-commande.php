<?php
    include('connexion.php');
    $manager = new PersonneDao($db);
    $userID;
    $idCommande;
    try{
        $reponse = $db->prepare( "CALL chercher_client_par_login(:login)" );
        $reponse->execute( array( "login" =>  $_SESSION['user']));
        if($ligne = $reponse -> fetch()){
            $userID = $ligne['no'];
        }
        $reponse->closeCursor();
    }
    catch(Exception $e) {
        die("Erreur : ". $e->getMessage());
    }


    try{
        $dateTime = new DateTime();
        $date = $dateTime->format('Y-m-d H:i:s'); // Add time
        $reponse = $db->prepare( "CALL ajouter_commande(:date, :statut, :typePaiement, :noClient)" );
        $reponse->execute( array(   "date" => $date, 
                                    "statut" => "enTraitement",
                                    "typePaiement" => $_POST['selPaiement'], 
                                    "noClient" => $userID));

        
        $reponse->closeCursor();

        $req = $db->prepare('SELECT LAST_INSERT_ID()');
        $req->execute();        
        $ligneCommande = $req->fetch();
        $idCommande = $ligneCommande ['LAST_INSERT_ID()'];
        $req->closeCursor();

    }
    catch(Exception $e) {
        die("Erreur : ". $e->getMessage());
    }





    $panier = $_SESSION['panier']->getListeProduits();
    foreach($panier as $key => $value){

        $quantiteServeur;
        try{
            $reponse = $db->prepare( "CALL ajouter_item_commande(:noCommande, :noProduit, :qte)" );
            $reponse->execute( array(   "noCommande" => $idCommande, 
                                        "noProduit" => $key,
                                        "qte" => $value));

            $reponse->closeCursor();
        }
        catch(Exception $e) {
            die("Erreur : ". $e->getMessage());
        }


        try{
            $reponse = $db->prepare( "CALL chercher_produit(:no)" );
            $reponse->execute( array(   "no" => $key));
            if($ligne = $reponse -> fetch()){
                $quantiteServeur = $ligne['qte'];
            }

            $reponse->closeCursor();
        }
        catch(Exception $e) {
            die("Erreur : ". $e->getMessage());
        }

        $quantiteServeur = $quantiteServeur - $value;


        try{
            $reponse = $db->prepare( "CALL modifier_qte_produit(:no, :qte)" );
            $reponse->execute( array(   "no" => $key, 
                                        "qte" => $quantiteServeur));
            $reponse->closeCursor();
        }
        catch(Exception $e) {
            die("Erreur : ". $e->getMessage());
        }
    }

    


?>