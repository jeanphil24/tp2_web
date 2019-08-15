<?php
require_once "personne.class.php";
class PersonneDao
{
  private $_db; // Instance de PDO
 
  public function __construct($db)
  {
    $this->setDb($db);
  }
 
  public function add(Personne $perso)
  {
    $q = $this->_db->prepare('INSERT INTO clients (nom, prenom, adresse, ville, province, codePostal, login, motPasse, email) 
									VALUES (:nom, :prenom, :adresse, :ville, :province, :codePostal, :login ,:motPasse, :email)');
	
	//ou avec bindValue, c'est équivalent
	//$q->execute(array("login" => $perso->getLogin(),
	//						"nom" => $perso->getNom(), 
	//						"prenom" => $perso->getPrenom(),
	//						"province" => $perso->getProvince(), 
	//						"ville" => $perso->getVille(),
	//						"adresse" => $perso->getAdresse(), 
	//						"codePostal" => $perso->getCodePostal(),
	//						"email" => $perso->getEmail(), 
	//						"motPasse" => $perso->getMotPasse()));
   
	$q->bindValue(":login", $perso->getLogin());
    $q->bindValue(":prenom", $perso->getPrenom());
	$q->bindValue(":nom", $perso->getNom());
    $q->bindValue(":province", $perso->getProvince());
	$q->bindValue(":ville", $perso->getVille());
    $q->bindValue(":adresse", $perso->getAdresse());
	$q->bindValue(":codePostal", $perso->getPostal());
    $q->bindValue(":email", $perso->getEmail());
	$q->bindValue(":motPasse", $perso->getMotPasse());
    $q->execute();
	$q->closeCursor();
  }
 
  public function delete(Personne $perso)
  {
	$q = $this->_db->prepare('DELETE FROM clients WHERE no = :no');
    $q->execute(array("no" => $perso->no()));
	$q->closeCursor();
  }
 
  public function get($no)
  {
    $no = (int) $no;
 
	$q = $this->_db->prepare('SELECT no, nom, prenom, province, ville, adresse, codePostal, email, motPasse FROM clients WHERE no = :no');
    $q->execute(array("no" => $no));
    
	
	//recuperation en tableau associatif, la cle est le nom de la colonne de la BD, la valeur est son contenu
	$ligne = $q->fetch(PDO::FETCH_ASSOC);
	$unClient = new Personne(	$ligne['login'], 
									$ligne['prenom'],
									$ligne['nom'], 
									$ligne['province'],
									$ligne['ville'], 
									$ligne['adresse'],
									$ligne['codePostal'], 
									$ligne['email'],
									$ligne['motPasse']);
	
	$q->closeCursor();
	
	return $unClient;
		
		
	//recuperation en objet, les proprietes de l'objet sont les noms des colonnes, on peut ainsi acceder leur contenu avec le ->
	/*
	$donnees = $q->fetch(PDO::FETCH_OBJ);
	return new Personne($donnees->nom, $donnees->prenom);
	*/
  }
 
  public function getListePersonnes()
  {
    $clients = array();
 
    $req = $this->_db->query('SELECT  no, nom, prenom, adresse, ville, province, codePostal, login, motPasse, email FROM clients');
 
    while ($ligne = $req->fetch())
    {
		$newClient = new Personne(	$ligne['login'], 
									$ligne['prenom'],
									$ligne['nom'], 
									$ligne['province'],
									$ligne['ville'], 
									$ligne['adresse'],
									$ligne['codePostal'], 
									$ligne['email'],
									$ligne['motPasse']);
		$newClient -> setNo($ligne['no']);
		$clients[] = $newClient;
		//array_push($personnes, new Personne($donnees['nom'], $donnees['prenom']));
    }
	
	$req->closeCursor();
 
    return $clients;
  }
 
 
  public function update(Personne $perso)
  {
	$q = $this->_db->prepare('UPDATE clients SET 	login = :login, 
													prenom = :prenom,
													nom = :nom, 
													province = :province,
													ville = :ville,
													adresse = :adresse, 
													codePostal = :codePostal,
													email = :email, 
													motPasse = :motPasse,
													WHERE no = :no');
 
    $q->bindValue(':login', $perso->login());
    $q->bindValue(':prenom', $perso->prenom());
	$q->bindValue(':nom', $perso->nom());
    $q->bindValue(':province', $perso->province());
	$q->bindValue(':ville', $perso->ville());
    $q->bindValue(':adresse', $perso->adresse());
	$q->bindValue(':codePostal', $perso->codePostal());
    $q->bindValue(':email', $perso->email());
	$q->bindValue(':motPasse', $perso->motPasse());
    $q->bindValue(':no', $perso->no(), PDO::PARAM_INT);
    $q->execute();
	$q->closeCursor();
  }
 
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>