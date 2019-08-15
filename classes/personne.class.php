<?php

/**
 * Ce fichier contient la déclaration de la classe Personne
 *
 * @author KFiliatreault et modifié par Simon Paris
 */
class Personne {
	private $_no;
	private $_login;
    private $_nom;
    private $_prenom;
	private $_province;
    private $_ville;
    private $_adresse;
	private $_codePostal;
    private $_email;
    private $_motPasse;
	
    
    // ***************************************************************************
    // Description : 
    //   Constructeur d'initialisation.
    //
    // Paramètres :
    //   $nom              Le nom de la personne.
    //
    // Précondition :
    //   - Le nom ne doit pas être vide.

    // Retourne :
    //   Rien.
    // ***************************************************************************
    public function __construct($login,$prenom,$nom,$province,$ville,$adresse,$codePostal,$email,$motPasse)
    {

		// on choisit de laisser le id vide car on ne l'utilisera pas toujours et il sera généré par la BD
        $this->setLogin($login);
        $this->setNom($nom);		
        $this->setPrenom($prenom);
		$this->setProvince($province);
        $this->setVille($ville);
		$this->setAdresse($adresse);
        $this->setPostal($codePostal);
		$this->setemail($email);
        $this->setmotPasse($motPasse);
    }
    
    // ***************************************************************************
    // Description : 
    //   Cette méthode modifie le nom.
    //
    // Paramètres :
    //   $nom      Nouveau nom.
    // 
    // Précondition :
    //  - Le nom ne doit pas être vide.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
    public function setNom($nom) {
        if (empty($nom)) {
            throw new Exception('Le nom est vide!',E_USER_ERROR);
        }
        
        $this->_nom = $nom;
    }
    
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne le nom.
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   Le nom.    
    // ***************************************************************************
    public function getNom() {
        return $this->_nom;
    }
	
    // ***************************************************************************
    // Description : 
    //   Cette méthode modifie le prenom.
    //
    // Paramètres :
    //   $prenom      Nouveau prénom.
    // 
    // Précondition :
    //  - Le prénom ne doit pas être vide.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
    public function setPrenom($prenom) {
        if (empty($prenom)) {
            throw new Exception('Le prénom est vide!',E_USER_ERROR);
        }
        
        $this->_prenom = $prenom;
    }
    
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne le prénom.
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   Le prénom.    
    // ***************************************************************************
    public function getPrenom() {
        return $this->_prenom;
    }
	
	    // ***************************************************************************
    // Description : 
    //   Cette méthode modifie le nom d'usager.
    //
    // Paramètres :
    //   $nom      Nouveau nom d'usager.
    // 
    // Précondition :
    //  - Le nom d'usager ne doit pas être vide.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
    public function setLogin($login) {
        if (empty($login)) {
            throw new Exception('Le nom usager est vide!',E_USER_ERROR);
        }
        $this->_login = $login;
    }
	
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne le nom d'usager.
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   Le nom d'usager.    
    // ***************************************************************************
    public function getLogin() {
      
	  return $this->_login;
	}

	// ***************************************************************************
    // Description : 
    //   Cette méthode modifie la province de l'usager.
    //
    // Paramètres :
    //   $province      Nouvelle Province de l'usager.
    // 
    // Précondition :
    //  - La province de l'usager ne doit pas être vide.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
   public function setProvince($province) {
        if (empty($province)) {
            throw new Exception('La province de lusager est vide!',E_USER_ERROR);
        }
        $this->_province = $province;
    }
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne la province de l'usager. 
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   La province de l'usager.    
    // ***************************************************************************
    public function getProvince() {
        return $this->_province;
    }
	


