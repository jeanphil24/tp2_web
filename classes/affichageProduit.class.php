<?php
class affichageProduit
    {
    // début classe
    private $id;
    public function getID() {
     return $this->id;
    }
    public function setID($p_id) {
     $this->id = $p_id;
    }

    private $nombreDemande;
    public function getNombreDemande() {
     return $this->nombreDemande;
    }
    public function setNombreDemande($p_nombreDemande) {
     $this->nombreDemande = $p_nombreDemande;
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
    private $description;
    public function getDescription() {
     return $this->description;
    }
    public function setDescription($p_description) {
     $this->description = $p_description;
    }

    public function __construct($p_id, $p_nombreDemande, $p_nom, $p_prix, $p_nomImage, $p_nbDisponible, $p_description) {

        $this->setID( $p_id );
        $this->setNombreDemande( $p_nombreDemande );
        $this->setNom( $p_nom );
        $this->setPrix( $p_prix );
        $this->setNomImage( $p_nomImage );
        $this->setNbDisponible( $p_nbDisponible );
        $this->setDescription($p_description);
    } 

    // fin classe
    }
    ?>