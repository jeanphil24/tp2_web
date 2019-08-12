<?php

class itemPanier
    {

        private $id;
        public function getID() {
         return $this->id;
        }
        public function setID($p_id) {
         $this->id = $p_id;
        }
    
        private $quantite;
        public function getQuantite() {
         return $this->quantite;
        }
        public function setQuantite($p_quantite) {
         $this->quantite = $p_quantite;
        }
    


    public function __construct($p_id, $p_quantite) {

        $this->setID( $p_id );
        $this->setQuantite( $p_quantite );
    } 

    }
    ?>