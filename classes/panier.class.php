<?php
class panier
    {
    //début classe

    private $ListeProduits;
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
        
        $indiceProduitTrouve = $this->trouverItemParID( $p_id );
        $listeLocale = $this->getListeProduits();

        if( $indiceProduitTrouve == -1 ){
            // il n'est pas deja dans la liste donc on l'ajoute
            $listeLocale[] = new itemPanier( $p_id, $p_quantite );
        }
        else{
            // on modifie celui trouvé
            $quantitePrecedente = $listeLocale[$indiceProduitTrouve]->getQuantite();
            $total = $quantitePrecedente + $p_quantite;

            $listeLocale[$indiceProduitTrouve]->setQuantite( $total );
        }

        //mise a jour de la liste
        $this->setListeProduits( $listeLocale );
    }
    public function compterProduits() {
        
        $listeLocale = $this->getListeProduits();

        if( empty( $listeLocale ) ){

            return 0;
        }
        else{
        
            return sizeof( $this->getListeProduits() );
        }
    }
    public function combienDansPanier( $p_id ) {
        
        $indiceProduitTrouve = $this->trouverItemParID( $p_id );
        $listeLocale = $this->getListeProduits();
        $nombreDansPanier;

        if( $indiceProduitTrouve == -1 ){
            // il n'a pas été trouvé
            return 0;
        }
        else{
            // on l'a trouvé
            $nombreDansPanier = $listeLocale[$indiceProduitTrouve]->getQuantite();
            return $nombreDansPanier;
        }
    }

    private function trouverItemParID( $p_idRecherche ) {

        $trouve = -1;
        $listeLocale = $this->getListeProduits();

        if( empty( $listeLocale ) ){

            return $trouve;
        }
        else{

            $nombreProduits = $this->compterProduits();
            for ($i = 0; $i < $nombreProduits; $i++) {

                $idCourant = $listeLocale[$i]->getID();
                if( $idCourant == $p_idRecherche ){
                    $trouve = $i;
                }
            }
            return $trouve;
        }
    } 

    //fin classe
    }
    ?>