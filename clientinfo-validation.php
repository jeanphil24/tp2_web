<?php
    require 'classes/personneDao.class.php';
    include('connexion.php');
        
    try 
    {
        $manager = new PersonneDao($db);
        $client = $manager->get($_SESSION['user']);
    
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
    
        // variables du formulaire
        $txtUser = $client -> getLogin();
        $txtPrenom = $client -> getPrenom();
        $txtNom = $client -> getNom();
        $selProvince = $client -> getProvince();
        $txtVille = $client -> getVille();
        $txtAdresse = $client -> getAdresse();
        $txtPostal = $client -> getPostal();
        $txtCourriel = $client -> getEmail();
        $txtMotPasse = $txtPass2 = $client -> getMotPasse();
        $txtMotPasseCache = str_repeat("*", strlen($txtMotPasse)); 
        $txtLogin = $client -> getLogin();
    }
    catch (Exception $exc) {
        exit( "Erreur :<br />\n" .  $exc->getMessage() );
    }      

	if ($txtPrenom == "")
    {
      $erreur = true;
	  $errPrenom = "Vous devez entrez un prénom.";
    }
	
	if ($txtNom == "")
    {
      $erreur = true;
	  $errNom = "Vous devez entrez un nom.";
    }
	
	if ($txtVille == "")
    {
      $erreur = true;
	  $errVille = "Vous devez entrez une Ville.";
    }
	
	if ($txtAdresse == "")
    {
      $erreur = true;
	  $errAdresse = "Vous devez entrez une addresse.";
    }
	
	if (!preg_match('/^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/', $txtPostal)) // Regex simple de regexlib.com
	{
      $erreur = true;
	  $errPostal = "Vous devez entrer un code postal du format A1A 1A1";
    }
	
	if (!filter_var($txtCourriel, FILTER_VALIDATE_EMAIL))  // validation email php de W3School
	{
      $erreur = true;
	  $errEmail = "Vous devez entrez une couriel valide.";
	}

	if ($txtMotPasse == "")
    {
      $erreur = true;
	  $errPass1 = "Vous devez entrer un mot de passe.";
    }
	else if (strlen($txtMotPasse) <6 )
    {
      $erreur = true;
	  $errPass1 = "Votre mot de passe doit être au moins 6 charactères";
    }
	else if ($txtPass2 == "")
    {
      $erreur = true;
	  $errPass2 = "Vous devez entrer a nouveau votre mot de passe.";
    }	
	else if ($txtMotPasse != $txtPass2)
    {
      $erreur = true;
	  $errPass2 = "Les deux mots de passes doivent être pareil.";
    }
	
	if ($erreur == false)
	{	
		include ('connexion.php');

		try {
			$manager = new PersonneDao($db);
			
			//Code pour ajouter
			$client = new Personne($txtLogin,$txtPrenom,$txtNom,$selProvince,$txtVille,$txtAdresse,$txtPostal,$txtCourriel,$txtMotPasse);
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
    ?>