<?php
class produitMagasin
    {

    private $id;
    public function getID() {
     return $this->id;
    }
    public function setID($p_id) {
     $this->id = $p_id;
    }

    private $nom;
    public function getNom() {
     return $this->nom;
    }
    public function setNom($p_nom) {
     $this->nom = $p_nom;
    }

    private $prix;
    public function getPrix() {
     return $this->prix;
    }
    public function setPrix($p_prix) {
     $this->prix = $p_prix;
    }

    private $nomImage;
    public function getNomImage() {
     return $this->nomImage;
    }
    public function setNomImage($p_nomImage) {
     $this->nomImage = $p_nomImage;
    }

    private $nbDisponible;
    public function getNbDisponible() {
     return $this->nbDisponible;
    }
    public function setNbDisponible($p_nbDisponible) {
     $this->nbDisponible = $p_nbDisponible;
    }

    public function __construct($p_id, $p_nom, $p_prix, $p_nomImage, $p_nbDisponible) {

        $this->setID( $p_id );
        $this->setNom( $p_nom );
        $this->setPrix( $p_prix );
        $this->setNomImage( $p_nomImage );
        $this->setNbDisponible( $p_nbDisponible );
    } 

    }
    ?>