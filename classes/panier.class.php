<?php
class panier
    {
    //début classe

    private $ListeProduits;
    private $nomRecherche;

    public function getListeProduits() {

     return $this->ListeProduits;
    }

    public function setListeProduits($p_listeProduits) {

     $this->ListeProduits = $p_listeProduits;
    }

    public function __construct() {

        $liste = array();
        $this->setListeProduits( $liste );
    }
    public function ajouter( $p_id, $p_quantite ) {
        
        $listeLocale = $this->getListeProduits();

        if( !isset($listeLocale[$p_id]) ){
            // il n'est pas deja dans la liste donc on l'ajoute
            $listeLocale[$p_id] = $p_quantite;
        }
        else{
            // on modifie celui trouvé
            $quantitePrecedente = $listeLocale[$p_id];
            $total = $quantitePrecedente + $p_quantite;

            $listeLocale[$p_id] = $total;
        }

        //mise a jour de la liste
        $this->setListeProduits( $listeLocale );
    }
    
    public function enlever( $p_id ) {
        
        $listeLocale = $this->getListeProduits();

        if( isset($listeLocale[$p_id]) ){
            
            $nouvelleListe = array();

            foreach( $listeLocale as $key => $value ){

                if( $key != $p_id ){
                    $nouvelleListe[$key] = $value;
                }
            }
            //mise a jour de la liste
            $this->setListeProduits( $nouvelleListe );
        }
    }
    public function miseAJourPanier( $p_liste ) {
        
        $listeLocale = $this->getListeProduits();
        $listeErreurs = array();

        foreach( $p_liste as $key => $value ){

            $disponible = $this->verifierDispo( $key, $value );

            if( $disponible ){

                $listeLocale[$key] = $value;
            }else{

                $listeErreurs[] = $this->nomRecherche;
            }
        }

        $nouvelleListe = array();

        foreach( $listeLocale as $key => $value ){

            if( $value > 0 ){

                $nouvelleListe[$key] = $value;
            }
        }

        //mise a jour de la liste
        $this->setListeProduits( $nouvelleListe );
        return $listeErreurs;
    }
    private function verifierDispo( $p_id, $p_quantite ) {
        
        $disponible = false;
        $quantiteDisponible;
        $produitTrouve = false;
        include('connexion.php');
        try {

            $reponse = $db->prepare( "CALL chercher_produit(:id)" );
            $reponse->execute( array('id' => $p_id) );

            if( $ligne = $reponse -> fetch() ){
                
                $this->nomRecherche = $ligne['nom'];
                $quantiteDisponible = $ligne['qte'];
                $produitTrouve = true;
            }
        }
        catch(Exception $e) {

	        die('Erreur : '.$e->getMessage());
        }

        //fermer appel
        $reponse->closeCursor();
        //fermer base de donnée
        $db = null;

        if($produitTrouve && ($quantiteDisponible >= $p_quantite)){
            $disponible = true;
        }
        return $disponible;
    }
    public function compterProduits() {
        
        $listeLocale = $this->getListeProduits();

        if( empty( $listeLocale ) ){

            return 0;
        }
        else{

            $total = 0;

            foreach($listeLocale as $produit){

                $total = $total + $produit;
            }
            return $total;
        }
    }
   
    public function combienDansPanier( $p_id ) {
        
        $listeLocale = $this->getListeProduits();

        if( !isset($listeLocale[$p_id]) ){
            // il n'est pas dedans
            return 0;
        }
        else{
            // il est dedans
            return $listeLocale[$p_id];
        }
    }
    private function compterProduitsUnique() {
        
        $listeLocale = $this->getListeProduits();

        if( empty( $listeLocale ) ){

            return 0;
        }
        else{

            return sizeof( $listeLocale );
        }
    }
    //fin classe
    }
    ?>