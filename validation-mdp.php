<?php
    require 'classes/personneDao.class.php';
    include('connexion.php');

    //Message d'erreurs
    $success = "";
    $errMDPOriginal = "";
    $errMDP1 = "";
    $errMDP2 = "";
    $erreur = false;
    
    try 
    {
        include ('connexion.php');
        $manager = new PersonneDao($db);
        $client = $manager->get($_SESSION['user']);

        $txtUser = $client -> getLogin();
        $txtPrenom = $client -> getPrenom();
        $txtNom = $client -> getNom();
        $selProvince = $client -> getProvince();
        $txtVille = $client -> getVille();
        $txtAdresse = $client -> getAdresse();
        $txtPostal = $client -> getPostal();
        $txtCourriel = $client -> getEmail();
        $MotPasseCompte = $client -> getMotPasse();
        $txtLogin = $client -> getLogin();
    }
    catch (Exception $exc) 
    {
        exit( "Erreur :<br />\n" .  $exc->getMessage() );
    }      

if (isset($_POST['txtMDP1']))
  { 
    // variables du formulaire
    $txtMDPOriginal =  SHA1(htmlspecialchars($_POST['txtMDPOriginal']));
    
    $txtMDP1 =  htmlspecialchars($_POST['txtMDP1']);
    $txtMDP2 =  htmlspecialchars($_POST['txtMDP2']);
    $txtMDP1Encryp =  SHA1(htmlspecialchars($_POST['txtMDP1']));

        
	if ($txtMDPOriginal != $MotPasseCompte)
    {
      $erreur = true;
	  $errMDPOriginal = "Votre ancien mot de passe n'est pas correct.";
    }
	else if ($txtMDP1 == "")
    {
      $erreur = true;
	  $errMDP1 = "Vous devez entrer un mot de passe.";
    }
	else if (strlen($txtMDP1) <6)
    {
      $erreur = true;
	  $errMDP1 = "Votre mot de passe doit être au moins 6 charactères";
    }
	else if ($txtMDP2 == "")
    {
      $erreur = true;
	  $errMDP2 = "Vous devez entrer a nouveau votre mot de passe.";
    }	
	else if ($txtMDP1 != $txtMDP2)
    {
      $erreur = true;
	  $errMDP2 = "Les deux mots de passes doivent être pareil.";
    }
	
    if ($erreur == false)
    {	
        $success = "Votre mot de passe a été changé!";
        try 
        {
            $manager = new PersonneDao($db);
            
            //Code pour ajouter
            $client = new Personne($txtLogin,$txtPrenom,$txtNom,$selProvince,$txtVille,$txtAdresse,$txtPostal,$txtCourriel,$txtMDP1Encryp);
            $manager->modifyPassword($client);
            
        } 
        catch (Exception $exc) {
            exit( "Erreur :<br />\n" .  $exc->getMessage() );
        }           
    
        $db = null;	
    }
    
}
 ?>