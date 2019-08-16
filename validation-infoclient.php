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

    if (isset($_POST['txtPrenom']))
    { 

        // variables du formulaire
        $txtPrenom = $txtPrenom = htmlspecialchars($_POST['txtPrenom']);
        $txtNom = $txtNom =  htmlspecialchars($_POST['txtNom']);
        $txtProvince = $selProvince = htmlspecialchars($_POST['selProvince']);
        $txtVille = $txtVille =  htmlspecialchars($_POST['txtVille']);
        $txtAdresse = $txtAdresse =  htmlspecialchars($_POST['txtAdresse']);
        $txtPostal = $txtPostal =  htmlspecialchars($_POST['txtPostal']);
        $txtEmail = $txtCourriel =  htmlspecialchars($_POST['txtCourriel']);


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

        
        if ($erreur == false)
        {	
            try {
                $manager = new PersonneDao($db);
                
                //Code pour ajouter
                $client = new Personne($txtLogin,$txtPrenom,$txtNom,$selProvince,$txtVille,$txtAdresse,$txtPostal,$txtCourriel,$txtMotPasse);
                $manager->modifyNoPassword($client);
                
            } 
            catch (Exception $exc) {
                exit( "Erreur :<br />\n" .  $exc->getMessage() );
            }           
        
            $db = null;	
        }
    }
    ?>