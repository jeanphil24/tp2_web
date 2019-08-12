<?php

    require "classes/personne.class.php";
    require 'classes/personneDao.class.php';


    //Textbox text
	$txtUser = "";
    $txtPrenom ="";
    $txtNom = "";
    $selProvince = "";
    $txtVille = "";
    $txtAdresse = "";
    $txtPostal = "";
    $txtCourriel = "";
    $txtPass1 = "";
    $txtPass2 = "";
	
	//Message d'erreurs
	$errUser = "";
    $errPrenom ="";
    $errNom = "";
    $errProvince = "";
    $errVille = "";
    $errAdresse = "";
    $errPostal = "";
    $errCourriel = "";
    $errPass1 = "";
    $errPass2 = "";
	$erreur = false;

if (isset($_POST['txtUtilisateur']))
  { 
    // variables du formulaire
    $login = $txtUser = htmlspecialchars($_POST['txtUtilisateur']);
    $prenom = $txtPrenom = htmlspecialchars($_POST['txtPrenom']);
    $nom = $txtNom =  htmlspecialchars($_POST['txtNom']);
    $province =  htmlspecialchars($_POST['selProvince']);
    $ville = $txtVille =  htmlspecialchars($_POST['txtVille']);
    $adresse = $txtAdresse =  htmlspecialchars($_POST['txtAdresse']);
    $codePostal = $txtCodePostal =  htmlspecialchars($_POST['txtPostal']);
    $email = $txtCourriel =  htmlspecialchars($_POST['txtCourriel']);
    $motPasse = $txtPass1 =  htmlspecialchars($_POST['txtMotDePasse']);
    $pass2 = $txtPass2 =  htmlspecialchars($_POST['txtMotDePasseRep']);
   

    if ($login == "")
    {
      $erreur = true;
	  $errUser = "Vous devez entrez un nom d'utilisateur.";
    }
	
	if ($prenom == "")
    {
      $erreur = true;
	  $errPrenom = "Vous devez entrez un prénom.";
    }
	
	if ($nom == "")
    {
      $erreur = true;
	  $errNom = "Vous devez entrez un nom.";
    }
	
	if ($ville == "")
    {
      $erreur = true;
	  $errVille = "Vous devez entrez une Ville.";
    }
	
	if ($adresse == "")
    {
      $erreur = true;
	  $errAdresse = "Vous devez entrez une addresse.";
    }
	
	if (!preg_match('/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/', $codePostal)) // Regex simple de regexlib.com
	{
      $erreur = true;
	  $errPostal = "Vous devez entrer un code postal du format A1A 1A1";
    }
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL))  // validation email php de W3School
	{
      $erreur = true;
	  $errCourriel = "Vous devez entrez une couriel valide.";
	}

	if ($motPasse == "")
    {
      $erreur = true;
	  $errPass1 = "Vous devez entrer un mot de passe.";
    }
	else if (strlen($motPasse) <6 )
    {
      $erreur = true;
	  $errPass1 = "Votre mot de passe doit être au moins 6 charactères";
    }
	else if ($pass2 == "")
    {
      $erreur = true;
	  $errPass2 = "Vous devez entrer a nouveau votre mot de passe.";
    }	
	else if ($motPasse != $pass2)
    {
      $erreur = true;
	  $errPass2 = "Les deux mots de passes doivent être pareil.";
    }
	
	if ($erreur == false)
	{
		$_SESSION['connected'] = $login; 
		
		include ('connexion.php');

		try {
			$manager = new PersonneDao($db);
			
			//Code pour ajouter
			$client = new Personne($login,$prenom,$nom,$province,$ville,$adresse,$codePostal,$email,$motPasse);
            $manager->add($client);
			//echo 'on enregistre :<br>';
			//echo $client->getNom()."<br>";
			//echo $client->getPrenom()."<br><br><br>";
			
			//Code pour recuperer l'id 1, changez l'id selon votre BD si vous le desirez
			//$personne = $manager->get(0);
			//echo 'on recupere l\'id passe en argument:<br>';
			//echo $personne->getNom()."<br>";
			//echo $personne->getPrenom()."<br>";
			
			//$listePersonnes = $manager->getListePersonnes();
			//echo '<ul>';
			//foreach($listePersonnes as $personne)
			//{
			//	echo '<li>'.$personne->getNom().'</li>';
			//}
			//echo '</ul>';	
        } 
        catch (Exception $exc) {
            exit( "Erreur :<br />\n" .  $exc->getMessage() );
        }           
       
		$db = null;	
	}
  } 
  ?>