<?php
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
    $success = "";
	
    //Message d'erreurs
    $errColor= "black";
	$errUser = "";
    $errPrenom ="";
    $errNom = "";
    $errProvince = "";
    $errVille = "";
    $errAdresse = "";
    $errPostal = "";
    $errCourriel = "";
    $errPass1 = "*Doit avoir au moins 6 charactères dont un chiffre, une majuscule et une minuscule.";
    $errPass2 = "";
	$erreur = false;

if (isset($_POST['txtUtilisateur']))
  { 
    // variables du formulaire
    $login = $txtUser = htmlspecialchars($_POST['txtUtilisateur']);
    $prenom = $txtPrenom = htmlspecialchars($_POST['txtPrenom']);
    $nom = $txtNom =  htmlspecialchars($_POST['txtNom']);
    $province = $selProvince = htmlspecialchars($_POST['selProvince']);
    $ville = $txtVille =  htmlspecialchars($_POST['txtVille']);
    $adresse = $txtAdresse =  htmlspecialchars($_POST['txtAdresse']);
    $codePostal = $txtPostal =  htmlspecialchars($_POST['txtPostal']);
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

    // Regex de https://stackoverflow.com/questions/8141125/regex-for-password-php/34166252
    if (!preg_match('/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/', $motPasse)) 
	{
        $errColor = "red";
        $erreur = true;
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
        $motPasse = $txtPass1 =  SHA1(htmlspecialchars($_POST['txtMotDePasse']));
		include ('connexion.php');

		try {
			$manager = new PersonneDao($db);
			
			//Code pour ajouter
			$client = new Personne($login,$prenom,$nom,$province,$ville,$adresse,$codePostal,$email,$motPasse);
            $listePersonnes = $manager->getListePersonnes();
            $existeDeja = false;
            
            foreach($listePersonnes as $personne)
			{
                if ($personne->getLogin() == $client->getLogin() && !$existeDeja)
                {
                    $existeDeja = true;
                    $errUser = "Ce login existe déja.";
                }
			}
            if (!$existeDeja) 
            {
                $manager->add($client);
                $_SESSION['user'] = $login; 
                header('Location: compte.php');
                exit();
            }
        } 
        catch (Exception $exc) {
            exit( "Erreur :<br />\n" .  $exc->getMessage() );
        }           
       
		$db = null;	
	}
  } 
  ?>