	// ***************************************************************************
    // Description : 
    //   Cette méthode modifie la Ville de l'usager.
    //
    // Paramètres :
    //   $ville      Nouvelle ville de l'usager.
    // 
    // Précondition :
    //  - La ville de l'usager ne doit pas être vide.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
   public function setVille($ville) {
        if (empty($ville)) {
            throw new Exception('La ville de lusager est vide!',E_USER_ERROR);
        }
        $this->_ville = $ville;
    }
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne la ville de l'usager. 
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   La ville de l'usager.    
    // ***************************************************************************
    public function getVille() {
        return $this->_ville;
    }
	
	
	// ***************************************************************************
    // Description : 
    //   Cette méthode modifie l'adresse de l'usager.
    //
    // Paramètres :
    //   $adresse      Nouvelle adresse de l'usager.
    // 
    // Précondition :
    //  - L'adresse de l'usager ne doit pas être vide.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
   public function setAdresse($adresse) {
        if (empty($adresse)) {
            throw new Exception('ladresse de lusager est vide!',E_USER_ERROR);
        }
        $this->_adresse = $adresse;
    }
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne l'adresse de l'usager. 
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   L'adresse de l'usager.    
    // ***************************************************************************
    public function getAdresse() {
        return $this->_adresse;
    }
	
	
	// ***************************************************************************
    // Description : 
    //   Cette méthode modifie le code codePostal de l'usager.
    //
    // Paramètres :
    //   $codePostal      Nouveaule code codePostal de l'usager.
    // 
    // Précondition :
    //  - Le code codePostal de l'usager ne doit pas être vide.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
   
   public function setPostal($codePostal) {
        if (empty($codePostal)) {
            throw new Exception('le code codePostal de lusager est vide!',E_USER_ERROR);
        }
        $this->_codePostal = $codePostal;
    }
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne le code codePostal de l'usager. 
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   le code codePostal de l'usager.    
    // ***************************************************************************
    public function getPostal() {
        return $this->_codePostal;
    }
	
	
	// ***************************************************************************
    // Description : 
    //   Cette méthode modifie le email de l'usager.
    //
    // Paramètres :
    //   $email      Nouveau email de l'usager.
    // 
    // Précondition :
    //  - Le email de l'usager ne doit pas être vide.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
   
   public function setemail($email) {
        if (empty($email)) {
            throw new Exception('le email de lusager est vide!',E_USER_ERROR);
        }
        $this->_email = $email;
    }
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne le email de l'usager. 
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   le email de l'usager.    
    // ***************************************************************************
    public function getEmail() {
        return $this->_email;
    }
	
		// ***************************************************************************
    // Description : 
    //   Cette méthode modifie le mot de passe de l'usager.
    //
    // Paramètres :
    //   $motPasse     Nouveau mot de passe  de l'usager.
    // 
    // Précondition :
    //  - Le mot de passe de l'usager ne doit pas être vide.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
   
   public function setMotPasse($motPasse) {
        if (empty($motPasse)) {
            throw new Exception('le mot de passe de lusager est vide!',E_USER_ERROR);
        }
        $this->_motPasse = $motPasse;
    }
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne le mot de passe de l'usager. 
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   le mot de passe  de l'usager.    
    // ***************************************************************************
    public function getMotPasse() {
        return $this->_motPasse;
    }
	
	
	
	
	
	
	
	
	
	
	
	// ***************************************************************************
    // Description : 
    //   Cette méthode modifie le id.
    //
    // Paramètres :
    //   $id      Nouveau id.
    // 
    // Précondition :
    //  - Le id doit être un chiffre.
    //
    // Retourne :
    //   Rien.    
    // ***************************************************************************
    public function setNo($no) {
        if (!is_numeric($no)) {
            throw new Exception('Le id est n\'est pas un chiffre!',E_USER_ERROR);
        }
        
        $this->_no = $no;
    }
    
    // ***************************************************************************
    // Description : 
    //   Cette méthode retourne le id.
    //
    // Paramètres :
    //   Aucun.
    // 
    // Retourne :
    //   Le id.    
    // ***************************************************************************
    public function getNo() {
        return $this->_no;
    }
    
    // ***************************************************************************
    // Description : 
    //   Cette méthode afficher la Personne.
    //
    // Paramètres :
    //   Aucun.
    //
    // Retourne :
    //   Rien.
    // ***************************************************************************
    public function __toString()
    {
        return 	'Nom                : ' . $this->getNom() . 
		' Prénom             : ' . $this->getPrenom();
    }
}

?>
