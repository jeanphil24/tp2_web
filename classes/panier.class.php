<?php
require "classes/itemPanier.class.php";
class panier
    {

    private $listeProduits;
    public function getListeProduits() {
     return $this->listeProduits;
    }
    public function setListeProduits($p_listeProduits) {
     $this->id = $p_listeProduits;
    }

    private $nombreDeProduits;
    public function getNombreDeProduits() {
     return $this->nombreDeProduits;
    }
    public function setNombreDeProduits($p_nombreDeProduits) {
     $this->nom = $p_nombreDeProduits;
    }

    public function __construct() {

        $listeProduit;
        $this->setListeProduits( $listeProduit );
        $this->setNombreDeProduits( 0 );
    }
    public function ajouter( $p_id, $p_quantite ) {
        
        $produitTrouve = $this->trouverItemParID($p_id);

        if( $produitTrouve == -1 ){
            // il n'est pas deja dans la liste donc on l'ajoute
            $nombreDeProduits = $nombreDeProduits + 1;
            $listeProduits[$nombreDeProduits] = new itemPanier( $p_id, $p_quantite );
        }
        else{
            // on modifie celui trouvé
            $quantitePrecedente = $listeProduits[$produitTrouve]->getQuantite();
            $total = $quantitePrecedente + $p_quantite;

            $listeProduits[$produitTrouve]->setQuantite( $total );
        }
    }
    public function trouverItemParID( $p_id ) {

        $trouve = -1;
        if( $nombreDeProduits == 0 ){
            return $trouve;
        }
        else{
            
            for ($ligne = 1; $ligne <= $nombreDeProduits; $ligne++) {

                if( $listeProduits[$ligne]->getID() == $p_id ){
                    $trouve = $ligne;
                }
            }
            
            return $trouve;
        }
    } 



    }
    ?>